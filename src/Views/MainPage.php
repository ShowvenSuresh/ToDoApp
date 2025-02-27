<?php
ob_start();
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
        <div class="card">
            <p class="title">To-Do </p>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action " aria-current="true">
                    The current button
                </button>
                <button type="button" class="list-group-item list-group-item-action">A second button item</button>
                <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                <button type="button" class="list-group-item list-group-item-action">A disabled button item</button>
            </div>
        </div>
        <div class="card">
            <p class="title1">Doing</p>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action " aria-current="true">
                    The current button
                </button>
                <button type="button" class="list-group-item list-group-item-action">A second button item</button>
                <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                <button type="button" class="list-group-item list-group-item-action">A disabled button item</button>
            </div>
        </div>
        <div class="card">
            <p class="title2">Completed</p>
            <div class="list-group">
                <button type="button" class="list-group-item list-group-item-action " aria-current="true">
                    The current button
                </button>
                <button type="button" class="list-group-item list-group-item-action">A second button item</button>
                <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                <button type="button" class="list-group-item list-group-item-action">A disabled button item</button>
            </div>
        </div>
    </div>
    </div>

    <div class="dashboard">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add a New Task
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add a New Task</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
ob_end_flush();
?>