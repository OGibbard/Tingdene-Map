<?php
session_start();
include_once ('connection.php');

array_map('htmlspecialchars', $_POST);

$stmt = $conn->prepare("SELECT * FROM accounts WHERE Username =:username ;" ); 

$stmt->bindParam(':username', $_POST['username']); 

$stmt->execute();

while ($row= $stmt->fetch(PDO::FETCH_ASSOC))
{

    if($row['Password']== $_POST['passwd']){
        $_SESSION['name']=$row['Password'];

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
        
    else{
        header('Location: login.php');
        }
    }
}

echo $stmt->fetch(PDO::FETCH_ASSOC);

if($_POST['passwd']=='')
{
    header('Location: login.php');
}
$conn=null;

?>