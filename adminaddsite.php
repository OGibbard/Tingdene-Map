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

$txt = ("<?php\ninclude_once ('..\connection.php')\n;session_start();\nif (isset(\$_SESSION['name'])==false){\n  header('Location: ../login.php');\n};\nif (\$_SESSION['accounttype']=='customer'){\n    header('Location: ../homepage.php');\n};\nif (\$_SESSION['company']!='".$_SESSION['company']."'){\n    header('Location: ../homepage.php');\n};\n\n\$stmt = \$conn->prepare(\"SELECT * FROM properties WHERE WebsiteLink = '".$weblink."' ;\");\n\$stmt->execute();\n\$row= \$stmt->fetch(PDO::FETCH_ASSOC);\n?>\n\n<!DOCTYPE html>\n<html>\n    <head>\n        <Title>\n            <?php echo \$row['SiteName']; ?>\n        </Title>    \n    </head>\n    <body>\n        <a>Latitude: <?php echo \$row['Latitude'];?></a>\n        <br>\n        <a>Longitude: <?php echo \$row['Longitude'];?></a>\n        <br>\n        <a href='../map.php'>Click here to return to the map.</a>\n    </body>\n</html>");

$newfile = fopen($_SESSION['company'].'/'.$weblink . '.php', 'w');
fwrite($newfile, $txt);
fclose($newfile);

header('Location: admin.php');

echo $_POST["sitename"]."<br>";
echo $_POST["sitetype"]."<br>";
echo $_POST["latitude"]."<br>";
echo $_POST["longitude"]."<br>";
print_r($_POST);
?>