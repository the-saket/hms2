<?php
session_start();?>
<?php
include 'connection.php';
if (isset($_POST['login'])) {
 	$uname=$_POST['uname'];
 	$password=$_POST['pass'];
 	$errror=array();
 	$q="SELECT * FROM patients WHERE username='$uname' AND password='$password'";
 	$k=mysqli_query($connect,$q);
 	$rows=mysqli_fetch_array($k);

 	if (empty($uname)) {
 		$errror['login']="Enter Username";
 	}
 	elseif(empty($password)){
 		$errror['login']="Enter Password";
 	}
 	if (count($errror)==0) {
 		$query="SELECT * FROM patients WHERE username='$uname' AND password='$password'";
 		$res=mysqli_query($connect,$query);
 		if (mysqli_num_rows($res)) {
 			echo "<script>alert('done')</script>";
 			$_SESSION['patient']=$uname;
 			 header("Location:patient/index.php");
 		}
 		else{
 			echo "<script>alert('Inavlid account')</script>";
 		}
 	}
 }
 if(isset($errror['login'])){
 	$l=$errror['login'];
 	$show="<h5 class='text-center alert alert-danger'>$l</h5>";
 }else{
 	$show="";
 } 
 ?>
<!DOCTYPE html>

<html>

<head>

<title>Patient Login Page</title>

</head>

<body style="background-image: url(img/htp.jpg); background-size:cover; background-repeat: no-repeat;">



<?php include 'header.php' ?>
<div class="container-fluid"> 
	<div class="col-md-12">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 jumbotron">
<h3 class="text-center my-5" style="color:brown;background-color:powderblue;">Patients Login</h3>
<?php echo $show; ?>
<form method="post">
<div class="form-group">
<label><h6 style="background-color:powderblue;">Username</h6></label>
<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">

</div>
<div class="form-group">
<label><h6 style="background-color:powderblue;">Password</h6></label>
<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" autocomplete="off">
</div><br>
<input type="submit" name="login" class="btn btn-info" value="Login"><br>
<p style="background-color: hotpink;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Dont have an account🤷‍♂️<a href="account.php">!!Apply Now!!</a></p>

</form>
</div>
</div>
</div>
</div>
</body>
</html>