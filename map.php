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
    $k=0;
    $properties = array();
    while(True){
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result ==('')){
      echo ("ABCDEF <br>");
      print_r($result);
      var_dump($result['SiteName']);
      break;
    }
    else{
      print_r($result['SiteName']);
      print_r($result);
      print_r($k);
      print_r("<br>");
    }
    $k=$k+1;
    }
    ?>

    <script>var hello = <?php echo (52.679472); ?>;</script>

    <script>
    while (True) {
        
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