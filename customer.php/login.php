<?php
   
	
	$username="";
	$err_username="";
	$password="";
	$err_password="";
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST["submit"])){
		
		
		if(empty($_POST["username"])){
			$err_username="*username Required";
		}
		else{
			$username=$_POST["username"];
		}
		if(empty($_POST["password"])){
			$err_password="*password Required";
		}else{
			$password=$_POST["password"];
		}
	
	}
	}
		
?>




<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<script>
	  function validate(){
		 
		 var username =document.logform.username;
		 var password=document.logform.password;
		 
		 
		
	   if (username.value.length <= 0)
        {
			alert("*username required ");
			username.focus();
			return false;
			
			}
			if (password.value.length <= 0)
        {
			alert(" *password required ");
			password.focus();
			return false;
			
			
			
			}
        return false;
        		
	 }
	 

	 </script> 
<body>
  <div class="header">
  	<h2>Customer Login</h2>
  </div>
	 
  <form name="logform" action="login.php" method="post" onsubmit="validate()">
  	<?php include('errors.php'); ?>
  	<input type="text" name="username" value="<?php echo $username;?>" placeholder="enter username" >
						<span><?php echo $err_username;?></span><br>
<input type="password" name="password" value="<?php echo $password;?>" placeholder="enter password">
						<span><?php echo $err_password;?></span><br>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
