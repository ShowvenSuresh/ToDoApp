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

function getTaskName($status)
{
    global $dbConn;

    switch ($status) {
        case 1:
            $sql = "select task_name from tasks where uid = '" . $_SESSION["uid"] . "' and status ='To-Do' and isarchive=0";
            break;
        case 2:
            $sql = "select task_name from tasks where uid = '" . $_SESSION["uid"] . "' and status ='Doing' and isarchive=0";
            break;
        case 3:
            $sql = "select task_name from tasks where uid = '" . $_SESSION["uid"] . "' and status ='Completed' and isarchive=0";
            break;
        default:
            $sql = "select task_name from tasks where uid = '" . $_SESSION["uid"] . "' and isarchive=0";
    }

    $result = $dbConn->query($sql);

    if ($result->num_rows > 0) {

        return $result;
    }
}

function getTaskDetailsBasedOnName($taskName)
{
    global $dbConn;
    $sql = "select task_name, description, due_date, priority,category,status from tasks where uid = '" . $_SESSION["uid"] . "' and task_name='$taskName'";
    $result = $dbConn->query($sql);

    if ($result->num_rows == 1) {
        $taskDetails = $result->fetch_assoc();
        return $taskDetails;
    } else {
        echo "ERROR";
    }
}


function updateTask() {}
