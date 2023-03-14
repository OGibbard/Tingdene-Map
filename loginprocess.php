<?php
#Start session
session_start();
#Connect to database
include_once ('connection.php');
array_map('htmlspecialchars', $_POST);
#Get all information about the user's account who is trying to log in
$stmt = $conn->prepare("SELECT * FROM accounts WHERE Username =:username ;" ); 

$stmt->bindParam(':username', $_POST['username']); 

$stmt->execute();

$row= $stmt->fetch(PDO::FETCH_ASSOC);
#if username is empty
if($_POST['username']==''){
    header('Location: login.php');
#if username is not in the database
}elseif($row['Username']!=$_POST['username']){
    header('Location: login.php');
}else{
    #Hash password
    $hashedPassword = hash('sha256', $_POST['passwd']);
    #if password is the password in the database
    if($row['Password']== $hashedPassword){
        #log in
        $_SESSION['name']=$row['Username'];
        
        #set account type
        if($row['AccountType']=='user'){
            $_SESSION['accounttype']='user';
            header('Location: homepage.php');

        }elseif($row['AccountType']=='customer'){
            $_SESSION['accounttype']='customer';
            header('Location: homepage.php');

        }elseif($row['AccountType']=='admin'){
            $_SESSION['accounttype']='admin';
            header('Location: homepage.php');
        }

        #set session company and tier
        $_SESSION['company']=$row['Company'];
        $_SESSION['Tier']=$row['Tier'];

    }
    else{
        #Login failed
        header('Location: login.php');
    }
}
$conn=null;

?>