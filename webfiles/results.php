<?php
sec_session_start();

If $_SESSION['voted'] == TRUE {
    echo "Thanks for voting... Results will be displayed here once voting period has ended!"
    
    include_once 'includes/functions.php';
    // Unset all session values 
    $_SESSION = array();
    // get session parameters 
    $params = session_get_cookie_params();
    // Delete the actual cookie. 
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    // Destroy session 
    session_destroy();
    exit();
}

    
If $_SESSION['voted'] == FALSE {
    echo "You have already voted!"
    
    include_once 'includes/functions.php'
    // Unset all session values 
    $_SESSION = array();
    // get session parameters 
    $params = session_get_cookie_params();
    // Delete the actual cookie. 
    setcookie(session_name(),'', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    // Destroy session 
    session_destroy();
    exit();
}

<html>
    <head>
        <title>Results</title>
    </head>
    <body>
        <br>
        <a href="index.php">Home Page</a>
        <br>
        Book me in:
        <iframe src="results/0.txt"></iframe>
        <br>
        Is my smart home secure enough:
        <iframe src="results/1.txt"></iframe>
        <br>
        Creating a virtual pen testing lab:
        <iframe src="results/2.txt"></iframe>
        <br>
        Voice as a password:
        <iframe src="results/3.txt"></iframe>
        <br>
        Australian secure online voting system:
        <iframe src="results/4.txt"></iframe>
        <br>
        One-TimePad VPN:
        <iframe src="results/5.txt"></iframe>
        <br>
        Course Thermometer:
        <iframe src="results/6.txt"></iframe>
        <br>
        Careers:
        <iframe src="results/7.txt"></iframe>
        <br>
        Infrastructure as a service:
        <iframe src="results/8.txt"></iframe>
        <br>
        Excon:
        <iframe src="results/9.txt"></iframe>
        <br>
        Pupillometer iOS:
        <iframe src="results/10.txt"></iframe>
        <br>
        Pupillometer Android:
        <iframe src="results/11.txt"></iframe>
        <br>
        Stratejos:
        <iframe src="results/12.txt"></iframe>
        <br>
        Property Inspector:
        <iframe src="results/13.txt"></iframe>
        <br>
        RedFid:
        <iframe src="results/14.txt"></iframe>
        <br>
        ChatX:
        <iframe src="results/15.txt"></iframe>
        <br>
        Follow Me mail-redirection:
        <iframe src="results/16.txt"></iframe>
        <br>
        Bus tracker:
        <iframe src="results/17.txt"></iframe>
        <br>
        Independent Games:
        <iframe src="results/18.txt"></iframe>
        <br>
        ICE project:
        <iframe src="results/19.txt"></iframe>
        <br>
        Architectural assessment using VR:
        <iframe src="results/20.txt"></iframe>
        <br>
        Snobal project:
        <iframe src="results/21.txt"></iframe>
        <br>
        Capstone promotion material:
        <iframe src="results/22.txt"></iframe>
    </body>
</html>
?>
Click here to <a href="includes/logout.php">Logout</a>