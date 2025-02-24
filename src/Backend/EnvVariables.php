<?php
//to load the env vriables like the api keys and so on 
require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->safeLoad();


// now all the .env variables can be loaded from the $_SEVER or $_ENV
