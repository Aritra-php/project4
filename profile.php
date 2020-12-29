<!-------------start database connection--------------->
<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="project 3";
$conn=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
if(!$conn)
{
die("connection failed");
}
?>
<!-------------------End database connection--------------->

<!-------------------start php code------------------------>
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
$rName=$row['rName'];
$rAddress=$row['rAddress'];
?>
<!-------------------End php code-------------------------->

<!-------------------start profile form-------------------->
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<title>Profile.com</title>
</head>
<body>

<?php
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
$rName=$row['rName'];
$rEmail=$row['rEmail'];
$rAddress=$row['rAddress'];
$rImage=$row['rImage'];
?>

<div class="container">
<div class="row">
<div class="col-sm-12">
<form action="" method="POST">
<h2>Welcome to your profile</h2>

<div class="form-group">
<label for="Name">Name</label>
<input type="text" name="rName" class="form-control"
value="<?php echo $rName; ?>">
</div>

<div class="form-group">
<label for="Email">Email</label>
<input type="text" name="rEmail" class="form-control"
value="<?php if(isset($rEmail)) {echo $rEmail;}?>">
</div>

<div class="form-group">
<label for="Address">Address</label>
<input type="text" name="rAddress" class="form-control"
value="<?php echo $rAddress; ?>">

<img src="<?php if(isset($rImage)) {echo "images/".$row['rImage'];}?>" style="border-radius:100px;">

<input type="submit" value="Update" name="rUpdate" class="btn btn-success">
<input type="hidden" name="Srno" value="<?php if(isset($row['Srno'])) {echo $row['Srno'];}?>">
</div>
</form>
</div>
</div>
</div>
<a href="logout.php" class="btn btn-warning">Logout</a>
<a href="changepassword.php" class="btn btn-info">Change Password</a>

    


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
<!-------------------End profile form---------------------->


<!---------------------start php code for update button----------->
<?php
if(isset($_REQUEST['rUpdate']))
{
if(($_REQUEST['rName']=="")||($_REQUEST['rEmail']=="")||($_REQUEST['rAddress']==""))
{
echo '<div class="alert alert-warning mt-3 text-center">Please fill all the fields</div>';
}
else
{
$Srno=$_REQUEST['Srno'];
$rName=$_REQUEST['rName'];
$rEmail=$_REQUEST['rEmail'];
$rAddress=$_REQUEST['rAddress'];
$sql="UPDATE cofee SET rName='$rName',rEmail='$rEmail',rAddress='$rAddress' WHERE Srno='".$Srno."'";
if(mysqli_query($conn,$sql))
{
echo '<div class="alert alert-success mt-3 text-center">Name and Email and Address updated successfully</div>';
}
else
{
echo '<div class="alert alert-warning mt-3 text-center">Something is not valid</div>';
}
}
}
?>
<!---------------------End php code for update button------------->