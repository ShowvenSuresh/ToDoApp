<?php
session_start();

if (isset($_SESSION["uid"])) {
    header("location:MainPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styles.css" rel="stylesheet">
    <title>ToDoApp</title>
</head>

<body class="AuthBody">
    <div>
        <form class="form-control" method="POST">
            <p class="title0">To-Do App</p>
            <p class="title0">Login</p>
            <div class="input-field">
                <input required="" class="input" type="text" name="email" />
                <label class="label" for="input">Enter Email</label>
            </div>
            <div class="input-field">
                <input required="" class="input" type="password" name="password" />
                <label class="label" for="input">Enter Password</label>
            </div>
            <input class="submit-btn" type="submit" value="Sign In" name="signIn" />
            <p>No Account?</p>
            <a href="./SignUp.php">
                Sign UP
            </a>
        </form>

    </div>
</body>

</html>
<?php
include("../Services/Authentication.php");
if (isset($_POST["signIn"])) {
    processLogin($_POST["email"], $_POST["password"],);
}
?>