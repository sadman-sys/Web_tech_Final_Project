<?php
 $db=mysqli_connect("localhost","root","","ccrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }
 $id=$_GET['id'];
 $qry="delete from booking where id=$id";
 if(mysqli_query($db,$qry)){
	 header('location:bookingg.php');
	 }else{
		echo mysqli_error($db); 
		 
	 }
 
 
 
 
 ?>
