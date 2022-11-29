<?php
session_start();
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./gmaps.css" />
    
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
    <a><?php echo $_SESSION['name']?><a><br>
    <a href='homepage.php'>Click here to return to the homepage.</a>
    <a id="adminshow" href="admin.php">Click here for the admin page.</a>
        <script type="text/javascript">
            if("<?php echo $_SESSION['accounttype']; ?>" === 'admin'){
                document.getElementById("adminshow").style.display = "block";
            }else{
                document.getElementById("adminshow").style.display = "none";
            }
        </script>
    <h3>My Google Maps Demo</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <script async
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzpVcQynoGYjwPIJi4gAoIPvFBXI30J6w&callback=initMap&v=weekly"
    ></script>
  </body>
</html>