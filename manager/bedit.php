<?php
 $db=mysqli_connect("localhost","root","","bcrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }else{
		 $Id=$_GET['Id'];
		 $qry="select * from bscrud where Id = $Id";
	    $run=$db -> query($qry);
	    if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
			$tCreated=$row['tCreated'];
			$status=$row['status'];
			
			
		}
		}
	 }
 
?>
<!DOCTYPE html>
<html>
<head>
<title> Edit </title>
</head>
<body>
<form method="post">
<label>tCreated</label>
<input type="text" name="tCreated" value="<?php echo $tCreated;?>">
<br> <br>
<label>status</label>
<input type="text" name="status" value="<?php echo $status;?>">
<br> <br>
<input type="submit" name="update" value="Update">
</form>
</body>
</html>
<?php
if(isset($_POST['update'])){
	        $tCreated=$_POST['tCreated'];
			$status=$_POST['status'];
			$qry="UPDATE bscrud SET tCreated='$tCreated',status='$status' WHERE Id=$Id";
			if(mysqli_query($db,$qry)){
				 header('location:busInformation.php');
				}else{
					
					echo mysqli_error($db);
					
				}
			
}
	
	?>