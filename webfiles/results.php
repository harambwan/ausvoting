<html>
    <head>
        <title>Results</title>
        <link rel="stylesheet" href="styles/flipclock.css">
    </head>
    <body>
        <h1>Results</h1>
        <a href="index.php">Home Page</a>
        <br>

<?php

include 'includes/functions.php';
sec_session_start();

//Hide voting results until time is past
if (new DateTime() > new DateTime("2017-10-05 06:00:00")) {
    $results_published = true;
} else {
    $results_published = false;
}

if (isset($_SESSION['voted']) && $_SESSION['voted'] == 'YES') {
    echo "<h2>Thanks for voting... Results will be displayed here once voting period has ended!", "</h2>";
    echo "You have been logged out.","<br>";

    // Kill Session
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    session_destroy();

} elseif (isset($_SESSION['voted']) && $_SESSION['voted'] == 'NO') {
    echo "You have already voted...";
    
    // Kill Session
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    session_destroy();
}
?>

<?php
        if ($results_published == true) :
            echo "<h1>Voting Results:</h1><p>";
            echo "Book me in: ", file_get_contents('results/0.txt'), "<br>";
            echo "Is my smart home secure enough: ", file_get_contents('results/1.txt'), "<br>";
            echo "Creating a virtual pen testing lab: ", file_get_contents('results/2.txt'), "<br>";
            echo "Voice as a password:", file_get_contents('results/3.txt'), "<br>";
            echo "One-TimePad VPN: ", file_get_contents('results/4.txt'), "<br>";
            echo "Course Thermometer: ", file_get_contents('results/5.txt'), "<br>";
            echo "Careers: ", file_get_contents('results/6.txt'), "<br>";
            echo "Infrastructure as a service: ", file_get_contents('results/7.txt'), "<br>";
            echo "Excon: ", file_get_contents('results/8.txt'), "<br>";
            echo "Pupillometer iOS: ", file_get_contents('results/9.txt'), "<br>";
            echo "Pupillometer android: ", file_get_contents('results/10.txt'), "<br>";
            echo "Stratejos: ", file_get_contents('results/11.txt'), "<br>";
            echo "Property inspector: ", file_get_contents('results/12.txt'), "<br>";
            echo "RedFid: ", file_get_contents('results/13.txt'), "<br>";
            echo "ChatX: ", file_get_contents('results/14.txt'), "<br>";
            echo "Follow Me mail-redirection: ", file_get_contents('results/15.txt'), "<br>";
            echo "Bus tracker: ", file_get_contents('results/16.txt'), "<br>";
            echo "Independent Games: ", file_get_contents('results/17.txt'), "<br>";
            echo "ICE project: ", file_get_contents('results/18.txt'), "<br>";
            echo "Architectural assessment using VR: ", file_get_contents('results/19.txt'), "<br>";
            echo "Snobal project: ", file_get_contents('results/20.txt'), "<br>";
            echo "Capstone promotion material: ", file_get_contents('results/21.txt'), "<br>", "</p>";
         else : 
            echo "<h2>Results will be published in:</h2>"; ?>
            <script src="js/jquery-3.2.1.min.js"></script>
            <script src="js/flipclock.min.js"></script>
            <div class="clock" style="margin:2em;"></div>
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
        <?php endif; ?>
    </body>
</html>