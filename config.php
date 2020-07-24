<?php 

//show all errors
ini_set('display_startup_errors', 'On'); 
ini_set('display_errors', 'On'); 
error_reporting(-1); 



// Initialize connect with database
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $database = new PDO("mysql:host=$servername;dbname=etenis", $username, $password);
    // set the PDO error mode to exception
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

//registracia
require_once("PHPAuth/languages/en_GB.php");
require_once("PHPAuth/Config.php");
require_once("PHPAuth/Auth.php");


$config = new PHPAuth\Config($database);
$auth   = new PHPAuth\Auth($database, $config);

//var_dump($config);
//var_dump($auth);

 ?>