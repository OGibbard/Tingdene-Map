<?php
#Start session
session_start();

try{
    #Connect to database
    include_once("connection.php");
    #Prepare statement to set an admin account to a user account
    $stmt = $conn->prepare("UPDATE accounts SET AccountType = 'user' WHERE Username=:username");
    $stmt->bindParam(':username',$_POST['Username']);
    $stmt->execute();
}
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
$conn=null;

#Return to admin page
header('Location: admin.php');
?>