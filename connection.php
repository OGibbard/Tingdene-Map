<?php
#Variables of local network
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "main";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>