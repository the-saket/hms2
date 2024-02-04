<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>

	<title>Doctor's Dashboard</title>
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
	<h4 class="my-2">Doctor's Dashboard</h4>
	<div class="col-md-12 my-1">
		<div class="row">
			<div class="box bg-info" style="height:150px;width: 250px; margin-left: 10px;"><h3 style="font-family:
'Comic Sans MS';">My Profile&emsp;<a href="profile1.php"><img src="img/profile.jpg" style="width: 50px; height: 50px;"></a></h3>	
			</div>
			<div class="box " style="height:150px;width: 250px;margin-left: 10px;background-color: hotpink;"><h3 style="font-family:
'Comic Sans MS';">TOTAL&emsp;&emsp;<img src="img/pt.jpg" style="width: 50px; height: 50px;"><br><b>PATIENT</b></h3><?php
			$vr=mysqli_query($connect,"SELECT * FROM patients");
			$num=mysqli_num_rows($vr);?><h2><?php echo $num; ?></h2>	
			</div>&emsp;
			<div class="box" style="height:150px;width: 250px;margin-left: 0px;margin-top: px;background-color: yellowgreen;"><h3 style="font-family:
'Comic Sans MS';">TOTAL&emsp;&emsp;<img src="img/job.jpg" style="width: 50px; height: 50px;"><br><b>Appointment</b></h3><?php
			$vr=mysqli_query($connect,"SELECT * FROM appointment WHERE status='pending'");
			$num=mysqli_num_rows($vr);?><h2><?php echo $num; ?></h2>	
			</div>

	</div>
</div></div>
</body>
</html>