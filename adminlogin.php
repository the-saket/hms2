<?php
session_start();
include 'connection.php';
if(isset($_POST['login'])){
	$username=$_POST['uname'];
	$password=$_POST['pass'];
	$error=array();
	if (empty($username)) {
		$error['admin']="Enter Username";
	}else if (empty($password)) {
		$error['admin']="Enter Password";
	}
	if (count($error)==0) {
		$query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
		$result=mysqli_query($connect,$query);
		if(mysqli_num_rows($result)==1) {	
		echo "<script>alert('you are logged in🤷‍♂️')</script>";	
		$_SESSION['admin']=$username;	
		header("Location:admin/index.php");
		exit();
		}else{
			echo "<script>alert('Invalid Username or Password')</script>";	
		}
	}

}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Login Page</title>
</head>
<body style="background-image: url('img/hos.jpg');">
<?php include 'header.php' ?>
<div style="margin-top:30px;"></div>
<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-3"></div>
			<div class="jumbotron"><div class="box " style="height:77%;width: 31%;  margin-left: 350px;margin-top: 100px;border: solid 3px black;background-color: floralwhite;">
				<img src="img/ad.jpg" style="height:100px;width: 340px;">
					<form method="post">
						<div class="alert alert-danger">
							<?php
							if (isset($error['admin'])) {
								$sh=$error['admin'];
								$show="<h5 >$sh</h5>";
							}else{
								$show="";
							}
							echo $show;?></div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username!"></div>
							<div class="form-group">
								<label>Password</label>
								<input type="Password" name="pass" class="form-control">
							</div>
							<input type="submit" name="login" value="Login👈" class="btn btn-success">

					</form></div></div>
					<div class="col-md-3"></div>
				</div></div></div>
</body>
</html>