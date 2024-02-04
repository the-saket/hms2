<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>

	<title>Admin Dashboard</title>
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
	<h4 class="my-2">Admin Dashboard</h4>
	<div class="col-md-12 my-1">
		<div class="row">
			<div class="box " style="height:150px; width: 250px;background-color: darkorange;"><?php
			$vr=mysqli_query($connect,"SELECT * FROM admin");
			$num=mysqli_num_rows($vr);?>	<h3 style="font-family:
'Comic Sans MS';">TOTAL&emsp;&emsp;<a href="admin.php"><img src="img/adl.jpg" style="width: 50px; height: 50px;"></a><br><b>ADMIN</b></h3><h2><?php echo  $num;?></h2>
			</div>
			<div class="box bg-info" style="height:150px;width: 250px; margin-left: 10px;"><h3 style="font-family:
'Comic Sans MS';">TOTAL&emsp;&emsp;<a href="doctor.php"><img src="img/dc.jpg" style="width: 50px; height: 50px;"></a><br><b>DOCTORS</b></h3><?php
$doc=mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'");
$c=mysqli_num_rows($doc);?>
<h2><?php echo $c;?></h2>	
			</div><?php
			$vr=mysqli_query($connect,"SELECT * FROM patients");
			$num2=mysqli_num_rows($vr);?>
			<div class="box " style="height:150px;width: 250px;margin-left: 10px;background-color: hotpink;"><h3 style="font-family:
'Comic Sans MS';">TOTAL&emsp;&emsp;<img src="img/pt.jpg" style="width: 50px; height: 50px;"><br><b>PATIENT</b></h3><h2><?php echo  $num2;?></h2>	
			</div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&emsp;&emsp;
			<div class="box" style="height:150px;width: 250px;margin-left: 0px;margin-top: 10px;background-color: yellowgreen;"><h3 style="font-family:
'Comic Sans MS';">TOTAL&emsp;&emsp;<a href="income.php"><img src="img/in.jpg" style="width: 50px; height: 50px;"></a><br><b>INCOME</b></h3><?php
$query = "SELECT * FROM income";
$query_run = mysqli_query($connect,$query);
			$sum1=0;
			while($sum=mysqli_fetch_assoc($query_run)){
				$sum1+=$sum['amount_paid'];
			}

		?><h2><?php echo $sum1;?></h2>	
			</div>
			<div class="box" style="height:150px;width: 250px;margin-left: 10px;margin-top: 10px;background-color: red;">
				<?php
				$job=mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pendding'");
				$nm1=mysqli_num_rows($job);?>
				<h3 style="font-family:
'Comic Sans MS';">TOTAL&emsp;&emsp;<a href="job_request.php"><img src="img/job.jpg" style="width: 50px; height: 50px;"></a><br><b>Job Request</b></h3><h2><?php echo $nm1; ?></h2>	
			</div>
			<div class="box" style="height:150px;width: 250px;margin-left: 10px;margin-top: 10px;background-color:yellow;">
				<?php
				$job=mysqli_query($connect,"SELECT * FROM report");
				$nm1=mysqli_num_rows($job);?>
				<h3 style="font-family:
'Comic Sans MS';">TOTAL&emsp;&emsp;<a href="report.php"><img src="img/job.jpg" style="width: 50px; height: 50px;"></a><br><b>Reports</b></h3><h2><?php echo $nm1; ?></h2>	
			</div>

	</div>
</div></div>
</body>
</html>