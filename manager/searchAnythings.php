<?php

$connection = mysqli_connect('localhost','root','','asearch');
	 if (isset($_POST['search'])){
		 $searchKey = $_POST['search'];
		 $sql="SELECT *FROM AAsearch WHERE  Book_Ticket LIKE '$searchKey%'";
	}else 
	 $sql = "SELECT *FROM Asearch";
	 $result = mysqli_query($connection,$sql);
 
 
 ?>


	<div class="center">
	<h3 class="text" align="center">Search Anythings</h3>

	<body>
	
     <div class="container">
     <div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
     <div class="row">
	 
          <form action=""method="POST">
     <div class="col-md-4">
           <input types="text" name="search" class='form-control'placeholder="Search by book ticket "><br />
     </div>
         <div class="col-md-4 text-left">
          <button class="btn">Search</button>
     </div>
         
		 <br>
		 <br>
		 </div>
			
			<table class="table table-bordered">
		<tr>
			
			
			<th>Book Ticket</th>
			<th>Sold Ticket</th>
			<th>Price</th>
			<th>Discount</th>
			
			</tr>
			   <?php while ($row =mysqli_fetch_object($result)) { ?>
		<tr>
			
			<td>20<?php echo $row->Book_Ticket ?></td>
			<td>20<?php echo $row->Sold_Ticket ?></td>
			<td>5000<?php echo $row->Price ?></td>
			<td>15%<?php echo $row->Discount ?></td>
			</tr>
		<?php } ?>
				
				
				
			</table>
		</form>
			
		
	</body>
	</div>
</div>
</div>

</body>

