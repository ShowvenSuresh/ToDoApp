<?php
session_start();
include("DatabaseConnection.php");


$db = new DatabaseConnection();
$dbConn = $db->getConn();

function processLogin($email, $password)
{
    global $dbConn;
    $sql = "select uid from users where email ='$email' and password='$password'";
    $result = $dbConn->query($sql);

    if ($result->num_rows == 1) {
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
          values ('$email','$password','$firstName','$lastName','$phoneNumber')";
    $result = $dbConn->query($sql);
    if ($result == true) {
        echo "<script>alert('Sucessfull Signed Up...Please Proceed to  login')</script>";
        header("location:Login.php");
    }
}
