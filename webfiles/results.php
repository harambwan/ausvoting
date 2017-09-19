<?php
//error reporting, disable later
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'includes/functions.php';
sec_session_start();

//toggle later to display results
$results_published = false;

if ($_SESSION['voted'] == 'YES') {
    echo "Thanks for voting... Results will be displayed here once voting period has ended!", "<br>";
    echo "You have been logged out.","<br>";
    echo "Attempted to vote for: ", $_SESSION['candidate'], "<br>";
    echo "Script Output: ", $_SESSION['output'];
    
/*DISABLED DURING DEVELOPMENT FOR TESTING ******************************************************   
    // Kill Session
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    session_destroy();
***********************************************************************************************/
} elseif ($_SESSION['voted'] == 'NO') {
    echo "You have already voted...";
    
/*DISABLED DURING DEVELOPMENT FOR TESTING ******************************************************
    // Kill Session
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    session_destroy();
***********************************************************************************************/ 
} else {
    echo "Redirected from homepage";
}
?>

<html>
    <head>
        <title>Results</title>
    </head>
    <body>
        <br>
        <a href="index.php">Home Page</a>
        <br><br>
        
        <?php
        if ($results_published == true) {
            echo "<p>";
        } else {
            echo "<p hidden>";
        }
        echo "Book me in: ", file_get_contents('results/0.txt'), "<br>";
        echo "Is my smart home secure enough: ", file_get_contents('results/1.txt'), "<br>";
        echo "Creating a virtual pen testing lab: ", file_get_contents('results/2.txt'), "<br>";
        echo "Voice as a password:", file_get_contents('results/3.txt'), "<br>";
        echo "Australian secure online voting system: ", file_get_contents('results/4.txt'), "<br>";
        echo "One-TimePad VPN: ", file_get_contents('results/5.txt'), "<br>";
        echo "Course Thermometer: ", file_get_contents('results/6.txt'), "<br>";
        echo "Careers: ", file_get_contents('results/7.txt'), "<br>";
        echo "Infrastructure as a service: ", file_get_contents('results/8.txt'), "<br>";
        echo "Excon: ", file_get_contents('results/9.txt'), "<br>";
        echo "Pupillometer iOS: ", file_get_contents('results/10.txt'), "<br>";
        echo "Pupillometer android: ", file_get_contents('results/11.txt'), "<br>";
        echo "Stratejos: ", file_get_contents('results/12.txt'), "<br>";
        echo "Property inspector: ", file_get_contents('results/13.txt'), "<br>";
        echo "RedFid: ", file_get_contents('results/14.txt'), "<br>";
        echo "ChatX: ", file_get_contents('results/15.txt'), "<br>";
        echo "Follow Me mail-redirection: ", file_get_contents('results/16.txt'), "<br>";
        echo "Bus tracker: ", file_get_contents('results/17.txt'), "<br>";
        echo "Independent Games: ", file_get_contents('results/18.txt'), "<br>";
        echo "ICE project: ", file_get_contents('results/19.txt'), "<br>";
        echo "Architectural assessment using VR: ", file_get_contents('results/20.txt'), "<br>";
        echo "Snobal project: ", file_get_contents('results/21.txt'), "<br>";
        echo "Capstone promotion material: ", file_get_contents('results/22.txt'), "<br>", "</p>";
        ?>
    </body>
</html>