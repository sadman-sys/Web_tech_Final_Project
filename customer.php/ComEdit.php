<?php
 $db=mysqli_connect("localhost","root","","ccrud");
 if(!$db){
	 die('error in db' . mysqli_error($db));
	 }else{
		 $id=$_GET['id'];
		 $qry="select * from comment where id = $id";
	    $run=$db -> query($qry);
	    if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
			$name=$row['name'];
			$comment=$row['comment'];
			
			
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
<label>comment</label>
<input type="text" name="comment" value="<?php echo $comment;?>">

<br> <br>


<input type="submit" name="update" value="Update">
</form>
</body>
</html>
<?php
if(isset($_POST['update'])){
	        $name=$_POST['name'];
			$comment=$_POST['comment'];
			
			$qry="UPDATE com SET name='$name',comment='$comment' WHERE id=$id";
			if(mysqli_query($db,$qry)){
				 header('location:comment.php');
				}else{
					
					echo mysqli_error($db);
					
				}
			
}
	
	?>
	
	
	
	