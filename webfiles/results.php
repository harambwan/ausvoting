<?php
include 'includes/functions.php';
include_once 'includes/db_connect.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Results</title>
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
        <link rel="stylesheet" href="styles/flipclock.css">
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
        <div class="row">
	<div class="col-md-12 section-heading text-center">
				<div class="row">
<?php
//Hide voting results until time is past
if (new DateTime() > new DateTime("2018-10-05 06:00:00")) {
    $results_published = true;
} else {
    $results_published = true;
}
if (isset($_SESSION['voted']) && $_SESSION['voted'] == 'YES') {
    echo "<h1>Results</h1><br /><br />Thank you for voting. Election results and outcomes will only be listed once the current voting period for your electoral division ends.";
    // Kill Session
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    session_destroy();
} elseif (isset($_SESSION['voted']) && $_SESSION['voted'] == 'NO') {
    echo "<h1>Results</h1><br /><br />You have already voted in this election.";
    
    // Kill Session
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    session_destroy();
}
?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if ($results_published == true) : ?>
<center><h1 style="margin-top: 0; font-size: 25px;">Deakin University Project Showcase 2017 Results</h1>
<br />
<p style="font-size: 17px;">
	    Book me in: <?php echo file_get_contents('results/0.txt');?><br />
            Is my smart home secure enough: <?php echo file_get_contents('results/1.txt');?><br>
            Creating a virtual pen testing lab: <?php echo file_get_contents('results/2.txt');?><br>
            Voice as a password: <?php echo file_get_contents('results/3.txt');?><br>
            One-TimePad VPN: <?php echo file_get_contents('results/4.txt');?><br>
            Course Thermometer: <?php echo file_get_contents('results/5.txt');?><br>
            Careers: <?php echo file_get_contents('results/6.txt');?><br>
            Infrastructure as a service: <?php echo file_get_contents('results/7.txt');?><br>
            Excon: <?php echo file_get_contents('results/8.txt');?><br>
            Pupillometer iOS: <?php echo file_get_contents('results/9.txt');?><br>
            Pupillometer android: <?php echo file_get_contents('results/10.txt');?><br>
            Stratejos: <?php echo file_get_contents('results/11.txt');?><br>
            Property inspector: <?php echo file_get_contents('results/12.txt');?><br>
            RedFid: <?php echo file_get_contents('results/13.txt');?><br>
            ChatX: <?php echo file_get_contents('results/14.txt');?><br>
            Follow Me mail-redirection: <?php echo file_get_contents('results/15.txt');?><br>
            Bus tracker: <?php echo file_get_contents('results/16.txt');?><br>
            Independent Games: <?php echo file_get_contents('results/17.txt');?><br>
            ICE project: <?php echo file_get_contents('results/18.txt');?><br>
            Architectural assessment using VR: <?php echo file_get_contents('results/19.txt');?><br>
            Snobal project: <?php echo file_get_contents('results/20.txt');?><br>
            Capstone promotion material: <?php echo file_get_contents('results/21.txt');?><br></p></center><br />
            <?php else : ?>
            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/flipclock.min.js"></script>
            <div class="clock" style="margin-top: 4%; margin-left: 29.5%;"></div>
            <script type="text/javascript">
                var clock;
                $(document).ready(function() {
                    var currentDate = new Date();
                    var futureDate  = new Date(currentDate.getFullYear(), 9, 5, 6);
                    var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
                    clock = $('.clock').FlipClock(diff, {
                        clockFace: 'DailyCounter',
                        countdown: true
                    });
                });
            </script>
			<div class="fh5co-text">
			<center><h2 style="font-size: 20px";>Time until election results released</h2></center>
			</div>
        <?php endif; ?>
<br />
<br />
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
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<!-- Counter -->
<script src="js/jquery.countTo.js"></script>
<script src="js/main.js"></script>
</body>
</html>
