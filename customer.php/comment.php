<?php include 'admin_header.php';?>



<?php $db=mysqli_connect("localhost","root","","ccrud");?>


<html>
<head>
<h1>Feed Back  <h1>
</head>
<body>
<form action="comment.php" method="post">
			<table>
			    <tr>
					<td><span >Name</span></td>
					<td>:<input type="text" name="name" value="" placeholder="* enter your name">
						
				</tr>
				
				<tr>
					<td><span >Comment</span></td>
					<td>:<input type="text" name="comment" value="" placeholder="* enter your feed back">
						
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
    <th>Comment</th>
	 <th> Action <th>
	
	<?php 
	$i =0;
	$qry="select * from com";
	$run=$db -> query($qry);
	if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
		$id=$row['id'];	
		?>	
	<tr>
	<td><?php echo $i++;?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['comment']; ?></td>
	<td>
	<a href="ComEdit.php?id=<?php echo $id;?>">Edit</a>
	
	
	<a  href="ComDelete.php?id=<?php echo $id;?>">Delete</a>
	
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
	 $comment=$_POST['comment'];	
	
	$qry="insert into com values(null,'$name','$comment')";
	if(mysqli_query($db,$qry)){
		//echo '<script>alert("Sumitted successfully")</script>';
		header('location:comment.php');
	}else{
		echo mysqli_error($db);
	}
	}
?>

<?php 

   include 'main_footer.php';


?>