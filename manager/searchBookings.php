
<?php 
 $connection = mysqli_connect('localhost','root','','bsearch');
	 if (isset($_POST['search'])){
		 $searchKey = $_POST['search'];
		 $sql="SELECT *FROM BBsearch WHERE  Route_Name LIKE '$searchKey%'";
	}else 
	 $sql = "SELECT *FROM Bsearch";
	 $result = mysqli_query($connection,$sql);



?>

   
	

	 <div class="center">
	<h3 class="text" align="center">Search Bookings</h3>
	
	<body>
	
     <div class="container">
     <div class="col-md-4 col-md-offset-2" style="margin-top: 5%;">
     <div class="row">
	 
          <form action=""method="POST">
     <div class="col-md-4">
           <input types="text" name="search" class='form-control'placeholder="Search by route name "><br />
     </div>
         <div class="col-md-4 text-left">
          <button class="btn">Search</button>
     </div>
         </form>
		 <br>
		 <br>
		 </div>
	<table class="table table-bordered">
		<tr>
			
			
			<th> Route Name</th>
			<th>Total Seat</th>
			<th>Price</th>
			<th>Seat Number</th>
			
		</tr>
		<?php while ($row =mysqli_fetch_object($result)) { ?>
		<tr>
			
			<td>mym to dha <?php echo $row->Route_Name ?></td>
			<td>2<?php echo $row->Total_Seat ?></td>
			<td>500<?php echo $row->Price ?></td>
			<td>A1,B2<?php echo $row->Seat_Number ?></td>
			
			
			</tr>
		<?php } ?>
	</table>
	</div>
</div>
</div>
</body>


