<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Triptastic</title>
	<link rel="icon" href="image/logo.png">

	<!-- Swiper from CDN -->
	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>

	<!--font cdn link-->
	<link rel="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

	<!---bootstrap v5.2.0 css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!--custom css file link -->
	<link rel ="stylesheet" type="text/css" href="./css/style.css">
	<script>
		function message(){
			alert('signin to wishlist your favourite package');
		}
	</script>

</head>

<body>
	<section></section>
	<!-----------------header part start-------------->
	<header class="fixed-top" >
		<nav class="navbar navbar-expand-lg " >
		    <div class="container" >
		        <a class="navbar-brand" href="#"><img src="image/logo.png" alt="logo" width="37" height="40">TRIPTASTIC</a>
		        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		        </button>
		        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
		            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		                <li class="nav-item">
		                    <a class="nav-link" href="login.php">SIGN IN</a>
		                </li>
		            </ul>
		    	</div>
		    </div>
		</nav>
	</header>
	<!-------------- header section ends------------>

	<section></section>

	<!----------------------------------places section starts here-------------------------->	
	<section class="place" id="place">
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
							<a onclick="message()" href="#" class="fas fa-heart"></a>
		 				</div>
		 				<div class="content">
		 					<h3><?php echo $data['place'] ?></h3>
							<p style="color: #4cbfa6"><?php echo $data['duration'] ?> days</p>
		 					<p style="color: #192a56"><?php echo $data['description'] ?></p>
							<span class="price">Rs.<?php echo $data['price'] ?><br></span>
		 					<a onclick="message()" herf="" class="btn">add to wishlist</a>			
						</div>
					</div>
					<?php
				}
			?>
		</div>
	</section>
	<!----------------------------------places section ends here---------------------------->

	<!----------------------about section starts------------------------>
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
	<!--------------------------about section ends-------------------->



	<!--footer section starts-->
	<section class="footer" id="footer">
		<div class="box-container">
			<div class="box">
				<h3>quick links</h3>
					<a href="#home">home</a>	
					<a href="#about">about</a>
					<a href="#place">Places</a>
					<a href="login.php">book now</a>
			</div>
			<div class="box">
				<h3>contact information</h3>
					<a href="#review">0343-3457860</a>
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
	<!--footer section ends-->



	<!-- bootstrap v5.2.0 js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<!--swiper js file link -->
	<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
	<!-- custon js link -->
	<script src="./css/javascript.js"></script>
</body>
</html>