<?php
session_start();

try{
    include_once("connection.php");
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
unlink($_SESSION['company'].'/'.$row['WebsiteLink'] . '.php');
}
try{
    array_map("htmlspecialchars", $_POST);

    $stmt = $conn->prepare("DELETE FROM properties WHERE SiteName=:name");
    $stmt->bindParam(':name',$_POST['SiteName']);
    $stmt->execute();
}
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
$conn=null;

header('Location: admin.php');
?>