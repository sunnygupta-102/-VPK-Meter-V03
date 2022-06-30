<?php include('db.php'); 
	if(isset($_REQUEST['your_name']) && isset($_REQUEST['mobile_number']))
	{
		$your_name = $_REQUEST['your_name'];
		$mobile_number = $_REQUEST['mobile_number'];
	}
	else
	{
		echo '<script type="text/javascript">window.location = "index.php"; </script>';
	}
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>VPK Test</title>
		<!-- FontAwesome-cdn include -->
		<link rel="stylesheet" href="assets/font-awesome/5.15.3/css/all.min.css">
		<!-- Google fonts include -->
		<link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
		<!-- Bootstrap-css include -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<!-- Animate-css include -->
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<!-- Main-StyleSheet include -->
		<link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="assets/css/custom2.css">
	</head>
	<body>
		<div class="wrapper pt-5">
			<div class="container-fluid">
				<div class="row text-center">
				<!-- Top Head Text WIth Emojis -->	
				<div> 
					<p class="magic-text">👇Select and Press Next👇</p>
				</div>
					<!-- Circles which indicates the steps of the form: -->
					<div class="col step_progress d-flex d-none d-sm-block">
						<?php 
							$presult = mysqli_query($con, "select * from questions order by id");
							$pnor = mysqli_num_rows($presult);
							$i = 0;
							while($prow = mysqli_fetch_array($presult))
							{
								$i = $i + 1;
								$id = $prow['id'];
							?>
							<span class="step bg-white rounded-pill <?php if($id == 1){echo "active";} ?>"><?php echo $i; ?></span>
							
							<?php 
								
							} ?>
					</div>
				</div>
			</div>
			<div class="container">
				
				<form class="multisteps_form position-relative" id="wizard" method="POST" action="submit.php">
					<input type="hidden" name="your_name" value="<?php echo $your_name; ?>">
					<input type="hidden" name="mobile_number" value="<?php echo $mobile_number; ?>">
					<?php 
						$qresult = mysqli_query($con, "select * from questions order by id");
						$qnor = mysqli_num_rows($qresult);
						while($qrow = mysqli_fetch_array($qresult))
						{
							$id = $qrow['id'];
							$question = $qrow['question'];
						?>
						<!------------------------- Step-<?php echo $id; ?> ----------------------------->
						<div class="multisteps_form_panel">
							<!-- Form-content -->
							<span class="question_number text-uppercase d-flex justify-content-center align-items-center">Question <?php echo $id; ?>/<?php echo $qnor; ?></span>
							<h1 class="question_title text-center"><?php echo $question; ?></h1>
							
							<div class="flex-row">
								<?php 
									$a = 0;
									$aresult = mysqli_query($con, "select * from options where question_id = $id order by id"); 
									while($arow = mysqli_fetch_array($aresult))
									{
										$a = $a + 1;
										$aid = $arow['id'];
										$answer_option = $arow['answer_option'];
										$category = $arow['category'];
										$photo = $arow['photo'];
										
									?>
									<div class="<?php if($a > 2){echo "flex-col";}else{echo "flex-col";} ?> step_<?php echo $id; ?>">
										<div class="rb"><input  type="radio" class="op-radio" id="opt_<?php echo $aid; ?>" name="stp_<?php echo $id; ?>_select_option" value="<?php echo $category; ?>"></div>
										<label class="op-label" for="opt_<?php echo $aid; ?>">
											<div class="option-box">
												<img class="ansimg" src="images/answers/<?php echo $photo ?>">
											</div>
											<div class="option-name"><?php echo $answer_option; ?></div>
										</label>
									</div>
									<?php
									}
								?>
							</div>
							
						</div>
						<?php 
						}
					?>
					
					<!---------- Form Button ---------->
					<div class="form_btn text-center mt-3">
						<button type="button" class="f_btn text-uppercase rounded-pill border-0" id="prevBtn" onclick="nextPrev(-1, 'Previous')">Previous Question</button>
						<button type="button" class="f_btn text-uppercase rounded-pill border-0" id="nextBtn" onclick="nextPrev(1, 'Next')">Next Question</button>
						
					</div>
				</form>	
				
			</div>
			<!-- jQuery-js include -->
			<script src="assets/js/jquery-3.6.0.min.js"></script>
			<!-- Bootstrap-js include -->
			<script src="assets/js/bootstrap.min.js"></script>
			<!-- Photoset grid -->
			<!--script src="assets/js/photoset_grid.min.js"></script-->
			<!-- jQuery-validate-js include -->
			<script src="assets/js/jquery.validate.min.js"></script>
			<!-- Custom-js include -->
			<script src="assets/js/script.js"></script>
		</body>
		
	</html>																																					