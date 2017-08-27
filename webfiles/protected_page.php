<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if ($_SESSION['timeout'] + 20 * 60 < time()) {
    //session times out, kill session etc...
}
else {
    //continue somehow
}

?>

<style>
	
	h2 {
		color : white;
		padding top: 2vh;
		padding left: 80%;
	}
	
	body {
    padding: 0;
    margin: 0;
    font-family: Arial;
    font-size: 17px;
    background-image: url("background copy.jpg");
		background-size: 100vw 100vh;
		background-repeat: no-repeat;
    background-position: right top;
    background-attachment: fixed;

}
#nav {
    background-color: #222;
}
#nav_wrapper {
    width: 100%;
    margin: 0 auto;
    text-align: left;
}
#nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    position: relative;
    min-width: 200px;
}
#nav ul li {
    display: inline-block;
}
#nav ul li:hover {
    background-color: #333;
}
#nav ul li a, visited {
    color: #CCC;
    display: block;
    padding: 15px;
    text-decoration: none;
}
#nav ul li:hover ul {
    display: block;
}
#nav ul ul {
    display: none;
    position: absolute;
    background-color: #333;
    border: 5px solid #222;
    border-top: 0;
    margin-left: -5px;
}
#nav ul ul li {
    display: block;
}
#nav ul ul li a:hover {
    color: #699;
}

	/*
	p {
    border-bottom: 6px solid red;
    background-color: lightgrey;
	}
	*/
	
	input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {float:left;width:50%}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    color: #000;
    font-size: 40px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn1 {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
	
	/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn,.signupbtn {float:left;width:50%}


/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

	/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    color: #000;
    font-size: 40px;
    font-weight: bold;
}
/* The Close Button (x) */
	
.close2 {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}
	
.close2:hover,
.close2:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
	
	
</style>


<?php
// Process form submission
if(isset($_POST['submit'])) {
    if(isset($_POST['candidate'])) {
        $candidate = $_POST['candidate'];
        if ($candidate >= 0) && ($candidate <= 22) {
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
        <meta charset="UTF-8">
        <title>Secure Login: Protected Page</title>
        <link rel="stylesheet" href="styles/main.css" />
    
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
        <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <div id="poll">
            <h1>Who do you want to vote for...</h1>
            <form method="post">
                <input type="radio" name="candidate" value="0"> Book me in 
                <br>
                <input type="radio" name="candidate" value="1"> Is my smarthome secure enough? 
                <br>
                <input type="radio" name="candidate" value="2"> Creating a virtual pentesting lab
                <br>
                <input type="radio" name="candidate" value="3"> Voice as a password
                <br>
                <input type="radio" name="candidate" value="4"> Secure online voting system
                <br>
                <input type="radio" name="candidate" value="5"> One-TimePad VPN
                <br>
                <input type="radio" name="candidate" value="6"> Course Thermometer
                <br>
                <input type="radio" name="candidate" value="7"> Careers
                <br>
                <input type="radio" name="candidate" value="8"> Infrastructure as a service management tool
                <input type="radio" name="candidate" value="9"> Excon
                <br>
                <input type="radio" name="candidate" value="10"> Pupilometer iOS
                <br>
                <input type="radio" name="candidate" value="11"> Pupilometer Android
                <br>
                <input type="radio" name="candidate" value="12"> Stratejos
                <br>
                <input type="radio" name="candidate" value="13"> Property Inspector
                <br>
                <input type="radio" name="candidate" value="14"> RedFid
                <br>
                <input type="radio" name="candidate" value="15"> ChatX
                <br>
                <input type="radio" name="candidate" value="16"> Follow Me Mail Redirection
                <br>
                <input type="radio" name="candidate" value="17"> Bus Tracker
                <br>
                <input type="radio" name="candidate" value="18"> Independent Games
                <br>
                <input type="radio" name="candidate" value="19"> ICE Project
                <br>
                <input type="radio" name="candidate" value="20"> Architectural Assessment using VR
                <br>
                <input type="radio" name="candidate" value="21"> Snobal Project
                <br>
                <input type="radio" name="candidate" value="22"> Capstone Promotional Material
				<br>
				<input type="submit" name="submit" value="Submit">Submit Vote</button>
            </form>
        </div>
            
            <p>Click here to <a href="includes/logout.php">Logout</a></p>
        
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>
