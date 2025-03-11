<?php
include_once("../Services/ErrorHandling.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Styles.css" rel="stylesheet">
    <title>ToDoApp</title>
</head>

<body class="AuthBody">
    <div>
        <form class="form-control1" method="POST">
            <p class="title0">Sign Up</p>
            <div class="input-field">
                <input required="" class="input" type="text" name="email" />
                <label class="label" for="input">Email</label>
            </div>
            <div class="input-field">
                <input required="" class="input" type="password" name="password" />
                <label class="label" for="input">Password</label>
            </div>
            <div class="input-field">
                <input required="" class="input" type="text" name="firstname" />
                <label class="label" for="input">First Name</label>
            </div>
            <div class="input-field">
                <input required="" class="input" type="text" name="lastname" />
                <label class="label" for="input">Last Name</label>
            </div>
            <div class="input-field">
                <input required="" class="input" type="text" name="phonenum" />
                <label class="label" for="input">Phone Number</label>
            </div>
            <input class="submit-btn" type="submit" value="Sign Up" name="signUp" />
            <p>Got Account?</p>
            <a href="./Login.php">
                Sign In
            </a>
        </form>

    </div>
</body>

</html>
<?php
include("../Services/Authentication.php");
if (isset($_POST["signUp"])) {
    processSignUp($_POST["email"], $_POST["password"], $_POST["firstname"], $_POST["lastname"], $_POST["phonenum"]);
}
?>