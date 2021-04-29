<?php
 $db=mysqli_connect("localhost","root","","ticrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }
 $cId=$_GET['cId'];
 $qry="delete from ticrud where cId=$cId";
 if(mysqli_query($db,$qry)){
	 header('location:ticket.php');
	 }else{
		echo mysqli_error($db); 
		 
	 }
 
 
 
 
 ?>
