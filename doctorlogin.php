<?php
session_start();?>
<?php
include 'connection.php';
if (isset($_POST['login'])) {
 	$uname=$_POST['uname'];
 	$password=$_POST['pass'];
 	$errror=array();
 	$q="SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
 	$k=mysqli_query($connect,$q);
 	$rows=mysqli_fetch_array($k);

 	if (empty($uname)) {
 		$errror['login']="Enter Username";
 	}
 	elseif(empty($password)){
 		$errror['login']="Enter Password";
 	}
 	elseif($rows['status']=="Pendding"){
 		$errror['login']="Please Wait For the Admin to Confirm";
 	}
 	elseif($rows['status']=="Rejected"){
 		$errror['login']="Try again Later";
 	}
 	if (count($errror)==0) {
 		$query="SELECT * FROM doctors WHERE username='$uname' AND password='$password'";
 		$res=mysqli_query($connect,$query);
 		if (mysqli_num_rows($res)) {
 			echo "<script>alert('done')</script>";
 			$_SESSION['doc']=$uname;
 			 header("Location:doctor/index.php");
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

<title>Doctor Login Page</title>

</head>

<body style="background-image: url(img/hosp.jpg); background-size:cover; background-repeat: no-repeat;">



<?php include 'header.php' ?>
<div class="container-fluid"> 
	<div class="col-md-12">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 jumbotron">
<h5 class="text-center my-5">Doctors Login</h5>
<?php echo $show; ?>
<form method="post">
<div class="form-group">
<label>Username</label>
<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">

</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password" autocomplete="off">
</div><br>
<input type="submit" name="login" class="btn btn-info" value="Login"><br>
<p style="background-color: hotpink;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Dont have an account🤷‍♂️<a href="apply.php">!!Apply Now!!</a></p>

</form>
</div>
</div>
</div>
</div>
</body>
</html>