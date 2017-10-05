<?php
include 'includes/functions.php';
include_once 'includes/db_connect.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
	<title>Results</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />
    <style>#chartdiv { width: 100%; height: 500px; }</style>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/flipclock.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/JavaScript" src="js/sha512.js"></script> 
    <script type="text/JavaScript" src="js/forms.js"></script> 
	<script type="text/JavaScript" src="js/modernizr-2.6.2.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
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
            <li><a href="index.php">Home</a></li>
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
if (new DateTime() > new DateTime("2017-10-05 09:00:00")) {
    $results_published = true;
} else {
    $results_published = file_get_contents('includes/results_published.txt');
    if ($results_published == NULL) {
        $results_published = false;
    }
}
if (isset($_SESSION['voted']) && $_SESSION['voted'] == 'YES') {
    echo "<h1>Results</h1><br /><br />Thank you for voting. Election results and outcomes will only be listed once the current voting period for your electoral division ends.<br><b>You have been logged out.</b>";
    // Kill Session
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    session_destroy();
} elseif (isset($_SESSION['voted']) && $_SESSION['voted'] == 'NO' && $results_published == false) {
    echo "<h1>Results</h1><br /><br />You have already voted in this election.<br><b>You have been logged out.</b>";
    
    // Kill Session
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    session_destroy();
} else {
    echo "<h1>Results</h1>";
}
?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php if ($results_published == 'true') : 
    $results['Book me in'] = file_get_contents('results/0.txt');
    $results['Is My Smart Home Secure Enough'] = file_get_contents('results/1.txt');
    $results['Virtual Penetration Testing Lab'] = file_get_contents('results/2.txt');
    $results['Voice as a Password'] = file_get_contents('results/3.txt');
    $results['One-TimePad VPN'] = file_get_contents('results/4.txt');
    $results['Thermostat'] = file_get_contents('results/5.txt');
    $results['Careers & Education'] = file_get_contents('results/6.txt');
    $results['Infrastructure as a Service'] = file_get_contents('results/7.txt');
    $results['Excon'] = file_get_contents('results/8.txt');
    $results['Pupillometer (iOS)'] = file_get_contents('results/9.txt');
    $results['Pupillometer (Android)'] = file_get_contents('results/10.txt');
    $results['Stratejos'] = file_get_contents('results/11.txt');
    $results['Property Inspector'] = file_get_contents('results/12.txt');
    $results['RedFid'] = file_get_contents('results/13.txt');
    $results['ChatX'] = file_get_contents('results/14.txt');
    $results['Follow Me'] = file_get_contents('results/15.txt');
    $results['Bus Hop'] = file_get_contents('results/16.txt');
    $results['Swordlife'] = file_get_contents('results/17.txt');
    $results['ICE Project'] = file_get_contents('results/18.txt');
    $results['InSpace'] = file_get_contents('results/19.txt');
    $results['Snobal Project'] = file_get_contents('results/20.txt');
    $results['Capstone Promotional Material'] = file_get_contents('results/21.txt');
    $results['NetGazer'] = file_get_contents('results/22.txt');
    
    //Sort by value
    arsort($results, 1);
    foreach ($results as $key => $value) {
        $names[] = $key;
        $results_data[] = $value;
    }
?>
    
<center><h1 style="margin-top: 0; font-size: 25px;">Circuit '17s Most Popular Project</h1>
<br />
<div id="top_x_div" style="width:85%;"><script>
var projects = <?php echo json_encode($names) ?>;
var results = <?php echo json_encode($results_data) ?>;

google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawStuff);

function drawStuff() {
    var data = new google.visualization.arrayToDataTable([
        ['Project', 'Votes'],
        [projects[0], parseInt(results[0])],
        [projects[1], parseInt(results[1])],
        [projects[2], parseInt(results[2])],
        [projects[3], parseInt(results[3])],
        [projects[4], parseInt(results[4])],
        [projects[5], parseInt(results[5])],
        [projects[6], parseInt(results[6])],
        [projects[7], parseInt(results[7])],
        [projects[8], parseInt(results[8])],
        [projects[9], parseInt(results[9])],
        [projects[10], parseInt(results[10])],
        [projects[11], parseInt(results[11])],
        [projects[12], parseInt(results[12])],
        [projects[13], parseInt(results[13])],
        [projects[14], parseInt(results[14])],
        [projects[15], parseInt(results[15])],
        [projects[16], parseInt(results[16])],
        [projects[17], parseInt(results[17])],
        [projects[18], parseInt(results[18])],
        [projects[19], parseInt(results[19])],
        [projects[20], parseInt(results[20])],
        [projects[21], parseInt(results[21])],
        [projects[22], parseInt(results[22])]
    ]);

    var options = {
        legend: { position: 'none' },
        bars: 'horizontal',
        axes: {
            x: {
                0: { side: 'top', label: 'Votes'},
            }
        },
        bar: { groupWidth: "90%" },
        height: 1000,
    };

    var chart = new google.charts.Bar(document.getElementById('top_x_div'));
    chart.draw(data, options);
};
</script></div></center>
<br />
    
<?php else : ?>
    <div class="flip-counter clock flip-clock-wrapper" style="margin-top: 4%; margin-left: 29.5%; width: 100%;">
    <script type="text/javascript">
        var clock;
        $(document).ready(function() {
            var currentDate = new Date();
            var futureDate  = new Date(currentDate.getFullYear(), 9, 5, 19);
            var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;
            clock = $('.clock').FlipClock(diff, {
                clockFace: 'DailyCounter',
                countdown: true
            });
        });
    </script>
    </div>
    <div class="fh5co-text" style="margin-top: 1%;"><center>
    <h2 style="font-size: 20px";>Time until election results released</h2></center>
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
