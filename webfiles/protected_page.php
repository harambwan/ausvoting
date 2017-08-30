<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

/*if ($_SESSION['timeout'] + 20 * 60 < time()) {
    //session times out, kill session etc...
}
else {
    //continue somehow
}*/
?>

<?php
// Process form submission
if(isset($_POST['submit'])) {
    if(isset($_POST['candidate'])) {
        $candidate = $_POST['candidate'];
        if ($candidate >= 0 && $candidate <= 22) {
            // Execute shell script based on the form submission
            $_SESSION['voted'] = vote($candidate);
            //Redirect to results page
            header("Location: ./results.php");
        }
    }
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
<div id="cssmenu">
<img style="float: left; margin: 10px 10px 10px 10px; width: 13%;" src="images/logo.png">
        <ul style="padding-top: 10px;">
		<?php if (login_check($mysqli) == true) {
			echo '<li><a href="includes/logout.php">Logout</a></li>';
		}
		else {
			echo '<li><a href="index.php">Home</a></li>';
		}
		?>
        </ul>
    <!-- Nav wrapper end -->
</div>
</head>
<body>
<section id="fh5co-services" data-section="services" style="width: 100%;">
	<div class="container text-center">
	<?php if (login_check($mysqli) == true) : ?>
        <p style="font-size: 25px;">Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
		<div class="row">
			<div class="col-md-12 section-heading text-center">
				<br />
				<h2 class="left-border to-animate" style="font-size: 25px;">Select your Candidate</h2>
				<div class="row">
				<p>Choose the project you feel delivered the most impressive demonstration and standout pitch at the capstone showcase. Carefully select your candidate and submit your vote using the button below. </p>
				<br />
				<br />
				<br />
				</div>
			</div>
		</div>
	</div>
</section>
<section id="fh5co-intro">
<form method="post">
	<div class="container" style="text-align: center;">
		<div class="row row-bottom-padded-lg">
			<div class="fh5co-block to-animate" style="background-image: url(images/books.jpg); margin-left: 4%; width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Book Me In</h2>
					<p style="font-size: 15px;">A novel mobile app for appointment management. Services providers will list the categories of services they deliver, duration of service category and working hours. End users can then search available services and retrieve providers.</p>
					<br /><input type="radio" name="candidate" value="0">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/smart.jpg); width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Is My Smart Home Secure Enough</h2>
					<p style="font-size: 15px;">Internet of Things is the new big revolution. Every single object around is is going to be internet enabled with osome intelligence built-in. This project assesses the security of a smart home system and recommendations on the best way to build them.</p>
					<br /><input type="radio" name="candidate" value="1">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/virtual.jpg); width: 30%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Creating a Virtual Pentesting Lab</h2>
					<p style="font-size: 15px;">A virtual hacking environment that allows users to practice their hacking skills consisting of a small network of connected machines. The environment will provide a platform for practicing penetration testing techniques in web and networks.</p>
					<br /><input type="radio" name="candidate" value="2">
				</div>
			</div>
			<br />
			<div class="fh5co-block to-animate" style="background-image: url(images/biometrics.jpg); margin-left: 4%; width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Voice as a Password</h2>
					<p style="font-size: 15px;">A new biometric mechanism which utilises voice recognition technology as a password to authenticate users in government, banking and other application services. The system considers replay attack issues and introduces relevant solutions.</p>
					<br /><input type="radio" name="candidate" value="3">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/vpn.jpg); width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">One-TimePad VPN</h2>
					<p style="font-size: 15px;">Quantum Encryption is theoretically secure but has flaws in its implementation and associated costs. One-TimePad is mathematically secure. This project provides a built module for LightRouter to prototype a One-TimePad network system.</p>
					<br /><input type="radio" name="candidate" value="5">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/therm.jpg); width: 30%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Course Thermometer</h2>
					<p style="font-size: 15px;">Project leads are advised to contact Australia Votes to provide details of your project and desirables. While no description is provided, users may still choose to cast their vote for this project based off what they have demonstrated.</p>
					<br /><input type="radio" name="candidate" value="6">
				</div>
			</div>
			<br  />
			<div class="fh5co-block to-animate" style="background-image: url(images/career.jpg); margin-left: 4%; width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Careers</h2>
					<p style="font-size: 15px;">Project leads are advised to contact Australia Votes to provide details of your project and desirables. While no description is provided, users may still choose to cast their vote for this project based off what they have demonstrated.</p>
					<br /><input type="radio" name="candidate" value="7">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/infra.jpg); width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Infrastructure as a Service</h2>
					<p style="font-size: 15px;">This projects aims to develop a tool for Infrastructure-as-a-Service cloud computing. The tool will allow the user to specify the required architecture for their cloud-hosted infrastructure with estimated costs and deployment included.</p>
					<br /><input type="radio" name="candidate" value="8">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/team.jpg); width: 30%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Excon</h2>
					<p style="font-size: 15px;">A master interface for controlling and evaluating team collaboration and goals. The interface provides a live visualisation of team progression, messaging between teams and individuals an logging of communication and activities.</p>
					<br /><input type="radio" name="candidate" value="9">
				</div>
			</div>
			<br  />
			<div class="fh5co-block to-animate" style="background-image: url(images/pupil.jpg); margin-left: 4%; width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Pupillometer iOS</h2>
					<p style="font-size: 15px;">A pupillometer iOS mobile application which utilises the device's LED flash and camera to detect, measure and track the pupil light reflex responses. This app can be relevant and accessible by healthcare providers such as doctors.</p>
					<br /><input type="radio" name="candidate" value="10">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/pupil2.jpg); width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Pupillometer Android</h2>
					<p style="font-size: 15px;">A pupillometer Android application which utilises the device's LED flash and camera to detect, measure and track the pupil light reflex responses. This app can be relevant and accessible by healthcare providers such as doctors.</p>
					<br /><input type="radio" name="candidate" value="11">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/ai.jpg); width: 30%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Stratejos</h2>
					<p style="font-size: 15px;">An artificial intelligence system for managing software projects. The outcome of this project is to create a completely autonomous intelligence which frees teams from administration, data analysis and reporting constraints.</p>
					<br /><input type="radio" name="candidate" value="12">
				</div>
			</div>
			<br  />
			<div class="fh5co-block to-animate" style="background-image: url(images/rental.jpg); margin-left: 4%; width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Property Inspector</h2>
					<p style="font-size: 15px;">A novel mobile app for social property inspection. Users will benefit from defining housing criteria which will assist in tailored property inspections with an endgame as a platform for applications, statistics and rent value.</p>
					<br /><input type="radio" name="candidate" value="13">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/algorithm.jpg); width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">RedFid</h2>
					<p style="font-size: 15px;">Research, evaluation and development into the fastest algorithm for determining the shortest paths for a Hitless Video Service across an IP network. A control system calculates the best path and configures the network for flow.</p>
					<br /><input type="radio" name="candidate" value="14">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/chat.jpg); width: 30%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">ChatX</h2>
					<p style="font-size: 15px;">A novel mobile application for people who co-exist in the same place such as transport and location. This platform provides a service where people can anonymously chat, socialise and share with those around them in a public space.</p>
					<br /><input type="radio" name="candidate" value="15">
				</div>
			</div>
			<br  />
			<div class="fh5co-block to-animate" style="background-image: url(images/mail.jpg); margin-left: 4%; width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Follow Me Mail Redirection</h2>
					<p style="font-size: 15px;">A service which exists as an alternative for conventional mail direction problems. The platform will provide notifications to existing mailers when individuals move from an address without the need for manual calls or updates.</p>
					<br /><input type="radio" name="candidate" value="16">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/bus.jpg); width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Bus Tracker</h2>
					<p style="font-size: 15px;">GPS and reporting of bus location to the general public. This system provides simulated bus movements and real-time coordinates to determine bus location, time of arrival and estimated travel time for individuals utilising buses.</p>
					<br /><input type="radio" name="candidate" value="17">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/games.jpg); width: 30%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Independent Games</h2>
					<p style="font-size: 15px;">Development of a brand new digital game from initial concept through to publishing as a game studio. The project has identified product/market fit and designed a concept and core mechanics using industry-standard game engines.</p>
					<br /><input type="radio" name="candidate" value="18">
				</div>
			</div>
			<br  />
			<div class="fh5co-block to-animate" style="background-image: url(images/ice.jpg); margin-left: 4%; width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">ICE Project</h2>
					<p style="font-size: 15px;">A game designed to be used by school students as part of a series of research activities around reducing substance abuse issues. The outcome should assess extent behaviour modification mechanisms can enhance player resilience.</p>
					<br /><input type="radio" name="candidate" value="19">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/model.jpg); width: 30%; margin-right: 1%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Architectural Assessment using VR</h2>
					<p style="font-size: 15px;">A tool to assist students in submission of architectual design for assessment, with the assessor able to review the model in a virtual space. A real-time shared VR experience to walk through the design is the desired outcome.</p>
					<br /><input type="radio" name="candidate" value="20">
				</div>
			</div>
			<div class="fh5co-block to-animate" style="background-image: url(images/vr.jpg); width: 30%; margin-bottom: 1%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Snobal Project</h2>
					<p style="font-size: 15px;">A virtual reality tutorial which helps to articulate the full potential of interactive virtual reality, provides guidelines around the use of hand controllers and demonstrate the emotional intensity of the VR platform.</p>
					<br /><input type="radio" name="candidate" value="21">
				</div>
			</div>
			<br />
			<div class="fh5co-block to-animate" style="background-image: url(images/trade.jpg); width: 30%; margin-left: 35%;">
				<div class="overlay-darker"></div>
				<div class="overlay"></div>
				<div class="fh5co-text">
					<h2 style="font-size: 17px;">Capstone Promotional Material</h2>
					<p style="font-size: 15px;">Project leads are advised to contact Australia Votes to provide details of your project and desirables. While no description is provided, users may still choose to cast their vote for this project based off what they have demonstrated.</p>
					<br /><input type="radio" name="candidate" value="22">
				</div>
			</div>
		</div>
		<button value="submit" class="btn" style="background-color: #4CA1AF; color: #fff;">Submit</button>
	<?php else : ?>
			<br />
            <p>
                <center><span class="error">You are not authorized to access this page.</span><br  />Please <a href="index.php">login</a>.</center>
            </p>
        <?php endif; ?>
	</div>
<br />
</form>
</section> 
<footer id="footer" role="contentinfo">
	<div class="container">
		<div class="">
			<div class="col-md-12 text-center">
				<p style="font-size: 17px;">Australia Votes | A Secure Online Voting System <br>This website was created in fulfilment of requirements of the Deakin University unit SIT302 - Project Delivery. <br />All imagery and logos have been labeled for reuse.</p>
			</div>
		</div>
		<img src="images/deakin.jpg" style="width: 15%; display: block; margin: 0 auto; padding-top: 20px;">
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
