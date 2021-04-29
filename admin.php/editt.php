<?php
 $db=mysqli_connect("localhost","root","","ccrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }else{
		 $id=$_GET['id'];
		 $qry="select * from cccrud where id = $id";
	    $run=$db -> query($qry);
	    if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
			$name=$row['name'];
			$uname=$row['uname'];
			$pass=$row['pass'];
			$gmail=$row['gmail'];
			$phone=$row['phone'];
			
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
<label>uname</label>
<input type="text" name="uname" value="<?php echo $uname;?>">
<br> <br>
<label>pass</label>
<input type="text" name="pass" value="<?php echo $pass;?>">
<br> <br>
<label>gmail</label>
<input type="text" name="gmail" value="<?php echo $gmail;?>">
<br> <br>
<label>phone</label>
<input type="text" name="phone" value="<?php echo $phone;?>">
<br> <br>


<input type="submit" name="update" value="Update">
</form>
</body>
</html>
<?php
if(isset($_POST['update'])){
	        $name=$_POST['name'];
			$uname=$_POST['uname'];
			$pass=$_POST['pass'];
			$gmail=$_POST['gmail'];
			$phone=$_POST['phone'];
			$qry="UPDATE cccrud SET name='$name',uname='$uname',pass='$pass',gmail='$gmail' WHERE id=$id";
			if(mysqli_query($db,$qry)){
				 header('location:add_manager.php');
				}else{
					
					echo mysqli_error($db);
					
				}
			
}
	
	?>