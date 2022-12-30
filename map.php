<?php
session_start();
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel='stylesheet' type='text/css' href='backarrow.css'>
    <?php
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("SELECT * FROM properties WHERE Company = :company ;");
    $stmt->bindParam(':company', $_SESSION['company']);
    $stmt->execute();
    $test = $stmt->fetchAll();
    $properties = json_encode($test);
    ?>
    <script>
    var properties = (<?php echo $properties;?>);
    </script>
    <script type="module" src="./index.js"></script>
  </head>
  <body>
    <a href="homepage.php" class="arrow">&#8249;</a>
    <p align='center'><?php echo $_SESSION['name']?> - <?php echo $_SESSION['company']?></p><br>

    <!--The div element for the map -->
    <div id="map"></div>
    <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzpVcQynoGYjwPIJi4gAoIPvFBXI30J6w&callback=initMap&v=weekly"
    ></script>
  </body>
</html>