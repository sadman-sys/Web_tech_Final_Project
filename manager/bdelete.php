<?php
 $db=mysqli_connect("localhost","root","","bcrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }
 $Id=$_GET['Id'];
 $qry="delete from bscrud where Id=$Id";
 if(mysqli_query($db,$qry)){
	 header('location:busInformation.php');
	 }else{
		echo mysqli_error($db); 
		 
	 }
 
 
 
 
 ?>
