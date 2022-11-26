<?php
session_start();
include_once ('connection.php');

array_map('htmlspecialchars', $_POST);

$stmt = $conn->prepare("SELECT * FROM accounts WHERE Username =:username ;" ); 

$stmt->bindParam(':username', $_POST['username']); 

$stmt->execute();
$row= $stmt->fetch(PDO::FETCH_ASSOC);
if($_POST['username']==''){
    header('Location: login.php');
}elseif($row['Username']!=$_POST['username']){
    header('Location: login.php');
}else{
    $hashedPassword = hash('sha256', $_POST['passwd']);
    if($row['Password']== $hashedPassword){
        $_SESSION['name']=$row['Username'];

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

        $_SESSION['company']=$row['Company'];
        $_SESSION['Tier']=$row['Tier'];

    }
    else{
        header('Location: login.php');
    }
}
$conn=null;

?>