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
    print_r(count($stmt->fetch(PDO::FETCH_ASSOC)));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);
    ?>

    <script>var hello = <?php echo (52.679472); ?>;</script>
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