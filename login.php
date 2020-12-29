<!--------------start php code for database connection------>
<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="project 3";
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$conn)
{
die ("connection failed");
}
?>
<!--------------End php code for database connection--------->

<!----------------start php code for login form--------------->
<?php
session_start();
if(!isset($_SESSION['islogin']))
{
if(isset($_REQUEST['rLogin']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rPass']==""))
{
echo '<div class="alert alert-warning text-center">Please fill all the fields</div>';
}
else
{
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rPass=$_REQUEST['rPass'];
$sql="SELECT rName,rEmail,rPass FROM cofee WHERE rName='".$rName."' AND rEmail='".$rEmail."' AND rPass='".$rPass."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)==1)
{
$_SESSION['rName']=$rName;
$_SESSION['rEmail']=$rEmail;
$_SESSION['islogin']=true;
echo '<script>location.href="profile.php"</script>';
}
else
{
echo '<div class="alert alert-success text-center">Name,Email or Password is not valid</div>';
}
}
}
}
else
{
echo '<script>location.href="profile.php"</script>';
}
?>
<!----------------End php code for login form------------------>

<!--------------------start login form------------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>loginpage.com</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">

<form action="" method="POST" class="shadow-lg p-5">
<h2>Welcome to Login Page</h2>

<div class="form-group">
<label for="Name">Name</label>
<input type="text" placeholder="Type your name here" name="rName" class="form-control">
</div>

<div class="form-group">
<label for="Email">Email</label>
<input type="text" placeholder="Type your email here" name="rEmail" class="form-control">
</div>

<div class="form-group">
<label for="Password">Password</label>
<input type="password" placeholder="Type your password here" name="rPass" class="form-control">
</div>

<input type="submit" value="Login" name="rLogin" class="btn btn-secondary">
</form>
<a href="registrationpage.php" class="btn btn-success">Back To Registration Page</a>
</div>
</div>
</div>


<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
</body>
</html>
<!----------------------End Login Form------------------------->