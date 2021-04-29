<?php include 'admin_header.php';?>



<?php $db=mysqli_connect("localhost","root","","ccrud");?>


<html>
<head>
<h1> List of package   <h1>
</head>
<body>
<form action="listPackase.php" method="post">
			<table>
			    <tr>
					<td><span >Name</span></td>
					<td>:<input type="text" name="name" value="" placeholder="enter name">
					
				</tr>
			 <tr>
					<td><span >Discunt </span></td>
					<td>:<input type="text" name="packase" value="" placeholder="enter packase name ">
					
				</tr>
			
				<tr>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
				
			</table>
			</body>
		
			
				
<table style="width: 80%" border="1">
<tr>
    <th>Sl#</th>
   <th>Name</th>
	<th>Discunt </th>
	<th> Action </th>
	</tr>
	<?php 
	$i =0;
	$qry="select * from pac ";
	$run=$db -> query($qry);
	if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
		$id=$row['id'];	
		?>	
	<tr>
	<td><?php echo $i++;?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['packase']; ?></td>
	
	<td>
	<a href="PEdit.php?id=<?php echo $id;?>">Edit</a>
	<a  href="PDelete.php?id=<?php echo $id;?>">Delete</a>
	
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
	$packase=$_POST['packase'];

	$qry="insert into pac values(null,'$name','$packase')";
	if(mysqli_query($db,$qry)){
		//echo '<script>alert("Sumitted successfully")</script>';
		header('location:listPackase.php');
	}else{
		echo mysqli_error($db);
	}
	}
?>

<?php 

   include 'main_footer.php';


?>