
<?php include 'admin_header.php';?>
<?php $db=mysqli_connect("localhost","root","","ccrud");?>


<html>
<head>
<h1> Manager Information <h1>
</head>
<body>

			</body>
		
			
				
<table style="width: 80%" border="1">
<tr>
    <th>Sl#</th>
   <th>Name</th>
	<th>Username</th>
	<th>password</th>
	<th>Gmail</th>
	<th>phone</th>

	</tr>
	<?php 
	$i =0;
	$qry="select * from cccrud";
	$run=$db -> query($qry);
	if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
		$id=$row['id'];	
		?>	
	<tr>
	<td><?php echo $i++;?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['uname']; ?></td>
	<td><?php echo $row['pass']; ?></td>
	<td><?php echo $row['gmail']; ?></td>
	<td><?php echo $row['phone']; ?></td>
	<td>

</tr>
<?php
		}
	}
	?>

</table>
</body>
</html>


<?php
if(isset($_POST['submit'])){
	 $name=$_POST['name'];	
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$gmail=$_POST['gmail'];
	$phone=$_POST['phone'];
	$qry="insert into cccrud values(null,'$name','$uname','$pass','$gmail','$phone')";
	if(mysqli_query($db,$qry)){
		//echo '<script>alert("Sumitted successfully")</script>';
		header('location:add_manager.php');
	}else{
		echo mysqli_error($db);
	}
	}
?>

<?php include 'main_footer.php';?>