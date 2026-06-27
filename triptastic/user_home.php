<section class="place" id="place" style="margin-top:4rem;">
	<h3 class="sub-heading"> Explore </h3>
		<h1 class="heading"> Trending Tour Packages </h1>
		<div class="box-container">
			<?php
				include 'connection/connection.php';
    	        $select_query = "select * from place";
    	        $query = mysqli_query($con, $select_query);
    	        while($data = mysqli_fetch_assoc($query)){
					$image = $data['image'];
    	            ?>
					<div class="box">
						<div class="image">
							<img src="<?php echo str_replace("../image","image",$image);?>" alt="place img">
							<a onclick="message()" href="manage_wishlist.php?id=<?php echo $data["place_id"] ?>" class="fas fa-heart"></a>
		 				</div>
		 				<div class="content">
		 					<h3><?php echo $data['place'] ?></h3>
							<p style="color: #4cbfa6"><?php echo $data['duration'] ?> days</p>
		 					<p style="color: #192a56"><?php echo $data['description'] ?></p>
							<span class="price">Rs.<?php echo $data['price'] ?><br></span>
							<a onclick="message()" href="manage_wishlist.php?id=<?php echo $data["place_id"] ?>" class="btn">Add to Wishlist</a>			
						</div>
					</div>
					<?php
				}
			?>
		</div>
</section>
	<!-----------------------------places section ends here--------------------------------->
 	
<!-----------------------------about section starts here-------------------------------->
<section class="about" id="about">
		<h3 class="sub-heading"> about us </h3>
		<div class="row">
			<div class="video_about" style="display: flex; margin: 0; padding: 0; height: 30rem; width: 70rem;">
				<video autoplay loop muted plays-inline>
					<source src="image/eat_1_LQ.mp4" alt="video">
				</video>
			</div>
			<div class="content">
				<h3>Best package to explore your holiday destination</h3>
				<p></p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut 	enim 	ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 		reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 	sunt in 	culpa qui officia deserunt mollit anim id est laborum.</p>
			
				<a href="#about" class="btn">learn more</a>
			</div>
		</div>
	</section>
	<!-----------------------------about section ends here---------------------------------->


	<!------------------------------ footer section starts here ---------------------------->
	<section class="footer" id="footer">
		<div class="box-container">
			<div class="box">
				<h3>quick links</h3>
					<a href="#home">home</a>	
					<a href="#about">about</a>
					<a href="#place">Places</a>
					<a href="user_dashboard.php?my_trips">book now</a>
			</div>
			<div class="box">
				<h3>contact information</h3>
					<a href="#review">+0342-345-7860</a>
					<a href="mailto:arnabbose@gmail.com">arnabbose@gmail.com</a>
					<a href="#review">durgapur,pin -713212</a>
			</div>
			<div class="box">
				<h3>follow us</h3>
					<a href="//www.facebook.com/login/">facebook</a>
					<a href="//www.twitter.com">twiter</a>	
					<a href="//www.instagram.com">instagram</a>
					<a href="//www.linkedin.com">linkedin</a>
			</div>
		</div>
		<div class="credit"> &copy; copyright <?php echo date('Y');?> Triptastic. <span>All rights reserved.</span>
	</section>
	<!-------------------------------footer section ends here-------------------------------->

