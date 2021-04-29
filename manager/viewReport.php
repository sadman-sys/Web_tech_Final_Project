<?php 
	$conn=mysqli_connect("localhost","root","","report");
	$query=mysqli_query($conn,"select * from Report ");
	while($row=mysqli_fetch_array($query)){
	
	?>
<html>
<head>

</style>
</head>
<body>
<div class="container">
<h2>View Report</h2>
<table class="table">
<thead>
<tr>
           <th>Sl</th>
            <th>Registration No</th>
			<th>Route Name</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Sold Ticket</th>
			<th>Total Income</th>
			<th>Total Expense</th>
	</tr>
	</thead>
	
	<tbody>
	<tr>
	<td>1234<?php echo $row['Registration_N0'];?></td>
	<td>dha to mym<?php echo $row['Route_Name'];?></td>
	<td>12/7/21<?php echo $row['Start_Date'];?></td>
	<td>13/6/21<?php echo $row['End_Date'];?></td>
	<td>100<?php echo $row['Sold_Ticket'];?></td>
	<td>5000<?php echo $row['Total_income'];?></td>
	<td>500<?php echo $row['Total_Expense'];?></td>
	
	</tr>
	
	
	<?php } ?>

	</table>
	</div>
	</body>
	</html>
	