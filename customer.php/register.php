
<?php
   
	
	$username="";
	$err_username="";
	$email="";
	$err_email="";
	$password="";
	$err_password="";
	
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	//if(isset($_POST["submit"])){
		if(empty($_POST["username"])){
			$err_username="*username Required";
		}
		else{
			$username=$_POST["username"];
		}
		if(empty($_POST["email"])){
			$err_email="*email Required";
		}
		elseif(strlen($_POST["email"]) < 6){
			$err_email="email Must be 6 Characters Long";
		}
		else{
			$email=$_POST["email"];
		}
		if(empty($_POST["password"])){
			$err_password="*password Required";
		}else{
			$pass=$_POST["password"];
		}
	}	
?>


<?php include('server.php') ?>
<!DOCTYPE html>

<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<script>
	  function validate(){
		  
		 var username =document.regform.username;
		 var email =document.regform.email;
		 var password=document.regform.password;
		 
		
	   if (username.value.length <= 0)
        {
			alert("*username required ");
			username.focus();
			return false;
        
			
			}
	if (email.value.length <= 0)
        {
			alert("*email required ");
			email.focus();
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
  	<h2>Customer Registration </h2>
  </div>
	
 <form name="regform" action="register.php" method="post" onsubmit="validate()">
  	<?php include('errors.php'); ?>
	<input type="text" name="username" value="<?php echo $username;?>" placeholder="enter username">
						<span><?php echo $err_username;?></span><br>
<input type="text" name="email" value="<?php echo $email;?>" placeholder="enter email">
						<span><?php echo $err_email;?></span><br>
  	<input type="password" name="password_1" value="<?php echo $password;?>" placeholder="enter password">
						<span><?php echo $err_password;?></span><br>
<input type="password" name="password_2" value="<?php echo $password;?>" placeholder="enter password">
						<span><?php echo $err_password;?></span><br>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>