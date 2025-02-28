<?php
ob_start() //start output buffering
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>ToDoApp</title>
</head>

<body class="body">
    <div class="navbar">
        <form method="POST">
            <button class="value" type="submit" name="dashboard">
                Dashboard
            </button>
        </form>
        <form method="POST">
            <button class="value" type="submit" name="search">
                Search
            </button>
        </form>
        <form method="POST">
            <button class="value" type="submit" name="profile">
                Profile
            </button>
        </form>
        <form method="POST">
            <button class="value" type="submit" name="notifications">
                Notifications
            </button>
        </form>

        <form method="POST">
            <button class="value" type=submit name="signOut">
                Logout
            </button>
        </form>
    </div>
    <div class="dashboard">
        <div class="profile">
            <p class="title3">User Details</p>
            <ol class="list-group list-group-numbered">
                <?php
                include_once("../Services/UserDetails.php");
                $data = getUserDetails();
                if (!empty($data)) {
                    echo "<li class='list-group-item'>" . $data["email"] . "</li>";
                    echo "<li class='list-group-item'>" . $data["first_name"] . " " . $data["last_name"] . "</li>";
                    echo "<li class='list-group-item'>" . $data["phone_num"] . "</li>";
                }
                ?>

            </ol>
            <hr>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-end " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Edit User Details
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Details</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstname" value="<?php echo htmlspecialchars($_SESSION['first_name']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" value="<?php echo htmlspecialchars($_SESSION['last_name']); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="phonenumber" value="<?php echo htmlspecialchars($_SESSION['phone_num']); ?>">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="update" class="btn btn-primary" value="Save Changes">

                                </div>
                            </form>
                            <?php
                            include_once("../Services/UserDetails.php");
                            if (isset($_POST["update"])) {
                                //echo "all here";
                                updateDetails($_POST["email"], $_POST["firstname"], $_POST["lastname"], $_POST["phonenumber"]);
                            }
                            ?>

                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>
<?php
include("../Services/Authentication.php");
if (isset($_POST["signOut"])) {
    processSignOut();
} else if (isset($_POST["notifications"])) {
    header("location:Notifications.php");
} else if (isset($_POST["profile"])) {
    header("location:Profile.php");
} else if (isset($_POST["search"])) {
    header("location:Search.php");
} else if (isset($_POST["dashboard"])) {
    header("location:MainPage.php");
}
ob_end_flush(); //flush the output buffer if not cannot modify the header
?>