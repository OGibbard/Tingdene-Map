<?php
session_start();

try{
    include_once("connection.php");
    $stmt = $conn->prepare("UPDATE accounts SET AccountType = 'admin' WHERE Username=:username");
    $stmt->bindParam(':username',$_POST['Username']);
    $stmt->execute();
}
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }

try{
    $stmt = $conn->prepare("UPDATE accounts SET Tier = 3 WHERE Username=:username");
    $stmt->bindParam(':username',$_POST['Username']);
    $stmt->execute();
}
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
$conn=null;

header('Location: admin.php');
?>