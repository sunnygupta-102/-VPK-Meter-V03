<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- TItle And Sharing Img -->
		<title>Test Your Body Type</title>
        <meta name="description" content="🌿Know Your Body Type🌿 - 👇Click Here👇">
        <meta property="og:title" content="🌿Test Your Body Type🌿 - Vata | Pitta | Kapha" />
        <meta property="og:image" itemprop="image" content="https://arogyamayurveda.com/vpk-meter5/images/feat.png">
		<!-- TItle And Sharing Img -->

		<!-- FontAwesome-cdn include -->
		<link rel="stylesheet" href="assets/font-awesome/5.15.3/css/all.min.css">
		<!-- Google fonts include -->
		<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
		<!-- Bootstrap-css include -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Animate-css include -->
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<!-- Main-StyleSheet include -->
		<link rel="stylesheet" href="assets/css/style2.css">
		<link rel="stylesheet" href="assets/css/custom.css">
	</head>
	<body>
		<div class="wrapper pt-5">
			<div class="container-fluid">
				<div class="row center text-center">
					<div class="col-md-4 home-h">
						<p class="ht1">Test Your Body Type</p>
						<p class="ht2">Vata | Kapha | Pitta</p>
						<p class="ht3">जानें अपने शरीर की प्रकृति</p>
					</div>
			</div>
			<div class="row center text-center">
				<form method="GET" action="start.php">
					<div class="col-md-4 offset-md-4">
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<div class="input-group-text form-icon-shin"><i style="font-size: 25px;" class="fas fa-user"></i></div>
							</div>
							<input name="your_name" type="text" class="form-control form-sec-shin" placeholder="Enter Your Name" required />
						</div>
						
						<div class="input-group mb-2">
							<div class="input-group-prepend">
								<div class="input-group-text form-icon-shin"><i style="font-size: 25px;" class="fas fa-mobile-alt"></i></div>
							</div>
							<input name="mobile_number" type="number" class="form-control form-sec-shin" placeholder="Enter Your Phone Number"  required />
						</div>
						<button style="margin-top: 20px;" type="submit" class="f_btn text-uppercase rounded-pill border-0 main-sub-btn">Start</button>
						</div>
					</form>
					
				</div>
			</div>
			<div class="container">
				
			</div>
		</div>
		<!-- jQuery-js include -->
		<script src="assets/js/jquery-3.6.0.min.js"></script>
		<!-- Bootstrap-js include -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- jQuery-validate-js include -->
		<script src="assets/js/jquery.validate.min.js"></script>
		<!-- Custom-js include -->
		<script src="assets/js/script.js"></script>
	</body>
	
</html>											