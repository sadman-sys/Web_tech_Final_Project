<?php include 'admin_header.php';?>

<?php
   
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	$gmail="";
	$err_gmail="";
	$phone="";
	$err_phone="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	//if(isset($_POST["submit"])){
		if(empty($_POST["name"])){
			$err_name="*name Required";
		}
		elseif(strlen($_POST["name"]) < 6){
			$err_name="name Must be 6 Characters Long";
		}
		
		else{
			$name=$_POST["name"];
		}
		
		if(empty($_POST["uname"])){
			$err_uname="*username Required";
		}
		else{
			$uname=$_POST["uname"];
		}
		if(empty($_POST["pass"])){
			$err_pass="*password Required";
		}else{
			$pass=$_POST["pass"];
		}
		if(empty($_POST["gmail"])){
			$err_gmail="*gmail Required";
		}
		elseif(strlen($_POST["gmail"]) < 6){
			$err_gmail="gmail Must be 6 Characters Long";
		}
		else{
			$gmail=$_POST["gmail"];
		}
       if(empty($_POST["phone"])){
			$err_phone="*phone number Required";
		}
		else{ 
			$phone=$_POST["phone"];
		}


	}
		
?>


<?php $db=mysqli_connect("localhost","root","","ccrud");?>


<html>
<head>
<h1>ADD MANAGER <h1>
</head>
<body>
<form action="add_manager.php" method="post">
			<table>
			    <tr>
					<td><span >Name</span></td>
					<td>:<input type="text" name="name" value="<?php echo $name;?>" placeholder="enter name">
						<span><?php echo $err_name;?></span></td>
				</tr>
			 <tr>
					<td><span >User name</span></td>
					<td>:<input type="text" name="uname" value="<?php echo $uname;?>" placeholder="enter username">
						<span><?php echo $err_uname;?></span></td>
				</tr>
			 <tr>
					<td><span >Password </span></td>
					<td>:<input type="text" name="pass" value="<?php echo $pass;?>" placeholder="enter password">
						<span><?php echo $err_pass;?></span></td>
				</tr>
				<tr>
					<td><span >Gmail</span></td>
					<td>:<input type="text" name="gmail" value="<?php echo $gmail;?>" placeholder="enter gmail">
						<span><?php echo $err_gmail;?></span></td>
				</tr>
				<tr>
					<td><span >Phone</span></td>
					<td>:<input type="text" name="phone" value="<?php echo $phone;?>" placeholder="enter phone number">
						<span><?php echo $err_phone;?></span></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
				
			</table>
			</body>
		
			
				
<table style="width: 80%" border="1">
<tr>
    <th>Sl#</th>
   <th>Name</th>
	<th>Username</th>
	<th>password</th>
	<th>Gmail</th>
	<th>phone</th>
	<th>Action</th>
	</tr>
	<?php 
	$i =0;
	$qry="select * from cccrud";
	$run=$db -> query($qry);
	if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
		$id=$row['id'];	
		?>	
	<tr>
	<td><?php echo $i++;?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['uname']; ?></td>
	<td><?php echo $row['pass']; ?></td>
	<td><?php echo $row['gmail']; ?></td>
	<td><?php echo $row['phone']; ?></td>
	<td>
	<a href="editt.php?id=<?php echo $id;?>">Edit</a>
	<a  href="deletee.php?id=<?php echo $id;?>">Delete</a>
	
</tr>
<?php
		}
	}
	?>

</table>
</body>
</html>


<?php
if(isset($_POST['submit'])){
	 $name=$_POST['name'];	
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$gmail=$_POST['gmail'];
	$phone=$_POST['phone'];
	$qry="insert into cccrud values(null,'$name','$uname','$pass','$gmail','$phone')";
	if(mysqli_query($db,$qry)){
		//echo '<script>alert("Sumitted successfully")</script>';
		header('location:add_manager.php');
	}else{
		echo mysqli_error($db);
	}
	}
?>

<?php include 'main_footer.php';?>