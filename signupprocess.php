<?php
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
$username=$_POST['username'];
$stmt = $conn->prepare("SELECT * FROM accounts WHERE Username = '$username'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result > 0) {
  header('Location: signup.php');
}
else {
    try{
        if ($_POST['accounttype']=='admin'){
            $stmt = $conn->prepare("INSERT INTO Accounts (Username,Password,AccountType,Company,Tier)VALUES (:username,:password,:accounttype,:company,1)");
        
            $stmt->bindParam(':username', $_POST["username"]);
            $stmt->bindParam(':password', $_POST['passwd']); 
            $stmt->bindParam(':accounttype', $_POST['accounttype']);
            $stmt->bindParam(':company', $_POST['company']);
            $stmt->execute();
        }
        else{
            $stmt = $conn->prepare("INSERT INTO Accounts (Username,Password,AccountType)VALUES (:username,:password,:accounttype)");
        
            $stmt->bindParam(':username', $_POST["username"]);
            $stmt->bindParam(':password', $_POST['passwd']);
            $stmt->bindParam(':accounttype', $_POST['accounttype']);
            $stmt->execute();
        }
        }
    catch(PDOException $e)
        {
            echo "error".$e->getMessage();
        }
    $conn=null;
    header('Location: login.php');
}

echo $_POST["username"]."<br>";
echo $_POST["passwd"]."<br>";
echo $_POST["accounttype"]."<br>";
print_r($_POST);
?>