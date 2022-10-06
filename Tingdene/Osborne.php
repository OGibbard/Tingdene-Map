<?php
include_once ('..\connection.php')
;session_start();
if (isset($_SESSION['name'])==false){
  header('Location: ../login.php');
};
if ($_SESSION['accounttype']=='customer'){
    header('Location: ../homepage.php');
};
if ($_SESSION['company']!='Tingdene'){
    header('Location: ../homepage.php');
};

$stmt = $conn->prepare("SELECT * FROM properties WHERE WebsiteLink = 'Osborne' ;");
$stmt->execute();
$row= $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head>
        <Title>
            <?php echo $row['SiteName']; ?>
        </Title>    
    </head>
    <body>
        <a>Latitude: <?php echo $row['Latitude'];?></a>
        <br>
        <a>Longitude: <?php echo $row['Longitude'];?></a>
        <br>
        <a href='../map.php'>Click here to return to the map.</a>
    </body>
</html>