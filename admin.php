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


<a href='homepage.php'>Click here to return to the homepage.</a>
<br>
<a href='map.php'>Click here to go to the map.</a>
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


<a>Change Tier:</a>
<form action='adminchangetier.php' method="POST">
Username:<select name="Username"><br>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM accounts WHERE Company=:company AND AccountType='user'");
$stmt->bindParam(':company', $_SESSION['company']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  echo('<option value="'.$row["Username"].'">'.$row["Username"].'</option>');
}
?>
</select>
<br>
<input type='radio' name='Tier' value='1'>1
<input type='radio' name='Tier' value='2'>2
<input type='radio' name='Tier' value='3'>3
<input type="submit" value="Change Tier">
</form>


<br>


<a>Remove User:</a>
<form action='admindeleteuser.php' method="POST">
Username:<select name="Username"><br>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM accounts WHERE Company=:company AND AccountType='user'");
$stmt->bindParam(':company', $_SESSION['company']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  echo('<option value="'.$row["Username"].'">'.$row["Username"].'</option>');
}
?>
</select>
<input type="submit" value="Remove User">
</form>


<br>


<a>Add admin:</a>
<form action='adminaddadmin.php' method="POST">
Username:<select name="Username"><br>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM accounts WHERE Company=:company AND AccountType='user'");
$stmt->bindParam(':company', $_SESSION['company']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  echo('<option value="'.$row["Username"].'">'.$row["Username"].'</option>');
}
?>
</select>
<input type="submit" value="Add Admin">
</form>


<br>


<a>Remove Admin:</a>
<form action='admindeleteadmin.php' method="POST">
Username:<select name="Username"><br>
<?php
include_once("connection.php");
$stmt = $conn->prepare("SELECT * FROM accounts WHERE Company=:company AND AccountType='admin'");
$stmt->bindParam(':company', $_SESSION['company']);
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
  echo('<option value="'.$row["Username"].'">'.$row["Username"].'</option>');
}
?>
</select>
<br>
Click to Confirm:<input type='radio' onclick='showButton()'>
<input id='adminremovebutton' type="submit" value="Remove Admin">
<script type="text/javascript">
document.getElementById("adminremovebutton").style.display = "none";
function showButton(){
    document.getElementById("adminremovebutton").style.display = "block";
}
</script>
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
</select>
<input type="submit" value="Delete Site">
</form>


<br>


<form action="uploadmarker.php" method="post" enctype="multipart/form-data">
  Upload png for marker:
  <br>
  Name: <input type="text" name="markername"><br>
  File: <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <input type="submit" value="Upload Image" name="submit">
</form>
</body>