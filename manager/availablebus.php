
<?php 
 $connection = mysqli_connect('localhost','root','','available');
	 if (isset($_POST['search'])){
		 $searchKey = $_POST['search'];
		 $sql="SELECT *FROM available WHERE  Route LIKE '$searchKey%'";
	}else 
	 $sql = "SELECT *FROM Bsearch";
	 $result = mysqli_query($connection,$sql);



?>

   
	

	 <div class="center">
	<h3 class="text" align="center">Search Available Bus</h3>
	
	<body>
	
     <div class="container">
     <div class="col-md-4 col-md-offset-2" style="margin-top: 5%;">
     <div class="row">
	 
          <form action=""method="POST">
     <div class="col-md-4">
           <input types="text" name="search" class='form-control'placeholder="Search by route "><br />
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
			
			
			<th>Sl</th>
			<th>Date</th>
			<th>Route</th>
			<th>BusType</th>
			<th>SeatNo</th>
			<th>Price</th>
			
		</tr>
		<?php while ($row =mysqli_fetch_object($result)) { ?>
		<tr>
			<td>1<?php echo $row->Sl?></td>
			<td>2/4/21<?php echo $row->Date ?></td>
			<td>mym to dha<?php echo $row->Route ?></td>
			<td>ac<?php echo $row->BusType?></td>
			<td>A1<?php echo $row->SeatNo?></td>
			<td>500<?php echo $row->price ?></td>
			
			</tr>
		<?php } ?>
	</table>
	</div>
</div>
</div>
</body>


