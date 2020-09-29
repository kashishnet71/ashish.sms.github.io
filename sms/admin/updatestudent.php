<?php
session_start();
		
		if(isset($_SESSION{'uid'}))
		{
			echo "";
		}
		else
		{
		  header('location: ../login.php');
		}
?>
<?php
include('header.php');
include('titlehead.php');
include('../dbcon.php');
?>
<table align="center" style="width:60%; color: black;">
<form action="updatestudent.php" method="post">
	<tr>
		<th>Enter Standard</th>
		<td><input type="number" name="standard" placeholder="Enter Standard" required="required"></td>
	
	
		<th>Enter Student Name</th>
		<td><input type="text" name="stuname" placeholder="Enter Student Name" required="required"></td>
			<td colspan="2"><input type="submit" name="submit" value="search"/></td>
	</tr>



	
</form>
</table>
<table align="center" width="80%" border="1" style="margin-top: 10px; line-height: 20px; color:black;" >
	<tr style="background-color:black; color: white ">
		<th>No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Rollno</th>
		<th>Edit</th>
	</tr>

<?php 
if (isset($_POST['submit'])) 
{
	include('../dbcon.php');
	$standard = $_POST['standard'];
	$name = $_POST['stuname'];

	$sql="SELECT * FROM `student` WHERE `standard`='$standard' AND `name` LIKE '%$name%'";
	$run=mysqli_query($con,$sql);
	if (mysqli_num_rows($run)<1)
	 {
	 	echo "<tr><td colspan='5'>No Records Found</td></tr>";
	 }
	 else
	 {
	 	$count=0;
	 	while ($data=mysqli_fetch_assoc($run)) 
	 	{
	 		$count++;
	 		?>
	 		<tr align="center">
	 			
		        <td><?php echo $count; ?></td>
		        <td><img src="../dataimg/<?php echo $data['image']; ?>" style="max-width: 100px;"/></td>
		        <td><?php echo $data['name']; ?></td>
		        <td><?php echo $data['rollno']; ?></td>
		        <td><a href="updateform.php?sid=<?php echo $data['id']; ?>">Edit</a></td>

	 		</tr>
	 		<?php
	 	}
	?>
</table>
<?php
}
}
?>
	














