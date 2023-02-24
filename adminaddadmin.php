<?php
#Start session
session_start();
try{
    #Connect to database
    include_once("connection.php");
    #Change user to admin
    $stmt = $conn->prepare("UPDATE accounts SET AccountType = 'admin' WHERE Username=:username");
    $stmt->bindParam(':username',$_POST['Username']);
    $stmt->execute();
}

#Provide error message
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }

try{
    #Update tier to tier 3 for the new admin
    $stmt = $conn->prepare("UPDATE accounts SET Tier = 3 WHERE Username=:username");
    $stmt->bindParam(':username',$_POST['Username']);
    $stmt->execute();
}

#Provide error message
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
$conn=null;

#Return to admiin page
header('Location: admin.php');
?>