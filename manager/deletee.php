<?php
 $db=mysqli_connect("localhost","root","","ccrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }
 $id=$_GET['id'];
 $qry="delete from cccrud where id=$id";
 if(mysqli_query($db,$qry)){
	 header('location:addCustomer.php');
	 }else{
		echo mysqli_error($db); 
		 
	 }
 
 
 
 
 ?>
