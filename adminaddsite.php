<?php
session_start();
try{
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);

    $stmt = $conn->prepare("INSERT INTO properties(SiteID,SiteName,SiteType,Latitude,Longitude,WebsiteLink,Company)VALUES (null,:SiteName,:SiteType,:Latitude,:Longitude,:WebsiteLink,:Company)");

    $stmt->bindParam(':SiteName', $_POST['sitename']);
    $stmt->bindParam(':SiteType', $_POST['sitetype']);
    $stmt->bindParam(':Latitude', $_POST['latitude']);
    $stmt->bindParam(':Longitude', $_POST['longitude']);
    $weblink = str_replace(" ", "-", $_POST['sitename']);
    $stmt->bindParam(':WebsiteLink', $weblink);
    $stmt->bindParam(':Company', $_SESSION['company']);
    $stmt->execute();
}
catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
$conn=null;
header('Location: admin.php');

echo $_POST["sitename"]."<br>";
echo $_POST["sitetype"]."<br>";
echo $_POST["latitude"]."<br>";
echo $_POST["longitude"]."<br>";
print_r($_POST);
?>