<?php
include 'includes/functions.php';
sec_session_start();
?>

<!DOCTYPE HTML>
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
            <li><a href="index.php">Home</a></li>
        </ul>
    <!-- Nav wrapper end -->
</div>
</head>
    
<?php if ($_SESSION['user_id'] == 23) : ?>
        <body>
            <section id="fh5co-services" data-section="services" style="width: 100%;">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-12 section-heading text-center">
                            <div class="row">
                                <h1>Administration Console</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <div><center>
                <!--<h1>Voting Period:</h1>
                <h2>Start of Voting Period</h2>
<?php /*
                $start = fopen('includes/startdate.txt');
                if (!($start == NULL)){
                    echo '<p>Current start date is: ', $start, '<p>';
                }
*/
?>

                <h2>Finish of Voting Period</h2>
                    <p>Finish time and date</p>-->
                <h2>Manually count and publish results</h2>
                    <input type="button" onclick="location.href='includes/countvotes.php'" value="Ship it!" class="btn" width="92" style="background-color: #4CA1AF; color: #fff;">
                <h3>Hide Results</h3>
                    <input type="button" onclick="location.href='includes/unpublish.php'" value="Hide Results" class="btn" width="92" style="background-color: #4CA1AF; color: #fff;">
            
                <br><br><br></center></div>
                
<?php else : ?>
            <center><p>You are not authorized to access this page.<br>Please <a href="index.php">login</a>.</p></center>
            
<?php endif; ?>
            
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
