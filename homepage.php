<?php
session_start();
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
if ($_SESSION['accounttype']=='admin'){
    header('Location: homepageadmin.php');
};
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="menu.css">
        <Title>
            Homepage
        </Title>
    </head>
    <body>
    <nav class="navMenu">
        <a href="map.php">Map</a>
        <a href="login.php">Exit</a>
        <div class='dot'></div>
    </nav>
    </body>
</html>