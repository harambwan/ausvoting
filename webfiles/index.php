<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

// Set variable to fix errors on results.php when coming from index.php
$_SESSION['voted'] = 'INDEX';

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Australia Votes</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
    <script type="text/JavaScript" src="js/sha512.js"></script> 
    <script type="text/JavaScript" src="js/forms.js"></script> 
	<script type="text/JavaScript" src="js/modernizr-2.6.2.min.js"></script>
	<link rel="stylesheet" href="styles/main.css">
	<link rel="stylesheet" href="styles/animate.css">
	<link rel="stylesheet" href="styles/icomoon.css">
	<link rel="stylesheet" href="styles/simple-line-icons.css">
	<link rel="stylesheet" href="styles/magnific-popup.css">
	<link rel="stylesheet" href="styles/bootstrap.css">
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
</head>
<body>

<div id="cssmenu">
<img style="float: left; margin: 10px 10px 10px 10px; width: 13%;" src="images/logo.png">
        <ul style="padding-top: 10px;">
	    <li><a href="#" onclick="document.getElementById('id02').style.display='block'">Login</a></li>
            <li><a href="#" data-nav-section="services"><span>News</span></a></li>
            <li><a href="results.php">Results</a></li>
        </ul>
    </div>
    <!-- Nav wrapper end -->
</div>
       <?php
        if (isset($_GET['error'])) {
			$message = "Error Logging In!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        ?> 
<section id="fh5co-home" data-section="home" style="background-image: url(images/main.jpg);" data-stellar-background-ratio="0.5">
	<div class="gradient"></div>
	<div class="container">
		<div class="text-wrap">
			<div class="text-inner">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<div style="padding-top: 10px;" >
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class="slant"></div>
</section>
<section id="fh5co-intro">
	<div class="container">
		<div class="row row-bottom-padded-lg">
			<div class="fh5co-block to-animate" style="background-image: url(images/house.jpg);">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 20px;">Fast</h2>
					<br />
					<p style="font-size: 15px;">Faster than any ballot box, Australia Votes has been developed to be as seamless as possible, with voting taking no more than 5-10 minutes.<br/></p>
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/parliament.jpg);">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 20px;">Secure</h2>
					<br />
					<p style="font-size: 15px;">Australia's new online voting system has been developed with your security and privacy our greatest priority. Rest assured that our innovative system prevents anyone from accessing your personal information.</p>
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/opera.jpg);">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 20px;">Simple</h2>
					<br />
					<p style="font-size: 15px;">Created entirely with users in mind from all walks of life, our innovative voting platform will make it easier to vote then ever before.</p>
				</div>
			</div>
		</div>
	
		<div class="row watch-video text-center to-animate" style="margin-left: 0;">
			<div class="col-md-12 section-heading text-center">
				<h2 class="to-animate" data-section="general" style="margin-left: 0; font-size: 25px; padding-top: 20px;">Announcements</h2>
			</div>
			<div class="col-md-6 to-animate col-md-offset-3">
					<h3 style="margin-left: 0; font-size: 20px; margin-top: -5px; width: 100%;">Login to vote for the most impressive project showcase</h3>
					<br/>
					<p style="font-size: 17px;">Throughout the showcase, you would have come across many impressive and innovative projects. Australia Votes allows you to vote for your favourite project, with results and winners released at the end of the event. Login to cast your vote!</p>
					<br />
					<h3 style="margin-left: 0; font-size: 20px;">Australia Votes enters Beta Testing</h3>
					<br/>
					<p style="font-size: 17px;">Australia Votes has been developed in collaboration with Deakin University to allow federal, state and local elections to enter the digital space. A team of talented students set out to bridge the gap while developing a platform with the necessary security for this critical infrastructure. We present to you, the public, Australia Votes.</p>
					<br />
			</div>
		</div>
	</div>
</section>
<section id="fh5co-services" data-section="services">
	<div class="container text-center">
		<div class="row">
			<div class="col-md-12 section-heading text-center">
				<h2 class="left-border to-animate" style="font-size: 25px; margin-left: -3%; padding-top: 50px;">Infrastructure</h2>
				<div class="row">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6 fh5co-service to-animate">
				<i class="icon to-animate-2 icon-lock" style="margin-bottom: -10px;"></i>
				<h3 style="font-size: 25px; font-weight: 400;">Security</h3>
				<p style="font-size: 17px;">State-of-the-art security schemes and data encryption techniques provide a stable, secure and robust voting system.</p>
			</div>
			<div class="col-md-6 col-sm-6 fh5co-service to-animate">
				<i class="icon to-animate-2 icon-link" style="margin-bottom: -10px;"></i>
				<h3 style="font-size: 25px; font-weight: 400;">Blockchain</h3>
				<p style="font-size: 17px;">This groundbreaking technology utilised by crypto-currencies ensures vote integrity is preserved and data is available at all times.</p>
			</div>
			<div class="clearfix visible-sm-block"></div>
			<div class="col-md-6 col-sm-6 fh5co-service to-animate">
				<i class="icon to-animate-2 icon-support" style="margin-bottom: -10px; margin-top: 20px;"></i>
				<h3 style="font-size: 25px; font-weight: 400;">Confidentiality</h3>
				<p style="font-size: 17px;">Robust encryption algorithms prevent your personal or voting information from being disclosed to anyone but you.</p>
			</div>
			<div class="col-md-6 col-sm-6 fh5co-service to-animate">
				<i class="icon to-animate-2 icon-layers2" style="margin-bottom: -15px; margin-top: 20px;"></i>
				<h3 style="font-size: 25px; font-weight: 400;">Integrity</h3>
				<p style="font-size: 17px;">Innovative blockchain technology prevents data modification. After submitting your vote, only AEC technology can decrypt and count your vote. </p>
			<br />
			<br />
			</div>
		</div>
	</div>
</section>

<div id="id02" class="modal">
<form class="modal-content animate" action="includes/process_login.php" method="post" name="login_form">
    <div class="imgcontainer">
    <span onclick="document.getElementById('id02').style.display='none'" class="close2" title="Close Modal">&times;</span>
</div>

<div class="container">
<img src="images/logo.png" style="width: 30%; margin-top: -10px">
<br />
<br />
    <label><b>Email</b></label><br />
    <input type="text" placeholder="" name="email" required>
<br />
    <label><b>Password</b></label><br />
    <input type="password" placeholder="" name="password" id="password" required>
<br />

	  <input type="submit" value="Login" class="button" style="margin-bottom: 10px; margin-top: 10px;"
                   onclick="formhash(this.form, this.form.password);" /> 
    </div>
</form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<footer id="footer" role="contentinfo">
	<div class="container">
		<div class="">
			<div class="col-md-12 text-center">
				<p style="font-size: 17px;">Australia Votes | A Secure Online Voting System <br>This website was created in fulfilment of requirements of the Deakin University unit SIT302 - Project Delivery. <br />All imagery and logos have been labeled for reuse.</p>
			</div>
		<img src="images/deakin.jpg" style="width: 15%; display: block; margin: 0 auto; padding-top: 10px; margin-bottom: -20px; padding-top: 20px;">
		</div>
		<a href="#" class="gotop js-gotop" style="padding-top: 20px; padding-bottom: 10px;"><i class="icon-arrow-up2" style="color: #4CA1AF;"></i></a>
	</div>
</footer>
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Counter -->
<script src="js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="js/google_map.js"></script>
<!-- Main JS (Do not remove) -->
<script src="js/main.js"></script>
</body>
</html>
