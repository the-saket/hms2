<?php
session_start();?>

<!DOCTYPE html>

<html>

<head>

<title>Book Appointment</title>


</head>

<body style="background-image: url(img/pp.jpg); background-size:cover; background-repeat: no-repeat;"><?php include '../header.php'; ?>
<?php 
include '../connection.php';
$ad=$_SESSION['patient'];
$query="SELECT * FROM patients WHERE username='$ad'";
$res=mysqli_query($connect,$query); 
while ($row=mysqli_fetch_array($res)) {
 	$fname=$row['firstname'];
 	$sname=$row['surname'];
 	$gender=$row['gender'];
 } ?>
<?php
if (isset($_POST['book'])) {
$appointment = $_POST['app_date'];
$symptom = $_POST['Symp']; 
$error= array();
if (empty($appointment)) {
$error['book'] = "Enter Appointment date" ;}
else if (empty($symptom)){ $error['book'] ="Enter symptoms"; }
if (count($error) == 0) {
	$query="INSERT INTO  appointment (firstname,surname,gender,appointment_date,symptoms,status,date_bookec) VALUES ('$fname','$sname','$gender','$appointment','$symptom','pending',NOW())";
	$result=mysqli_query($connect,$query);
	if ($result) {
		echo "<script>alert('you have booked an appointment')";
		 header("Location:index.php");
	}else{
		echo "<script>alert('failed')";
	}

}}
if (isset($error['book'])) {
	$s=$error['book'];
	$show="<h5 class='text-center alert alert-danger'>$s</h5>";
}else{
	$show="";
}?>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left:-30px;">
				<?php
include 'sidenav.php';?></div>

<div class="box " style="height:77%;width: 31%;  margin-left: 350px;margin-top: 50px;border: solid 3px black;background-color: lightgoldenrodyellow;">
					<form method="post">
						<h4 class="text-center">Book Appontment</h4>
						<div class="form-group">
							<label>Appontment Date</label>
							<input type="date" name="app_date" class="form-control" autocomplete="off" placeholder="20/02/2022" min="2022-09-01" max="2022-11-31"></div>
							<div class="form-group">
								<label>Symptoms</label>
								<input type="text" name="Symp" class="form-control">
							</div>
							<input type="submit" name="book" value="Book" class="btn btn-success">

					</form></div>
</div>
</div>
</div>
</div>
</body>
</html>