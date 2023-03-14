<?php
#Connect to database
include_once("connection.php");
array_map("htmlspecialchars", $_POST);
$username=$_POST['username'];
#See if username already exists in database
$stmt = $conn->prepare("SELECT * FROM accounts WHERE Username = '$username'");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
#Check if result contains anything
if ($result > 0) {
  header('Location: signup.php');
}
else {
    #Hash password
    $hashedPassword = hash('sha256', $_POST['passwd']);
    try{
        #If account will be admin
        if ($_POST['accounttype']=='admin'){
            #Create directory for company
            if (!file_exists($_POST['company'])) {
                mkdir($_POST['company'], 0777, true);
            #Add account to database
            $stmt = $conn->prepare("INSERT INTO Accounts (Username,Password,AccountType,Company,Tier)VALUES (:username,:password,:accounttype,:company,3)");
        
            $stmt->bindParam(':username', $_POST["username"]);
            $stmt->bindParam(':password', $hashedPassword); 
            $stmt->bindParam(':accounttype', $_POST['accounttype']);
            $stmt->bindParam(':company', $_POST['company']);
            $stmt->execute();
            print_r('!');
            }
        }
        else{
            #Add account to database
            $stmt = $conn->prepare("INSERT INTO Accounts (Username,Password,AccountType,Tier)VALUES (:username,:password,:accounttype,1)");
        
            $stmt->bindParam(':username', $_POST["username"]);
            $stmt->bindParam(':password', $hashedPassword);
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
echo '<br>';
echo $_POST["username"]."<br>";
echo $hashedPassword."<br>";
echo $_POST["accounttype"]."<br>";
echo $_POST['company'].'br';
?>