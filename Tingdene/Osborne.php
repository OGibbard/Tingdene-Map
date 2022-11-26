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
<h2><?php echo $row['Company'];?></h2>
<br>
<a>Name: <?php echo $row['SiteName'];?></a>
<br>
<a>Site type: <?php echo $row['SiteType'];?></a>
<br>
<a>Latitude: <?php echo $row['Latitude'];?></a>
<br>
<a>Longitude: <?php echo $row['Longitude'];?></a>
<br>
<a id='area'>Area: <?php echo $row['Area'];?> acres</a>
<a id='valuation'>Valuation: £<?php echo $row['Valuation'];?></a>
<a>Capacity: <?php echo $row['Capacity'];?></a>
<br>
<a href='../map.php'>Click here to return to the map.</a>
</body>
<script>
document.getElementById('area').style.display = 'none';
document.getElementById('valuation').style.display = 'none';
if (<?php echo $_SESSION['Tier'];?>===3){
document.getElementById('area').style.display = 'block';
document.getElementById('valuation').style.display = 'block';
}else if (<?php echo $_SESSION['Tier'];?>===2){
document.getElementById('area').style.display = 'block';
}
</script>
</html>