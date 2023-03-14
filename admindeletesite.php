<?php
#Start session
session_start();

try{
    #Connect to database
    include_once("connection.php");
    #Prepare statement to get the site data of the site name inputted
    $stmt = $conn->prepare('SELECT * FROM properties WHERE SiteName=:name');
    $stmt->bindParam(':name',$_POST['SiteName']);
    $stmt->execute();
}
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
while ($row= $stmt->fetch(PDO::FETCH_ASSOC))
{
#Remove site file
unlink($_SESSION['company'].'/'.$row['WebsiteLink'] . '.php');
}
try{
    array_map("htmlspecialchars", $_POST);

    #Prepare statement to remove site from database
    $stmt = $conn->prepare("DELETE FROM properties WHERE SiteName=:name");
    $stmt->bindParam(':name',$_POST['SiteName']);
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