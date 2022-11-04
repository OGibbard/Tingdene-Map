<?php
session_start();
try{
    include_once("connection.php");
    $stmt = $conn->prepare("UPDATE accounts SET Tier = :tier WHERE Username=:username");
    $stmt->bindParam(':username',$_POST['Username']);
    $stmt->bindParam(':tier',$_POST['Tier']);
    $stmt->execute();
}
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
$conn=null;

header('Location: admin.php');
?>