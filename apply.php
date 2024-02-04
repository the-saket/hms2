<?php
 include 'connection.php';
if (isset($_POST['apply'])) {
$firstname = $_POST['fname'];
$surname = $_POST['sname']; 
$username=$_POST['uname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$country = $_POST['country']; 
$password= $_POST['pass'];
$confirm_password = $_POST['con_pass'];
$error= array();
if (empty($firstname)) {
$error['apply'] = "Enter Firstname" ;}
else if (empty($surname)){ $error['apply'] ="Enter surname"; }
else if(empty($username)){ $error['apply'] = "Enter username"; }
else if(empty($email)){
$error['apply'] = "Enter Email Address";
}else if($gender=""){
$error['apply'] = "Select Your Gender";
}else if(empty($phone)){
$error['apply'] = "Enter Phone Number";
}else if($country=""){
$error['apply'] = "Select Country";
}else if(empty($password)){
$error['apply'] = "Enter Password";
 }else if($confirm_password!=$password){

$error['apply'] = "Both Password do not match";
}
if (count($error) == 0) {
	$query="INSERT INTO  doctors (firstname,surname, username,email,gender,phone,country,password,salary,data_reg,status,profile) VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding','doctor.jpg')";
	$result=mysqli_query($connect,$query);
	if ($result) {
		echo "<script>alert('you have registered')";
		header("Location: doctorlogin.php");
	}else{
		echo "<script>alert('failed')";
	}

}}
if (isset($error['apply'])) {
	$s=$error['apply'];
	$show="<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
	$show="";
}?>
<!DOCTYPE html>

<html>

<head>

<title>Apply Now!</title>


</head>

<body style="background-image: url(img/host.jpg); background-size:cover; background-repeat: no-repeat;">
<?php include 'header.php'; ?>
<div class="container-fluid"> <div class="col-md-12">
<div class="row">
<div class="col-md-3"></div> <div class="col-md-6 my-3 jumbotron">
<h5 class="text-center">Register Now👨‍⚕️!!!</h5>
<div><?php echo $show;?></div>
<form method="post">
<div class="form-group"> <label>Firstname</label>
<input type="text" name="fname" class="form-control"
autocomplete="off" placeholder="Enter Firstname">
</div>
<div class="form-group"> <label>Surname</label>
<input type="text" name="sname" class="form-control"
autocomplete="off" placeholder="Enter Surname">
</div>
<div class="form-group"> <label>Username</label>
<input type="text" name="uname" class="form-control"
autocomplete="off" placeholder="Enter Username">
</div>
<div class="form-group"> <label>Email</label>
<input type="text" name="email" class="form-control"
autocomplete="off" placeholder="Enter Email address">
</div>
<div class="form-group"> <label>Select gender</label>
<select name="gender">
	<option value="">Select Gendr</option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select>
</div>
<div class="form-group"> <label>Phone Number</label>
<input type="number" name="phone" class="form-control"
autocomplete="off" placeholder="Enter Phone Number">
</div>
<div class="form-group"> <label>Select Country</label>
<select name="country">
	<option value="">Select country</option>
	<option value="India">India</option>
	<option value="Nepal">Nepal</option>
	<option value="Srilanka">Srilanka</option>
</select>
</div>
<div class="form-group"> <label>Password</label>
<input type="password" name="pass" class="form-control"
autocomplete="off" placeholder="Enter Password">
</div>
<div class="form-group"> <label>Confirm Password</label>
<input type="password" name="con_pass" class="form-control"
autocomplete="off" placeholder="Enter confirm Password">
</div>
<input type="submit" name="apply" value="Apply Now" class="btn btn-danger">
<p>Already have an account🤦‍♂️<a href="doctorlogin.php">Click here</a></p>
</form>
</div>
</div>
</div>
</div>
</body>
</html>