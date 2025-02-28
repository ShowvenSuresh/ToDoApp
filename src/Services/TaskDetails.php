<?php
session_start();

include_once("DatabaseConnection.php");

$db = new DatabaseConnection();
$dbConn = $db->getConn();

function addTask($taskName, $description, $dueDate, $priority, $category, $status)
{
    global $dbConn;
    $isArchive = 0;
    $sql = "insert into tasks(uid,task_name,description,due_date,priority,category,status,isarchive)
          values('" . $_SESSION['uid'] . "','$taskName','$description','$dueDate','$priority','$category','$status','$isArchive')";
    $result = $dbConn->query($sql);

    if ($result === true) {
        header("location:MainPage.php");
    }
}
