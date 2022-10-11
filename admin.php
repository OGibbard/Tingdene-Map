<?php
session_start();
if (isset($_SESSION['name'])==false){
  header('Location: login.php');
};
if ($_SESSION['accounttype']!='admin'){
  header('Location: homepage.php');
};
?>
<!DOCTYPE html>
<body>
<br><h3>Admin for:</h3>
<h1><?php echo ($_SESSION['company']); ?></h1>
<br>
<a>Add account to company:</a>
<form action='adminadduser.php' method='POST'>
  User name:<input type='text' name='username'><br>
  Password:<input type='password' name='passwd'><br>
  <input type="submit" value="Add user">
</form>
<br>
<a>Add site to map:</a>
<form action='adminaddsite.php' method='POST'>
  Site name:<input type='text' name='sitename'><br>
  Site type:<input type='text' name='sitetype'><br>
  Latitude:<input type='text' name='latitude'><br>
  Longitude:<input type='text' name='longitude'><br>
  <input type="submit" value="Add site">
</form>
<br>
<a>Delete Site:</a>
<form action='admindeletesite.php' method="POST">
Site:<select name="SiteName"><br>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM properties WHERE Company=:company");
$stmt->bindParam(':company', $_SESSION['company']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  echo('<option value="'.$row["SiteName"].'">'.$row["SiteName"].'</option>');
}
?>
<input type="submit" value="Delete Site">
</form>
</body>