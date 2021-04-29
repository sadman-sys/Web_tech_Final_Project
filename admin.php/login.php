<?php include 'main_header.php';?>
<?php



      if($_SERVER["REQUEST_METHOD"]=="POST"){
		  
		$uname=$_POST["uname"];
        $pass=$_POST["pass"];

        if($uname=="sadman"   &&  $pass=="12345"){
			setcookie("uname",$uname,time()+60);
			header("Location: dashboard.php");
		}		
		  
	  }




?>


<?php
   
	$uname="";
	$err_uname="";
	$pass="";
	$err_pass="";
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	//if(isset($_POST["submit"])){
		if(empty($_POST["uname"])){
			$err_uname="*username Required";
		}
		elseif(strlen($_POST["uname"]) < 6){
			$err_uname="username Must be 6 Characters Long";
		}
		
		else{
			$uname=$_POST["uname"];
		}
		
	   
		if(empty($_POST["pass"])){
			$err_pass="*password Required";
		}
		else{
			$pass=$_POST["pass"];
		}
	

   
	}
	
	
	
		
?>

<html>
	<head> </head>
	
	<script>
	  function validate(){
		 var $uname =document.logform.uname;
		 var $pass =document.logform.pass;
	
		 
		 
		 
		if(uname.value.length <= 0)
        {
		
			uname.focus();
			uname.innerHTML="*username Requred";
			return false;
			
		}	
		
	   if (pass.value.length <= 0)
        {
			
			pass.focus();
			pass.innerHTML="*password Required";
			return false;
			
		}
        return false;
        		
	 }
	 
	 
	 
	 
	 </script>



<body>
 <div class="center-login"><h1>Log In </h1>
   <form action="" method="Post">
         Username:<input type="text" name="uname" placeholder="  *username Required">
		 <?php echo $err_uname;?><br>
		 
		 
		 Password:<input type="text" name="pass"placeholder="*password Required">
		 <?php echo $err_pass;?><br>
		 
		 <input type="submit" name="submit" value="login">
        
                 <tr>
				  <td><a href="register.php" >Not registered yet? Sign Up</a></td>
				  </tr>
   </form>

</body>




</html>
		
	
<?php include 'main_footer.php';?>


