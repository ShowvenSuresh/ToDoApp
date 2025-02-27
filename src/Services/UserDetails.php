<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
include_once("DatabaseConnection.php");

$db = new DatabaseConnection();
$dbConn = $db->getConn();

function getUserDetails() // this function just recives the current user data and stores it in the $_session superglobal;
{
    global $dbConn;
    $sql = "select email,first_name,last_name,phone_num from users where uid='" . $_SESSION["uid"] . "'";
    $result = $dbConn->query($sql);

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();
        $_SESSION["email"] = $data["email"];
        $_SESSION["first_name"] = $data["first_name"];
        $_SESSION["last_name"] = $data["last_name"];
        $_SESSION["phone_num"] = $data["phone_num"];
        return $data;
    } else {
        echo "ERROR";
    }
}

function updateDetails($email, $firstName, $lastName, $phoneNumber) //this function overides the all the exsiting data in the current table
{
    global $dbConn;
    $sql = "update users set email='$email' ,first_name='$firstName' ,last_name='$lastName' ,phone_num='$phoneNumber' where uid='" . $_SESSION['uid'] . "'";
    $result = $dbConn->query($sql);

    if ($result === true) {
        header("location:../Views/Profile.php"); //reload the page to  see the changes 
        return true;
    } else {
        echo "<script>arlet('error')</script>";
    }
}
