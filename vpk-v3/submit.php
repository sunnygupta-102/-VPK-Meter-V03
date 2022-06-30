<?php
	include('db.php');
	$your_name = $_REQUEST['your_name'];
	$mobile_number = $_REQUEST['mobile_number'];
	$op1 = $_REQUEST['stp_1_select_option'];
	$op2 = $_REQUEST['stp_2_select_option'];
	$op3 = $_REQUEST['stp_3_select_option'];
	$op4 = $_REQUEST['stp_4_select_option'];
	$op5 = $_REQUEST['stp_5_select_option'];
	$op6 = $_REQUEST['stp_6_select_option'];
	$op7 = $_REQUEST['stp_7_select_option'];
	$op8 = $_REQUEST['stp_8_select_option'];
	
	
	$query = mysqli_query($con, "insert into result (your_name, mobile_number, result) values ('$your_name', '$mobile_number', '')");
	$insid = mysqli_insert_id($con);
	$query = mysqli_query($con, "insert into result_detail (result_id, result_value) values ($insid, '$op1')");
	$query = mysqli_query($con, "insert into result_detail (result_id, result_value) values ($insid, '$op2')");
	$query = mysqli_query($con, "insert into result_detail (result_id, result_value) values ($insid, '$op3')");
	$query = mysqli_query($con, "insert into result_detail (result_id, result_value) values ($insid, '$op4')");
	$query = mysqli_query($con, "insert into result_detail (result_id, result_value) values ($insid, '$op5')");
	$query = mysqli_query($con, "insert into result_detail (result_id, result_value) values ($insid, '$op6')");
	$query = mysqli_query($con, "insert into result_detail (result_id, result_value) values ($insid, '$op7')");
	$query = mysqli_query($con, "insert into result_detail (result_id, result_value) values ($insid, '$op8')");
	
	
	$V = 0;
	$P = 0;
	$K = 0;
	
	$vresult = mysqli_query($con, "select * from result_detail where result_id = $insid and result_value = 'V'");
	$vnor = mysqli_num_rows($vresult);
	
	$presult = mysqli_query($con, "select * from result_detail where result_id = $insid and result_value = 'P'");
	$pnor = mysqli_num_rows($presult);
	
	$kresult = mysqli_query($con, "select * from result_detail where result_id = $insid and result_value = 'K'");
	$knor = mysqli_num_rows($kresult);
	
	$result = "";
	$key = "";
	
	$max = max($vnor, $pnor, $knor);
	
	if($vnor == $max)
	{
		$result = "Vata";
		$key = "V";
	}
	
	if($pnor == $max)
	{
		$result = "Pitta";
		$key = "P";
	}
	
	if($knor == $max)
	{
		$result = "Kapha";
		$key = "K";
	}
	
	$query = mysqli_query($con, "update result set result = 'V = $vnor, P = $pnor, K = $knor' where id = $insid");
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VPK Test</title>
    <!-- FontAwesome-cdn include -->
    <link rel="stylesheet" href="assets/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google fonts include -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <!-- Bootstrap-css include -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Animate-css include -->
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <!-- Main-StyleSheet include -->
    <link rel="stylesheet" href="assets/css/style2.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/shin-animate.css">
</head>

<body>
    <?php
			$to = "arogyamayurveda2020@gmail.com";
			$subject = "VPK Form Submitted";
			
			$message = "
			<html>
			<head>
			<title>VPK Form Submitted</title>
			</head>
			<body>
			<p>Body type is $result</p>
			<table>
			<tr>
			<th>Name</th>
			<th>Mobile Number</th>
			<th>VPK</th>
			</tr>
			<tr>
			<td>$your_name</td>
			<td>$mobile_number</td>
			<td>Vata = $vnor, Pitta = $pnor, Kapha = $knor</td>
			</tr>
			</table>
			</body>
			</html>
			";
			
			
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			$headers .= 'From: <support@arogyamayurveda.com>';
			
			mail($to,$subject,$message,$headers);
		?>
    <div class="wrapper pt-5">
        <div class="container-fluid">

            <!-- <div class="row center text-center">
				<div class="logo-shin">
					<img style="width:300px" src="images/logo.png" class="logo-main">
				</div> -->
            <h2 class="cong-h1">Congratulations</h2>
            <h2 class="bt-result">Your body type is</h2>
            <h3 class="result-value"><?php echo $result; ?></h3>
            <p class="mwith">Your body type matches with:</p>
            <div class="mcelb">
                <?php 
							$result = mysqli_query($con, "Select * from match_with where body_type = '$key'");
							while($row = mysqli_fetch_array($result))
							{
							?>
                <div class="celbox">
                    <img src="images/matching/<?php echo $row['photo']; ?>">
                    <span class="celb-name"><?php echo $row['celebrity_name']; ?></span>
                </div>
                <?php } ?>
            </div>
        </div>
        <!-- Thank You Section -->
        <!--<div class="thank">
				<h2>Special Thanks From</h2>
				<div class="sec-logo">
					<img style="width:300px" src="images/logo2.png" class="">
				</div>
			</div>-->
        <!-- Thank You Section -->

        <div class="row center" style="display:grid;margin-top: 40px;">
            <?php if($key == "V"){ ?>
            <div id="vata" class="vpk-details">
                <h1>Your Qualities As Vata</h1>
                <p>•energetic •Friendly •Open Minded •Family Man </p>
                <hr>

                <h2>Ideal Foods For You</h2>
                <ol>
                    <li>Hot nourishing beverages such as warm milk</li>
                    <li>Cooked foul</li>
                    <li>Hot cereals and rice padding.</li>
                </ol>
                <hr>
                <h2>Foods That Can Harm You</h2>
                <ol>
                    <li>Watermelon</li>
                    <li>Frozen or cold foods</li>
                    <li>Raw or dried vegetables.</li>
                </ol>
            </div>
            <?php } ?>
            <?php if($key == "P"){ ?>
            <div class="vpk-details">
                <h1>Your Qualities As Pitta</h1>
                <p><b>•</b> Highly intelligent <b>•</b> Competitive <b>•</b> Ambitious <b>•</b> Highly focused <b>•</b> You are determined <b>•</b> Good sense of taste
                    and Food lover</p>
                    <hr>
                <h2>Ideal Foods For You</h2>
                <ol>
                    <li>Cucumbers</li>
                    <li>Celery</li>
                    <li>Pumpkins</li>
                    <li>Grains like wheat, oats, barley, and white rice.</li>
                </ol>
                <hr>
                <h2>Foods That Can Harm You</h2>
                <ol>
                    <li>Apricots</li>
                    <li>Pungent</li>
                    <li>Carrots</li>
                    <li>Beats</li>
                    <li>Chilli peppers</li>
                    <li>Avoid red chicken, Red or sweet wine or chocolate</li>
                </ol>
            </div>
            <?php } ?>
            <?php if($key == "K"){ ?>
            <div class="vpk-details">
                <h1>Your Qualities As Kapha</h1>
                <p><b>•</b> Patient <b>•</b> Grounded <b>•</b> Stable <b>•</b> Family man <b>•</b> Good sense of taste
                    and Food lover</p>
                <hr>

                <h2>Ideal Foods For You</h2>
                <ol>
                    <li>Apple</li>
                    <li>Pears</li>
                    <li>Watermelon</li>
                    <li>Pomegranate</li>
                    <li>Apricot</li>
                    <li>Eat smaller meals and fewer sweets</li>
                </ol>
                <hr>
                <h2>Foods That Can Harm You</h2>
                <ol>
                    <li>Pine apples</li>
                    <li>Bananas</li>
                    <li>Sweet potatoes and potatoes</li>
                </ol>
                
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- Sharing Section -->
    <div class="mwith1">
    <p class="">Share with your Loved One's:</p>
    <button type="button" class="btn btn-warning btn-sm shin-socb"><a
            href="whatsapp://send?text=%20*Click%20Here*%20%F0%9F%91%87%20https://arogyamayurveda.com/vpk"
            class="shin-a"><i class="fa fa-whatsapp"></i></a></button>
    <button type="button" class="btn btn-warning btn-sm shin-socb"><a href="https://www.instagram.com/arogyam_ayurveda/"
            class="shin-a"><i class="fa fa-instagram"></i></a></button>
    <button type="button" class="btn btn-warning btn-sm shin-socb"><a
            href="https://www.facebook.com/sharer/sharer.php?u=https://arogyamayurveda.com/vpk/" class="shin-a">
            <i class="fa fa-facebook"></i></a></button>
            <p class="lst-p">Let them know what their body type is ?</p>
    
    
        <div class="call-btn">
            <p>Get Free Consultation:</p>
            <a href="tel:+919216001410" target="_blank" rel="noopener noreferrer"><button type="button"
                class="btn btn-warning c-btn">Call Now!</button></a>
        </div>
        </div>
        <!-- Sharing Section -->

    </div>
    <!-- jQuery-js include -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap-js include -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- jQuery-validate-js include -->
    <script src="assets/js/jquery.validate.min.js"></script>
    <!-- Custom-js include -->
    <script src="assets/js/script.js"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f76934a42b223a0">
    </script>

</body>

</html>