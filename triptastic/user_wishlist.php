<!----------------- wishlist section starts here ----------------------->
    
<div class="container">
	<h1 style="margin-top:7rem; padding:4rem;" class="heading"> My Trips </h1>
		<div class="row">
			<div class="col-lg-9">
           		<div class="tbl-content" style="text-align: center; ">
           		    <table class="table table-bordered table-hover">
           		    	<thead class="table-primary" style="font-size:1.5rem;" >
           		    	    <tr>
           		    	        <th scope="col">Place</th>
           		    	        <th scope="col">Image</th>
           		    	        <th scope="col">package</th>
           		    	        <th scope="col">persons</th>
                                <th scope="col">Date</th>
           		    	        <th scope="col" colspan='2'>Actions</th>
           		    	    </tr>
           		    	</thead>
						<?php
							$user_id = $_SESSION['user_id'];
							$total = 0;

							$select_query_wishlist = "select * from wishlist where user_id= $user_id";
 							$query_wishlist = mysqli_query($con, $select_query_wishlist);

							while($data_wishlist = mysqli_fetch_assoc($query_wishlist)){
								$wishlist_place_id = $data_wishlist['place_id'];
								$persons = $data_wishlist['persons'];
                                $date = $data_wishlist['date'];
								$select_query_place = "select * from place where place_id= $wishlist_place_id";
								$query_place = mysqli_query($con,$select_query_place);
								while($data = mysqli_fetch_assoc($query_place)){
									$total = $total + ($persons * $data['price']);
									?>
        	    					<tbody style="font-size:1.4rem;">
                		    			<tr>
                		    			    <td><?php echo $data['place']?></td>
											<td style=""><img  width="251.71px" height="101.39px" src="<?php echo str_replace("../image","image",$data['image']); ?>"></td>
                		    			    <td><?php echo $data['price']?></td>

											<form action="update_wishlist.php" method="get">
                		    			    	<td><input style="font-size: 1.3rem;" type="number" name="persons" min="1" class="form-control" value="<?php echo $persons?>"></td>
                                                <td><input style="font-size: 1.3rem;" type="date" name="date" class="form-control" value="<?php echo $date?>"></td>
                		    			    	<td>
													<button style="padding: 2%; border: 1px solid green; border-radius: 8px" name="save" value="<?php echo $data['place_id']?>">
														<a style="color: green; font-weight: bold;">save</a>
													</button>
												</td>
											</form>

                		    			    <td>
												<button style="padding: 2%; border: 1px solid red; border-radius: 8px" name="remove">
													<a style="color: red; font-weight: bold;" href="user_dashboard.php?my_trips&id=<?php echo $data['place_id']?>">Remove</a>
												</button>
											</td>
										</tr>
									</tbody>	
									<?php
								}
							}				
						?>
					</table>
				</div>
			</div>
								
			<div class="col-lg-3" >
				<div class="border bg-light rounded p-4">
					<h2 style="font-weight: bold; color: #192a56; ">Total amount to be paid:</h2>
					<h3>Rs. <?php echo $total;?></h3><br><br>

					<input type="radio" class="form-check-input" name="pay online" value="pay online" id="flexRadioDisabled" disabled>
                       	<label class="form-check-label"><h5>Pay online (UPI /netbanking)</h5></label><br>
					<input type="radio" name="cash_on_delivery" value="pay on delivery"  checked>
                       	<label><h4>Pay on the day of travel</h4></label>
					<form method="post">
						<button type="submit" name="book" class="btn"><h4>Book your trip</h4></button>
					</form>
				</div>
			</div>
		</div>
    </div>


<!------------------- for removing item from wishlist ------------------>
<?php
	if(isset($_GET['id'])){
		$place_id= $_GET['id'];

        $delete_query = "delete from wishlist where place_id = $place_id and user_id= $user_id";
        $query = mysqli_query($con, $delete_query);
        if($query){
            ?>
            <script>
                window.location.href="user_dashboard.php?my_trips";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert('failed to remove place from your wishlist');
                window.location.href="user_dashboard.php?my_trip";
            </script>
            <?php
        }
    }
?>

<!-------------------------- for booking -------------------------->
<?php
	if(isset($_POST['book'])){
		$user_id = $_SESSION['user_id'];
		$payment_method = "Pay on the day of travel";
		$select_wishlist= "select * from wishlist where user_id= $user_id";
		$query = mysqli_query($con,$select_wishlist);
		$wishlist_count = mysqli_num_rows($query);
		if($wishlist_count>0){
			while($data = mysqli_fetch_assoc($query)){
				$wishlisted_place_id = $data['place_id'];
				$persons = $data['persons'];
                $date = $data['date'];
				$insert_query_booking = "INSERT INTO `bookings`(`user_id`, `place_id`, `persons`, `date`, `total_amount`, `payment_method`, `status`) VALUES ('$user_id','$wishlisted_place_id','$persons','$date','$total','$payment_method','success')";
				$query_booking= mysqli_query($con,$insert_query_booking);
				if($query_booking){
					$delete_wishlist = "DELETE FROM `wishlist` WHERE place_id= $wishlisted_place_id";
					$delete_wishlist_query = mysqli_query($con,$delete_wishlist);
				}
				else{
					?>
					<script>
						alert('an error occurred');
					</script>
					<?php
				}
			}
			?>
				<script>
					window.location.href="user_dashboard.php?my_trips";
					alert('Booking successful. Enjoy your trip');
				</script>
			<?php
		}
		else{
			?>
				<script>
					window.location.href="user_dashboard.php?my_trips";
					alert('You have not selected any place!');
				</script>
			<?php
		}
	}
?>
