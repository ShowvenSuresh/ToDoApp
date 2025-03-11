<?php
session_start();
// Start the session to manage user authentication

include_once("DatabaseConnection.php"); // Include the database connection file

$db = new DatabaseConnection(); // Create an instance of the database connection
$dbConn = $db->getConn();

function addTask($taskName, $description, $dueDate, $priority, $category, $status)
{
    global $dbConn;
    $isArchive = 0; // Default value for isArchive field

     // Insert new task into the database
    $sql = "insert into tasks(uid,task_name,description,due_date,priority,category,status,isarchive)
          values('" . $_SESSION['uid'] . "','$taskName','$description','$dueDate','$priority','$category','$status','$isArchive')";
    $result = $dbConn->query($sql);


    // If task is added successfully, clear POST data and redirect
    if ($result === true) {
        unset($_POST);
        header("location:MainPage.php");
    }
}

function getTaskName($status)
{
    global $dbConn;

     // Determine SQL query based on task status

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
        case 4:
            $sql = "select task_name from tasks where uid = '" . $_SESSION["uid"] . "' and  isarchive=1";
            break;
        case 5:
            $sql = "select task_name from tasks where uid = '" . $_SESSION["uid"] . "'";
            break;
        case 6:  // Retrieve tasks that are high priority or have a due date within 2 days
            $thresholdDate = date('Y-m-d', strtotime('+2 days'));
            $sql = "select task_name from tasks where uid = '" . $_SESSION["uid"] . "' and (priority = 'High' OR due_date <= '$thresholdDate') and (status='To-Do' or status='Doing')";
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
    $sql = "select task_id,task_name, description, due_date, priority,category,status from tasks where uid = '" . $_SESSION["uid"] . "' and task_name='$taskName'";
    $result = $dbConn->query($sql);


     // If a matching task is found, return task details
    if ($result->num_rows == 1) {
        $taskDetails = $result->fetch_assoc();
        return $taskDetails;
    } else {
        echo "ERROR";
    }
}


function updateTask($taskId, $taskName, $description, $dueDate, $priority, $category, $status, $isArchive)
{
     // Update task details in the database
    global $dbConn;
    $sql = "UPDATE tasks 
            SET task_name = '$taskName', 
                description = '$description', 
                due_date = '$dueDate', 
                priority = '$priority', 
                category = '$category', 
                status = '$status', 
                isarchive = '$isArchive' 
             WHERE task_id = '$taskId'";

    $result = $dbConn->query($sql);

    if ($result === true) {
        // Redirect on success and exit to prevent further output
        header("Location: MainPage.php");
        exit;
    } else {
        // Output the SQL error for debugging 
        echo "<script>alert('Error updating task: " . $dbConn->error . "');</script>";
    }
}


function deleteTask($taskId)
{
    global $dbConn;
    $sql = "delete from tasks where task_id='$taskId'";
    $result = $dbConn->query($sql);

    if ($result === true) {
        header("location:MainPage.php"); //reload the page to  see the changes 
        return true;
    } else {
        echo "<script>arlet('error')</script>";
    }
}

function getFiltredTask($filter, $status)
{
     // Determine SQL query based on filtering criteria
    global $dbConn;
    switch ($status) {
        case 1:
            $sql = "select task_name from tasks where category='$filter' and uid='" . $_SESSION["uid"] . "' ";
            break;
        case 2:
            $sql = "select task_name from tasks where priority='$filter' and uid='" . $_SESSION["uid"] . "' ";
            break;
    }
    $result = $dbConn->query($sql);

    $result = $dbConn->query($sql);

    if ($result->num_rows > 0) {

        return $result;
    }
}

function getNotificationCount()
{
    global $dbConn;
    // Define your threshold for due date approaching (e.g., next 2 days)
    $thresholdDate = date('Y-m-d', strtotime('+2 days'));


    $sql = "select count(*) as count from tasks where uid = '" . $_SESSION["uid"] . "' and (priority = 'High' OR due_date <= '$thresholdDate') and (status='To-Do' or status='Doing')";
    $result = $dbConn->query($sql);


    $data = $result->fetch_assoc();

    return $data['count'];
}
