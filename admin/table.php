<?php 
include 'connection.php'; 
$query="select * from student"; 
$result=mysqli_query($query); 
?> 
<!DOCTYPE html> 
<html> 
	<table class='table table-bordered'><tr>
							<th>ID</th>
							<th>Username</th>
							<th style="width:10%">Action </th>
						</tr>
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['id']; ?></td> 
		<td><?php echo $rows['admin']; ?></td> 
		<td><button id='$id' class='btn btn-danger'>Remove</button></td>
		</tr> 
	<?php 
               } 
          ?> 

	</table> 
	</body> 
	</html>