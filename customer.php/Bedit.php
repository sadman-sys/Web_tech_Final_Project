<?php
 $db=mysqli_connect("localhost","root","","ccrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }else{
		 $id=$_GET['id'];
		 $qry="select * from booking where id = $id";
	    $run=$db -> query($qry);
	    if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
			$name=$row['name'];
			$form=$row['form'];
			$to=$row['to'];
			$date=$row['date'];
			$seatNo=$row['seatNo'];
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
<label>Form</label>
<input type="text" name="form" value="<?php echo $form;?>">
<br> <br>
<label>To</label>
<input type="text" name="to" value="<?php echo $to;?>">
<br> <br>
<label>Date</label>
<input type="text" name="date" value="<?php echo $date;?>">
<br> <br>
<label>SET</label>
<input type="text" name="seatNo" value="<?php echo $seatNo;?>">
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
			$form=$_POST['form'];
			$to=$_POST['to'];
			$date=$_POST['date'];
			$seatNo=$_POST['seatNo'];
			$phone=$_POST['phone'];
			$qry="UPDATE booking SET name='$name',form='$form',to='$to',date='$date',seatNo='$seatNo',phone='$phone' WHERE id=$id";
			if(mysqli_query($db,$qry)){
				 header('location:bookingg.php');
				}else{
					
					echo mysqli_error($db);
					
				}
			
}
	
	?>