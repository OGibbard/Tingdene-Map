<?php
#Start session
session_start();

#Check if logged in
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
?>

<!DOCTYPE html>
<html>
  <head>
    <title><?php echo ($_SESSION['company']); ?> map</title>
    <!-- Map module -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- Import stylesheet -->
    <link rel="stylesheet" type="text/css" href="./gmaps.css" />
    <?php
    #Connect to database
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);
    #Get all properties from company
    $stmt = $conn->prepare("SELECT * FROM properties WHERE Company = :company ;");
    $stmt->bindParam(':company', $_SESSION['company']);
    $stmt->execute();
    $test = $stmt->fetchAll();
    #Change to javascript syntax
    $properties = json_encode($test);
    ?>
    <script>
    //get javascript variable from php
    var properties = (<?php echo $properties;?>);
    </script>
    <!-- Map data module -->
    <script type="module" src="./index.js"></script>
  </head>
  <body>
    <!-- Back arrow -->
    <a href="homepage.php" class="arrow">&#8249;</a>
    <!-- Large title -->
    <p align='center'><?php echo $_SESSION['name']?> - <?php echo $_SESSION['company']?></p><br>

    <!--The div element for the map -->
    <div id="map"></div>
    <!-- Map API -->
    <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzpVcQynoGYjwPIJi4gAoIPvFBXI30J6w&callback=initMap&v=weekly"
    ></script>
  </body>
</html>