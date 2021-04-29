<?php
$server="localhost";
$name="root";
$uname="";
$db="approve";
$conn=mysqli_connect('localhost','root','','approve');
if(!$conn){
	die("database connection error");


}
?>

<?php
if(isset($_POST['Approved']))
{
$satus="Approved";	
$comment=$_POST['comment'];
$id=$_POST['id'];
$query="UPDATE napprove `set` `status`='$status',`comment`='$comment' where `id`='$id' ";

$result=mysqli_query($conn,$query);

if($result)
	$_SESSION['success']="successfully approved";

else{
	echo"Data not updated, please try again";
	
}
}

if(isset($_POST['Rejected']))
{
	$satus="Rejected";	
$comment=$_POST['comment'];
$id=$_POST['id'];
$query="UPDATE `napprove` set `status`='$status',`comment`='$comment' where `id`='$id' ";

$result=mysqli_query($conn,$query);

if($result)
	$_SESSION['success']="successfully approved";

else{
	echo"Data not updated, please try again";
}
	}
?>
<html>
<head>
<title>Customer Registration Form Approve</title>
</head>
<body>
<div class= "container".
<h3 class="text" align="center">Approve Customer Registration Form</h3>
<?php if(isset($_SESSION['success'])){
	echo $_SESSION['success'];
	
}
?>
<br>
<br>
	<table class ="table table-striped-hover">
	<thead>
	
		<tr>
			
			<th>Username</th>
			<th>Email</th>
			<th>Password</th>
			<th>From</th>
			<th> To</th>
			<th>Status</th>
			<th>Comment</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$i=1;
		$query="select * from napprove";
		$result=mysqli_query($conn,$query);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			while($row=mysqli_fetch_array($result))
			{
				?>
				<tr><?php echo $i;?></td>
			
			<td><?php echo $row['uname'];?></td>
			<td><?php echo $row['email'];?></td>
			<td><?php echo $row['pass'];?></td>
			<td><?php echo $row['from'];?></td>
			<td><?php echo $row['to'];?></td>
			<td style ="color:green;"><?php echo $row['status'];?></td>
			<td><form method="post" action="<?php echo $row['id'];?>
			 <textarea name="comment"></textarea></td>
			<td>
			<button type ="submit" name="approved" class= "btn btn-primary"> Approved</button>
	        <button type ="submit" name="rejected" class= "btn btn-primary" >X</button>
			</form></td>
			</tr>
		<?php $i++;}}else{
			echo "No record found";
			
			
		}
		?>
	</tbody>
	</table>
	</div>
	</body>
	</html>
	
	

	