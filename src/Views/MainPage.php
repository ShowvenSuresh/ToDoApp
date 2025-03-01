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
                <?php
                include_once("../Services/TaskDetails.php");
                $result = getTaskName(1);

                if (!empty($result)) {
                    while ($name = $result->fetch_assoc())
                        echo "
                    <form method='POST'>
                    <button type 'button' class='list-group-item list-group-item-action '  aria-current='true' name='taskname' value='" . $name['task_name'] . "'>
                " . $name['task_name'] . "
            </button>
            </form>";
                }
                //data-bs-toggle='modal' data-bs-target='#taskDetails'
                ?>
            </div>
        </div>
        <div class="card">
            <p class="title1">Doing</p>
            <div class="list-group">
                <?php
                include_once("../Services/TaskDetails.php");
                $result = getTaskName(2);

                if (!empty($result)) {
                    while ($name = $result->fetch_assoc())
                        echo "
                    <form method='POST'>
                    <button type 'button' class='list-group-item list-group-item-action '  aria-current='true' name='taskname' value='" . $name['task_name'] . "'>
                " . $name['task_name'] . "
            </button>
            </form>";
                }

                ?>
            </div>
        </div>
        <div class="card">
            <p class="title2">Completed</p>
            <div class="list-group">
                <?php
                include_once("../Services/TaskDetails.php");
                $result = getTaskName(3);

                if (!empty($result)) {
                    while ($name = $result->fetch_assoc())

                        echo "
                       <form method='POST'>
                    <button type 'button' class='list-group-item list-group-item-action '  aria-current='true' name='taskname' value='" . $name['task_name'] . "'>
                " . $name['task_name'] . "
            </button>
            </form>";
                }



                ?>
            </div>
        </div>
    </div>
    </div>

    <div class="dashboard">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">
            Add a New Task
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add a New Task</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form method="POST">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Task name</label>
                                    <input type="text" class="form-control" name="taskname" required="" placeholder="Task Name">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Task Description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" type="text" name="description" placeholder="Description" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Due Date</label>
                                    <input type="date" class="form-control" name="duedate" required="" placeholder="Due Date">
                                </div>
                                <div class="row-md-3">
                                    <label for="validationCustom04" class="form-label">Priority</label>
                                    <select class="form-select" name="priority" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>Low</option>
                                        <option>Medium</option>
                                        <option>High</option>
                                    </select>

                                    <label for="validationCustom04" class="form-label">Category</label>
                                    <select class="form-select" name="category" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>Assignments & Homework</option>
                                        <option>Exams & Quizzes</option>
                                        <option>Projects & Group Work</option>
                                        <option>Personal & Extracurricular </option>
                                    </select>
                                    <label for="validationCustom04" class="form-label">Status</label>
                                    <select class="form-select" name="status" required>
                                        <option selected disabled value="To-Do">To-Do</option>
                                        <option disabled>Doing</option>
                                        <option disabled>Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="inserttask" class="btn btn-primary">Add Task Loh</button>
                            </div>
                        </form>
                    </div>


                </div>

            </div>

        </div>
    </div>
    </div>
    <?php
    include_once("../Services/TaskDetails.php");
    if (isset($_POST["inserttask"])) {
        addTask($_POST["taskname"], $_POST["description"], $_POST["duedate"], $_POST["priority"], $_POST["category"], "To-Do");
    }
    ?>
    <?php
    if (isset($_POST["taskname"])) {
        $name = $_POST["taskname"];
        unset($_POST["taskname"]);
        $taskItems = getTaskDetailsBasedOnName($name);
        echo "<script>
            window.onload = function() {
                var myModal = new bootstrap.Modal(document.getElementById('taskDetails'));
                myModal.show();
            };
          </script>";
    }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="taskDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $name;
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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