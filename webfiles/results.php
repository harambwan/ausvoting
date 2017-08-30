<?php
include 'includes/functions.php';
sec_session_start();

If ($_SESSION['voted'] == TRUE) {
    echo "Thanks for voting... Results will be displayed here once voting period has ended!";
    echo "You have been logged out.";
    
    // Unset all session values 
    $_SESSION = array();
    // get session parameters 
    $params = session_get_cookie_params();
    // Delete the actual cookie. 
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    // Destroy session 
    session_destroy();
}

    
If ($_SESSION['voted'] == FALSE) {
    echo "You have already voted, or you are not logged in...";
    
    // Unset all session values 
    $_SESSION = array();
    // get session parameters 
    $params = session_get_cookie_params();
    // Delete the actual cookie. 
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    // Destroy session 
    session_destroy();
}
?>

<!--Add php if statement for if user is not logged in prompt them to login--->

<html>
    <head>
        <title>Results</title>
    </head>
    <body>
        <br>
        <a href="index.php">Home Page</a>
        <br><br>
        
        <?php
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
        echo "Capstone promotion material: ", file_get_contents('results/22.txt'), "<br>";
        ?>
    </body>
</html>