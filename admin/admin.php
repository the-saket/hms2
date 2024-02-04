<?php
session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
<?php 
include '../header.php'; ?>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-2" style="margin-left: -5px;">
			<?php
			include 'sidenav.php';
			?>
			</div>
<!--ends--><div style="width:80%;">
					<div style="width:50%;float:left ;">
						<h5 class="text-center">Admins</h5>	
						<table class='table table-bordered'><tr>
							<th>ID</th>
							<th>Username</th>
							<th style="width:10%">Action </th>
						</tr><?php 
include 'connection.php'; 
if (isset($_GET['id'])) {
$id=$_GET['id'];
$delete=mysqli_query($con,"DELETE FROM `admin` WHERE `id`='$id'");
}
$query="select * from admin"; 
$result=mysqli_query($con,$query); 
?> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		echo"
		<tr> <td>".$rows['id']."</td> 
		<td>".$rows['username']." </td> 
		<td><a href='admin.php?id=".$rows['id']."' class='btn btn-danger'>Remove</a></td>
		</tr>";
 
               } ?>
           

	</table> 
							
					</div>
					<div style="margin-left:50% ;
					width:50%;">
					
						<h5 class="text-center">Add Admins</h5>	
						<form method="post" enctype="multi/form-data" style="margin-left:10px">
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="uname" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="pass" class="form-control">
							</div>
							<!-- <div class="form-group">
								<input type="file" name="img" class="form-control">
							</div> --><br>
							<input type="submit" name="add" value="Add New Admin" class="btn btn-success">
						</form>
						<?php 
					if (isset($_POST['add'])) {
						$uname=$_POST['uname'];
						$pass=$_POST['pass'];
						if (empty($uname)) {
							$error['u']="Admin Username";}
							elseif (empty($pass)) {
								$error['u']="Admin Password";
							}
					
						$q="INSERT INTO admin(username,password) VALUES('$uname','$pass')";
							$result=mysqli_query($con,$q);}?>
						
					</div>
					
				</div>
				
			</div>
		</div>
	</div></div></div>
</body>
</html>