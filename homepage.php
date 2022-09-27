<?php
session_start();
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
?>
<!DOCTYPE html>
<html>
    <head>
        <Title>
            Homepage
        </Title>    
    </head>
    <body>
        <a href="map.php">Click here to go to the map.</a>
        <br>
        <a href="login.php">Click here to sign out.</a>
        <br>
        <a id="adminshow" href="admin.php">Click here for the admin page.</a>
        <script type="text/javascript">
            if("<?php echo $_SESSION['accounttype']; ?>" === 'admin'){
                document.getElementById("adminshow").style.display = "block";
            }else{
                document.getElementById("adminshow").style.display = "none";
            }
        </script>
    </body>
</html>