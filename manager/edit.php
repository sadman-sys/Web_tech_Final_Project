<?php
 $db=mysqli_connect("localhost","root","","ticrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }else{
		 $cId=$_GET['cId'];
		 $qry="select * from ticrud where cId = $cId";
	    $run=$db -> query($qry);
	    if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
			$bDate=$row['bDate'];
			$rName=$row['rName'];
			$sNumber=$row['sNumber'];
			
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
<label>bDate</label>
<input type="text" name="bDate" value="<?php echo $bDate;?>">
<br> <br>
<label>rName</label>
<input type="text" name="rName" value="<?php echo $rName;?>">
<br> <br>
<label>sNumber</label>
<input type="text" name="sNumber" value="<?php echo $sNumber;?>">
<br> <br>
<input type="submit" name="update" value="Update">
</form>
</body>
</html>
<?php
if(isset($_POST['update'])){
	        $bDate=$_POST['bDate'];
			$rName=$_POST['rName'];
			$sNumber=$_POST['sNumber'];
			$qry="UPDATE ticrud SET bDate='$bDate',rName='$rName',sNumber='$sNumber' WHERE cId=$cId";
			if(mysqli_query($db,$qry)){
				 header('location:ticket.php');
				}else{
					
					echo mysqli_error($db);
					
				}
			
}
	
	?>