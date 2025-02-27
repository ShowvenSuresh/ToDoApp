<?php
include("EnvVariables.php");

class DatabaseConnection
{
    public $dbHost;
    public $dbUser;
    public $dbPassword;
    public $dbName;
    public $dbConn;

    public function __construct()
    {
        $this->dbHost = $_SERVER["DATABASE_HOST"];
        $this->dbUser = $_SERVER["DATABASE_USER"];
        $this->dbPassword = $_SERVER["DATABASE_PASSWORD"];
        $this->dbName = $_SERVER["DATABASE_NAME"];
        $this->dbConn = null;
    }

    public function getConn()
    {
        $dbConn = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);

        if ($dbConn->connect_error) {
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
