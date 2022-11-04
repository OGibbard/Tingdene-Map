<?php
session_start();
include_once ('connection.php');
print_r($_POST);

array_map('htmlspecialchars', $_POST);

$stmt = $conn->prepare("SELECT * FROM accounts WHERE Username =:username ;" ); 

$stmt->bindParam(':username', $_POST['username']); 

$stmt->execute();
while ($row= $stmt->fetch(PDO::FETCH_ASSOC))
{

    if($row['Password']== $_POST['passwd']){
        if($row['AccountType']=='user'){
        try{
        $stmt = $conn->prepare("UPDATE accounts SET Company = :company WHERE Username = :username ;");
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':company', $_SESSION['company']);
        $stmt->execute();
        header('Location: admin.php');
        }
        catch(PDOException $e)
            {
                echo "error".$e->getMessage();
            }
    }
    else{
        header('Location: admin.php');
    }
    }
    else{
        header('Location: admin.php');
    }
}

echo $stmt->fetch(PDO::FETCH_ASSOC);

$conn=null;

?>