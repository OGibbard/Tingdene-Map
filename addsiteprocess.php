<?php
try{
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);

    $stmt = $conn->prepare("INSERT INTO Accounts (Username,Password,AccountType)VALUES (:username,:password,:accounttype)");

    $stmt->bindParam(':username', $_POST["username"]);
    $stmt->bindParam(':password', $_POST['passwd']); 
    $stmt->bindParam(':accounttype', $_POST['accounttype']); 
    $stmt->execute();
}
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
$conn=null;
//header('Location: login.php');

echo $_POST["username"]."<br>";
echo $_POST["passwd"]."<br>";
echo $_POST["accounttype"]."<br>";
print_r($_POST);
?>