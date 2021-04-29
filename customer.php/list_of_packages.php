<?php include 'admin_header.php';?>



<?php $db=mysqli_connect("localhost","root","","ccrud");?>


<html>
<head>
<h1> List of package   <h1>
</head>
<body>
<form action="listPackase.php" method="post">

			</body>
		
			
				
<table style="width: 80%" border="1">
<tr>
    <th>Sl#</th>
   <th>Name</th>
	<th>Discunt </th>
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