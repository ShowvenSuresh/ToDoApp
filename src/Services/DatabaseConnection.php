<?php
include("EnvVariables.php"); // Include the file that contains environment variables


// Class to handle database connection
class DatabaseConnection
{
    public $dbHost;
    public $dbUser;
    public $dbPassword;
    public $dbName;
    public $dbConn;

    public function __construct()
    {
        // Fetch database credentials from environment variables
        $this->dbHost = $_SERVER["DATABASE_HOST"];
        $this->dbUser = $_SERVER["DATABASE_USER"];
        $this->dbPassword = $_SERVER["DATABASE_PASSWORD"];
        $this->dbName = $_SERVER["DATABASE_NAME"];
        $this->dbConn = null;
    }

    public function getConn()
    {
         // Create a new database connection
        $dbConn = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);

        // Check if the connection was successful
        if ($dbConn->connect_error) {
            // Terminate the script and display the connection error message
            die("connection failed :" . $dbConn->connect_error);
            //echo "No conn detected";
        } else {
            // echo "Database Conected";
            return $dbConn;
        }
    }
}

//$dataConn = new DatabaseConnection();

//$dataConn->getConn();
