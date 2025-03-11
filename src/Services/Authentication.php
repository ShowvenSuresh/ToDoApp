<?php
session_start();
include_once("DatabaseConnection.php"); // Include the database connection file


$db = new DatabaseConnection();// Create an instance of the database connection
$dbConn = $db->getConn();

function processLogin($email, $password)
{
    global $dbConn;
    $sql = "select uid from users where email ='$email' and password='$password'"; // Query to check if the email and password match a user in the database
    $result = $dbConn->query($sql);

    if ($result->num_rows == 1) { // If a matching user is found, set session and redirect to MainPage.php
        $details = $result->fetch_assoc();
        $_SESSION["uid"] = $details["uid"];
        header("location:MainPage.php");
    } else {
        echo "<script>alert('Incorrect Email address or password')</script>";
    }
}


function processSignOut()
{
    session_unset();
    //removes all the session data 
    session_destroy();
    //delete all the session data
    header("location:Login.php");
}


function processSignUp($email, $password, $firstName, $lastName, $phoneNumber)
{
    global $dbConn;
    $sql = "insert into users(email,password,first_name,last_name,phone_num)
          values ('$email','$password','$firstName','$lastName','$phoneNumber')"; // Insert the new user's details into the database
    $result = $dbConn->query($sql);

    // If the insertion is successful, alert the user and redirect to login page
    if ($result === true) {
        echo "<script>alert('Sucessfull Signed Up...Please Proceed to  login')</script>";
        header("location:Login.php");
    }
}
