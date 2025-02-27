<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styles.css" rel="stylesheet">
    <title>ToDoApp</title>
</head>

<body class="body">

    <div class="navbar">
        <button class="value">
            Dashboard
        </button>
        <button class="value">
            View
        </button>
        <button class="value">
            Profile
        </button>
        <button class="value">
            Notifications
        </button>

        <form method="POST">
            <button class="value" type=submit name="signOut">
                Logout
            </button>
        </form>
    </div>
    <div class="dashboard">
        <div class="card"></div>
        <div class="card"></div>
        <div class="card"></div>
    </div>

</body>

</html>
<?php
include("../Services/Authentication.php");
if (isset($_POST["signOut"])) {
    processSignOut();
}
?>