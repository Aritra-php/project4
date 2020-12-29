<!-----------------start database connection--------------------->
<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="project 3";
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$conn)
{
die("Connection failed");
}
else
{
echo "Connected";
}
?>
<!---------------------End database connection----------------------->

<!---------------------start html code----------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<title>changePassword.com</title>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['islogin']))
{
$rEmail=$_SESSION['rEmail'];
}
else
{
echo '<script>location.href="login.php"</script>';
}
$sql="SELECT *FROM cofee WHERE rEmail='".$rEmail."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$rPass=$row['rPass'];
?>
<div class="container mt-5">
<div class="row">
<div class="col-sm-4">
<form action="" method="POST">
<h4>Welcome to change password portal</h4>
<label for="Password">Password</label>
<input type="text" placeholder="Type your password here" name="rPass" class="form-control"
value="<?php if(isset($row['rPass'])) {echo $row['rPass'];}?>">

<label for="Confirm Password">Confirm Password</label>
<input type="text" placeholder="Confirm your password here" name="rConPass" class="form-control"
value="<?php if(isset($row['rConPass'])) {echo $row['rConPass'];}?>">

<input type="hidden" name="Srno" value="<?php if(isset($row['Srno'])) {echo $row['Srno'];}?>">

<input type="submit" value="Update" name="Update" class="btn btn-primary">
</form>
<a href="login.php" class="btn btn-warning">Back to Login page</a>
</div>
</div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
</body>
</html>
<!---------------------End html code----------------------------->



<!---------------------start php code for update button----------->
<?php
if(isset($_REQUEST['Update']))
{
if(($_REQUEST['rPass']=="")||($_REQUEST['rConPass']==""))
{
echo '<div class="alert alert-warning mt-3 text-center">Please fill all the fields</div>';
}
else
{
$Srno=$_REQUEST['Srno'];
$rPass=$_REQUEST['rPass'];
$rConPass=$_REQUEST['rConPass'];
if($rPass==$rConPass)
{
$sql="UPDATE cofee SET rPass='$rPass',rConPass='$rConPass' WHERE Srno='".$Srno."'";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-warning mt-3 text-center">Password updated successfully</div>';
}
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Password and Confirm Password must be same</div>';
}
}
}
?>
<!---------------------End php code for update button------------->



