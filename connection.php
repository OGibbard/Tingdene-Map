<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "main";
$port = 3306;
$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $servername,
    $user,
    $password,
    $dbname,
    $port
);

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