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
?>
<h2 align="center" style="width: 20%; color: black;">Insert Student Details</h2>
<form method="post" action="addstudent.php" enctype="multipart/form-data">
	<table align="center" border="1" style="width:70%; color: black; line-height: 35px; margin-top:00px;">
		<tr>
			<th>Roll No</th>
			<td><input type="text" name="rollno" placeholder="Enter Rollno" required=""></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" placeholder="Enter Full Name" required=""></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" placeholder="Enter City" required=""></td>
		</tr>
		<tr>
			<th>Parents Contact No</th>
			<td><input type="text" name="pcon" placeholder="Enter the Contact no of Parents" required=""></td>
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="number" name="std" placeholder="Enter Standard" required=""></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="simg" required=""></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>

	</table>
</form>
</body>
</html>


<?php
     include('../dbcon.php');

    if(isset($_POST['submit'])) 
    { 
    	
    	$rollno= $_POST['rollno'];
    	$name= $_POST['name'];
    	$city= $_POST['city'];
    	$pcon= $_POST['pcon'];
    	$std= $_POST['std'];
    	$imagename = $_FILES['simg']['name'];
    	$tempname = $_FILES['simg']['tmp_name'];
    	move_uploaded_file($tempname,"../dataimg/$imagename");

    	$qry="INSERT INTO `student`(`rollno`, `name`, `city`, `pcont`, `standard`,`image`) VALUES ('$rollno','$name','$city','$pcon','$std','$imagename')";
    	
    	$run= mysqli_query($con,$qry);

    	if ($run == true)
    	{
    		?>
    		<script>
    	alert("Data inserted successfully.");
    	</script>
    	<?php
    }else{
    	?>
    	<script>
    		alert("data not inserted")
    		
    	</script> 
    	<?php
    }
}
 
 ?>  
    
