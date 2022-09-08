<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./gmaps.css" />
    
    <?php
    include_once("connection.php");
    array_map("htmlspecialchars", $_POST);
    $stmt = $conn->prepare("SELECT * FROM properties");
    $stmt->execute();
    //$result = $stmt->fetch(PDO::FETCH_ASSOC);
    $test = $stmt->fetchAll();
    print_r($test);
    //$properties = json_encode($result);
    $properties = json_encode($test);
    ?>

    <script>var hello = <?php echo (52.679472); ?>;</script>

    <script>
    //var properties = [];
    for (let i = 0; i < 4; i++) {
    var properties = (<?php echo $properties;?>);
    }
    </script>

    <script type="module" src="./index.js"></script>

  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzpVcQynoGYjwPIJi4gAoIPvFBXI30J6w&callback=initMap&v=weekly"
    ></script>
  </body>
</html>