<?php
session_start();
try{
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);

    $stmt = $conn->prepare("INSERT INTO properties(SiteID,SiteName,SiteType,Latitude,Longitude,WebsiteLink,Company,Area,Valuation,Capacity)VALUES (null,:SiteName,:SiteType,:Latitude,:Longitude,:WebsiteLink,:Company,:Area,:Valuation,:Capacity)");

    $stmt->bindParam(':SiteName', $_POST['sitename']);
    $stmt->bindParam(':SiteType', $_POST['sitetype']);
    $stmt->bindParam(':Latitude', $_POST['latitude']);
    $stmt->bindParam(':Longitude', $_POST['longitude']);
    $stmt->bindParam(':Area', $_POST['area']);
    $stmt->bindParam(':Valuation', $_POST['valuation']);
    $stmt->bindParam(':Capacity', $_POST['capacity']);
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

$txt = ("<?php\ninclude_once ('..\connection.php');\nsession_start();\nif (isset(\$_SESSION['name'])==false){\n  header('Location: ../login.php');\n};\nif (\$_SESSION['accounttype']=='customer'){\n    header('Location: ../homepage.php');\n};\nif (\$_SESSION['company']!='".$_SESSION['company']."'){\n    header('Location: ../homepage.php');\n};\n\n\$stmt = \$conn->prepare(\"SELECT * FROM properties WHERE WebsiteLink = '".$weblink."' AND Company = \$_SESSION['company']';\");\n\$stmt->execute();\n\$row= \$stmt->fetch(PDO::FETCH_ASSOC);\n?>\n\n<!DOCTYPE html>\n<html>\n    <head>\n        <Title>\n            <?php echo \$row['SiteName']; ?>\n        </Title>    \n    </head>\n    <body>\n<h2><?php echo \$row['Company'];?></h2>\n<br>\n<a>Name: <?php echo \$row['SiteName'];?></a>\n<br>\n<a>Site type: <?php echo \$row['SiteType'];?></a>\n<br>\n<a>Latitude: <?php echo \$row['Latitude'];?></a>\n<br>\n<a>Longitude: <?php echo \$row['Longitude'];?></a>\n<br>\n<a id='area'>Area: <?php echo \$row['Area'];?> acres</a>\n<a id='valuation'>Valuation: £<?php echo \$row['Valuation'];?></a>\n<a>Capacity: <?php echo \$row['Capacity'];?></a>\n<br>\n<a href='../map.php'>Click here to return to the map.</a>\n</body>\n<script>\ndocument.getElementById('area').style.display = 'none';\ndocument.getElementById('valuation').style.display = 'none';\nif (<?php echo \$_SESSION['Tier'];?>===3){\ndocument.getElementById('area').style.display = 'block';\ndocument.getElementById('valuation').style.display = 'block';\n}else if (<?php echo \$_SESSION['Tier'];?>===2){\ndocument.getElementById('area').style.display = 'block';\n}\n</script>\n</html>");

$newfile = fopen($_SESSION['company'].'/'.$weblink . '.php', 'w');
fwrite($newfile, $txt);
fclose($newfile);

header('Location: admin.php');

echo $_POST["sitename"]."<br>";
echo $_POST["sitetype"]."<br>";
echo $_POST["latitude"]."<br>";
echo $_POST["longitude"]."<br>";
?>