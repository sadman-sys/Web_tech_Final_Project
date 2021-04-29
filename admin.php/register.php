<?php include 'main_header.php';?>

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
	$type="";
	$err_type="";
	
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
<h1><div class="center-login">Register form  <h1>
</head>
<body>
<form action="" method="post">
			<table>
			    <tr>
					<td><span >Name</span></td>
					<td>:<input type="text" name="name" value="" placeholder="enter name">
						<?php echo $err_name;?></td>
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
					<td><span >Type</span></td>
					<td>:<input type="text" name="type" value="<?php echo $type;?>" placeholder="enter type">
						<span><?php echo $err_type;?></span></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
				
			</table>
			</body>
		
			
</head>		

<tr>

	<?php 
	$i =0;
	$qry="select * from reg_data";
	$run=$db -> query($qry);
	if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
		$id=$row['id'];	
		?>	
	</tr>
	
	
<?php
		}
	}
	?>


<?php
if(isset($_POST['submit'])){
	 $name=$_POST['name'];	
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	$gmail=$_POST['gmail'];
	$phone=$_POST['phone'];
		$type=$_POST['type'];
	$qry="insert into reg_data values(null,'$name','$uname','$pass','$gmail','$phone','$type')";
	if(mysqli_query($db,$qry)){
		//echo '<script>alert("Sumitted successfully")</script>';
		header('location:register.php');
	}else{
		echo mysqli_error($db);
	}
	}
?>

<?php include 'main_footer.php';?>