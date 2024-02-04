<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>

	<title>Patient Dashboard</title>
</head>
<body>
<?php
include '../header.php';
include '../connection.php'; ?>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-2" style="margin-left: -5px;">
			<?php
			include 'sidenav.php';
			?>
			</div>
<!--ends--><div class="col-md-10">
	<h4 class="my-2">Patient Dashboard</h4>
	<div class="col-md-12 my-1">
		<div class="row">
			<div class="box bg-info" style="height:150px;width: 250px; margin-left: 10px;"><h3 style="font-family:
'Comic Sans MS';">My Profile&emsp;<a href="prifile.php"><img src="img/profile.jpg" style="width: 50px; height: 50px;"></a></h3>	
			</div>
			<div class="box " style="height:150px;width: 250px;margin-left: 10px;background-color: hotpink;"><h3 style="font-family:
'Comic Sans MS';">Book Appointment&emsp;&emsp;<a href="appointment.php"><img src="img/appoint.png" style="width: 50px; height: 50px;"></a>	
			</div>&emsp;
			<div class="box" style="height:150px;width: 250px;margin-left: 0px;margin-top: px;background-color: yellowgreen;"><h3 style="font-family:
'Comic Sans MS';">My Invoice&emsp;&emsp;<a href="invoice.php"><img src="img/inv.jpg" style="width: 50px; height: 50px;"></a></h3>
			</div>
<?php 
if (isset($_POST['send'])) {
	// code...
	$sub=$_POST['sub'];
	$issue=$_POST['meg'];
	if (empty($sub)) {
		echo"<script>alert('no subjext')</script>";
	}elseif(empty($issue)){echo"<script>alert('no issue')</script>";}
	else{
		$user=$_SESSION['patient'];
		$query="INSERT INTO report(subject,issue,username,date_send) VALUES('$sub','$issue','$user',NOW())";
		$res=mysqli_query($connect,$query);
		if ($res) {
			// code...
			echo"<script>alert('Report has been sent')</script>";
		}
	}
}
?>

			<div class="box " style="height:77%;width: 31%;  margin-left: 350px;margin-top: 50px;border: solid 3px black;background-color: lightgoldenrodyellow;">
					<form method="post">
						<h4 class="text-center">Send a Report</h4>
						<div class="form-group">
							<label>Subject</label>
							<input type="text" name="sub" class="form-control" autocomplete="off" placeholder="My Doctor"></div>
							<div class="form-group">
								<label>Issue</label>
								<input type="text" name="meg" class="form-control">
							</div>
							<input type="submit" name="send" value="Send" class="btn btn-success">

					</form></div></div>

	</div>
</div></div>
</body>
</html>