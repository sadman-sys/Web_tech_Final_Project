
<?php
   
	$tCreated="";
	$err_tCreated="";
	$status="";
	$err_status="";
	
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	//if(isset($_POST["submit"])){
		
		if(empty($_POST["tCreated"])){
			$err_tCreated="*ticket created Required";
		}
		else{
			$tCreated=$_POST["tCreated"];
		}
		if(empty($_POST["status"])){
			$err_status="*status Required";
		}else{
			$status=$_POST["status"];
		}

	}
		
?>

<?php $db=mysqli_connect("localhost","root","","bcrud");?>

<html>
<head>
<title> Crud </title>
</head>

	 <script>
	  function validate(){
		  var tCreated=document.myform.tCreated;
		 var status =document.myform.status;

		
		 
		 if(tCreated.value.length <= 0)
        {
			alert("*tCreated required ");
			tCreated.focus();
			return false;
			
		}
		 
		
	   if (status.value.length <= 0)
        {
			alert(" *status required");
			status.focus();
			return false;
			
			}
		
        return false;
        		
	 }
	 

	 </script> 
<body>
<form name="myform" action="busInformation.php" method="post" onsubmit="validate()">
			<table>
			    <tr>
					<td><span >tCreated</span></td>
					<td>:<input type="text" name="tCreated" value="<?php echo $tCreated;?>" placeholder="enter ticket created">
						<span><?php echo $err_tCreated;?></span></td>
				</tr>
			 <tr>
					<td><span >status</span></td>
					<td>:<input type="text" name="status" value="<?php echo $status;?>" placeholder="enter status">
						<span><?php echo $err_status;?></span></td>
				</tr>
			 
				<tr>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
				
			</table>
			</body>
		
			
		
<h3> Bus Info Crud</h3>
<table style="width: 80%" border="1">
<tr>
    <th>Sl#</th>
   <th>Ticket Created</th>
	<th> Status</th>
	<th>Action</th>
	</tr>
	<?php 
	$i =0;
	$qry="select * from bscrud";
	$run=$db -> query($qry);
	if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
		$Id=$row['Id'];	
		?>	
	<tr>
	<td><?php echo $i++;?></td>
	<td><?php echo $row['tCreated']; ?></td>
	<td><?php echo $row['status']; ?></td>
	<td>
	<a href="bedit.php?Id=<?php echo $Id;?>">Edit</a>
	<a  href="bdelete.php?Id=<?php echo $Id;?>">Delete</a>
	
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
	 $tCreated  =$_POST['tCreated'];	
	$status =$_POST['status'];
	$qry="insert into bscrud values(null,'$tCreated','$status')";
	if(mysqli_query($db,$qry)){
		//echo '<script>alert("Sumitted successfully")</script>';
		//header('location:busInformation.php');
		
	}else{
		echo mysqli_error($db);
	}
	}
?>
