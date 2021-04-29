<?php
   
	$rName="";
	$err_rName="";
	$bDate="";
	$err_bDate="";
	$sNumber="";
	$err_sNumber="";
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	//if(isset($_POST["submit"])){
		if(empty($_POST["rName"])){
			$err_rName="*routename Required";
		}
		elseif(strlen($_POST["rName"]) < 6){
			$err_rName="routename Must be 6 Characters Long";
		}
		
		else{
			$rName=$_POST["rName"];
		}
		
		
		if(empty($_POST["bDate"])){
			$err_bDate="*bookingdate Required";
		}
		else{
			$bDate=$_POST["bDate"];
		}
		if(empty($_POST["sNumber"])){
			$err_sNumber="*seatnumber Required";
		}else{
			$sNumber=$_POST["sNumber"];
		}

	}
		
?>


<?php $db=mysqli_connect("localhost","root","","ticrud");?>

<html>
<head>
<title> Crud </title>
</head>

	 <script>
	  function validate(){
		  var bDate=document.myform.bDate;
		 var rName =document.myform.rName;
		 var sNumber=document.myform.sNumber;
		
		 
		 if(bDate.value.length <= 0)
        {
			alert("enter the booking date ");
			bDate.focus();
			return false;
			
		}
		 
		
	   if (rName.value.length <= 0)
        {
			alert(" enter the route name ");
			rName.focus();
			return false;
			
			}
			if (sNumber.value.length <= 0)
        {
			alert(" enter the route name ");
			sNumber.focus();
			return false;
			
			}
        return false;
        		
	 }
	 

	 </script> 
<body>
<form name="myform" action="ticket.php" method="post" onsubmit="validate()">
			<table>
			    <tr>
					<td><span >bDate</span></td>
					<td>:<input type="text" name="bDate" value="<?php echo $bDate;?>" placeholder="enter booking date">
						<span><?php echo $err_bDate;?></span></td>
				</tr>
			 <tr>
					<td><span >rName</span></td>
					<td>:<input type="text" name="rName" value="<?php echo $rName;?>" placeholder="enter route name">
						<span><?php echo $err_rName;?></span></td>
				</tr>
			 <tr>
					<td><span >sNumber</span></td>
					<td>:<input type="text" name="sNumber" value="<?php echo $sNumber;?>" placeholder="enter seat number">
						<span><?php echo $err_sNumber;?></span></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
				
			</table>
			</body>
		
			
		
			
				
<table style="width: 80%" border="1">
<tr>
    <th>Sl#</th>
   <th>Booking  Data</th>
	<th> Route Name</th>
	<th>Seat Number</th>
	<th>Action</th>
	</tr>
	<?php 
	$i =0;
	$qry="select * from ticrud";
	$run=$db -> query($qry);
	if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){
		$cId=$row['cId'];	
		?>	
	<tr>
	<td><?php echo $i++;?></td>
	<td><?php echo $row['bDate']; ?></td>
	<td><?php echo $row['rName']; ?></td>
	<td><?php echo $row['sNumber']; ?></td>
	<td>
	<a href="edit.php?cId=<?php echo $cId;?>">Edit</a>
	<a  href="delete.php?cId=<?php echo $cId;?>">Delete</a>
	
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
	 $bDate  =$_POST['bDate'];	
	$rName =$_POST['rName'];
	$sNumber  =$_POST['sNumber'];
	$qry="insert into ticrud values(null,'$bDate','$rName','$sNumber')";
	if(mysqli_query($db,$qry)){
		//echo '<script>alert("Sumitted successfully")</script>';
		//header('location:ticket.php');
	}else{
		echo mysqli_error($db);
	}
	}
?>

