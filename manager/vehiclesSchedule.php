<?php 
	$conn=mysqli_connect("localhost","root","","sschedule");
	$query=mysqli_query($conn,"select * from sschedule  ");
	while($row=mysqli_fetch_array($query)){
	
	?>
<html>
<head>
<title>Set Schedule</title>
</style>
</head>
<body>
<div class="container">
<h2>Set Schedule</h2>
<table class="table">
<thead>
<tr>
            <th>Start Location</th>
			<th>End Location</th>
			<th>Sat</th>
			<th>Sun</th>
			<th>Mon</th>
			<th>Tues</th>
			<th>Wed</th>
			<th>Thurs</th>
			<th>Fri</th>
	</tr>
	</thead>
	
	<tbody>
	<tr>
	<td>mym <?php echo $row['sLocation'];?></td>
	<td>dha<?php echo $row['eLocation'];?></td>
	<td><?php echo $row['sat'];?></td>
	<td>6am-4pm<?php echo $row['sun'];?></td>
	<td>6am-4pm<?php echo $row['mon'];?></td>
	<td>6am-4pm<?php echo $row['tues'];?></td>
	<td>6am-4pm<?php echo $row['wed'];?></td>
	<td>6am-4pm<?php echo $row['thurs'];?></td>
	<td>6am-4pm<?php echo $row['fri'];?></td>
	
	</tr>
	
	<tr>
	
	<td>dha</td>
	<td>mym</td>
	<td>6pm-6am</td>
	<td>6pm-6am</td>
	<td>6pm-6am</td>
	<td>6pm-6am</td>
	<td>6pm-6am</td>
	<td>6pm-6am</td>
	<td>6pm-6am</td>
	</tr>
	</tbody>
	<?php } ?>

	</table>
	</div>
	</body>
	</html>
	