<?php
// Turn off error display
ini_set('display_errors', '0');

// Enable error logging
ini_set('log_errors', '1');

// Set the error reporting level to log all errors
error_reporting(E_ALL);

// Optional: Specify the log file path
ini_set('error_log', __DIR__ . '/../../Logs/Error.log');



