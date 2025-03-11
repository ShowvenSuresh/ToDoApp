<?php
include_once("../Services/ErrorHandling.php");
ob_start();
session_start();
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
            <button type="submit" name="notifications" class="btn btn-primary position-relative">
                Notifications
                <?php
                include_once("../Services/TaskDetails.php");

                $notificationCount = getNotificationCount();

                if ($notificationCount > 0): ?>
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-dark rounded-pill">
                        <?php echo $notificationCount; ?>
                        <span class="visually-hidden">New alerts</span>
                    </span>
                <?php endif; ?>
            </button>
        </form>
        <form method="POST">
            <button class="value" type=submit name="archive">
                Archive
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
            <p class="title">Urgent tasks to complete</p>
            <div class="list-group">
                <?php
                include_once("../Services/TaskDetails.php");
                $result = getTaskName(6);

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
    <?php
    if (isset($_POST["taskname"])) {
        $name = $_POST["taskname"];

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
                    <h1 class="modal-title fs-5" id="taskDetails">Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="task_id" value="<?php echo htmlspecialchars($taskItems["task_id"] ?? ''); ?>">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Task name</label>
                                <input disable type="text" class="form-control" name="taskname" value="<?php echo htmlspecialchars($taskItems["task_name"]); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Task Description</label>
                                <textarea disable class="form-control" id="exampleFormControlTextarea1" type="text" name="description" rows="3"><?php echo htmlspecialchars($taskItems["description"]); ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Due Date</label>
                                <input type="date" class="form-control" name="duedate" disabled value="<?php echo htmlspecialchars($taskItems["due_date"]); ?>">
                            </div>
                            <div class="row-md-3">
                                <label for="validationCustom04" class="form-label">Priority</label>
                                <select class="form-select" name="priority" disabled>
                                    <option disabled value="">Choose...</option>
                                    <option <?php echo ($taskItems["priority"] == "Low") ? "selected" : ""; ?>>Low</option>
                                    <option <?php echo ($taskItems["priority"] == "Medium") ? "selected" : ""; ?>>Medium</option>
                                    <option <?php echo ($taskItems["priority"] == "High") ? "selected" : ""; ?>>High</option>
                                </select>
                            </div>

                            <label for="validationCustom04" class="form-label">Category</label>
                            <select class="form-select" name="category" disable>
                                <option disabled value="">Choose...</option>
                                <option <?php echo ($taskItems["category"] == "Assignments & Homework") ? "selected" : ""; ?>>Assignments & Homework</option>
                                <option <?php echo ($taskItems["category"] == "Exams & Quizzes") ? "selected" : ""; ?>>Exams & Quizzes</option>
                                <option <?php echo ($taskItems["category"] == "Projects & Group Work") ? "selected" : ""; ?>>Projects & Group Work</option>
                                <option <?php echo ($taskItems["category"] == "Personal & Extracurricular") ? "selected" : ""; ?>>Personal & Extracurricular</option>
                            </select>
                            <label for="validationCustom04" class="form-label">Status</label>
                            <select class="form-select" name="status" disabled>
                                <option <?php echo ($taskItems["status"] == "To-Do") ? "selected" : ""; ?> value="To-Do">To-Do</option>
                                <option <?php echo ($taskItems["status"] == "Doing") ? "selected" : ""; ?> value="Doing">Doing</option>
                                <option <?php echo ($taskItems["status"] == "Completed") ? "selected" : ""; ?> value="Completed">Completed</option>
                            </select>

                        </div>
                </div>

                </form>
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
} else if (isset($_POST["archive"])) {
    header("location:Archive.php");
}
ob_end_flush();
?>