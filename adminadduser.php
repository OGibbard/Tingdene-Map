<?php
#Start session
session_start();

#Connect to database
include_once ('connection.php');
print_r($_POST);

array_map('htmlspecialchars', $_POST);

#Prepare statement to get all data for the account to add
$stmt = $conn->prepare("SELECT * FROM accounts WHERE Username =:username ;" ); 

$stmt->bindParam(':username', $_POST['username']); 

$stmt->execute();

#Check if password is correct
while ($row= $stmt->fetch(PDO::FETCH_ASSOC))
{
    #Hash the inputted password
    $hashedPassword = hash('sha256', $_POST['passwd']);

    #If correct
    if($row['Password']== $hashedPassword){
        #If account is a user
        if($row['AccountType']=='user'){
        try{
        #Prepare statement to add the user to the company
        $stmt = $conn->prepare("UPDATE accounts SET Company = :company WHERE Username = :username ;");
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':company', $_SESSION['company']);
        $stmt->execute();
        #Return to admin page
        header('Location: admin.php');
        }
        catch(PDOException $e)
            {
                echo "error".$e->getMessage();
            }
    }
    #If not a user
    else{
        #Return to admin page
        header('Location: admin.php');
    }
    }
    #If password is incorrect
    else{
        #Return to admin page
        header('Location: admin.php');
    }
}

echo $stmt->fetch(PDO::FETCH_ASSOC);

$conn=null;
#Return to admin page
header('Location: admin.php')
?>