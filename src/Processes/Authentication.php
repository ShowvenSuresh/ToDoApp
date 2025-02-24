<?php
include("DatabaseConnection.php");


$db = new DatabaseConnection();
$dbConn = $db->getConn();

function processLogin()
{
    global $dbConn;
}


function processSignOut() {}


function processSignUp() {}
processLogin();
