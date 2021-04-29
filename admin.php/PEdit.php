<?php
 $db=mysqli_connect("localhost","root","","ccrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }else{
		 $id=$_GET['id'];
		 $qry="select * from pac where id = $id";
	    $run=$db -> query($qry);
	    if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
			$name=$row['name'];
			$packase=$row['packase'];
			
			
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
<label>name</label>
<input type="text" name="name" value="<?php echo $name;?>">
<br> <br>
<label>Discunt </label>
<input type="text" name="packase" value="<?php echo $packase;?>">
<br> <br>



<input type="submit" name="update" value="Update">
</form>
</body>
</html>
<?php
if(isset($_POST['update'])){
	        $name=$_POST['name'];
			$packase=$_POST['packase'];
			
			$qry="UPDATE pac SET name='$name',packase='$packase' WHERE id=$id";
			if(mysqli_query($db,$qry)){
				 header('location:listPackase.php');
				}else{
					
					echo mysqli_error($db);
					
				}
			
}
	
	?>