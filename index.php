<?php

include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
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
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
       <h2><center>
Secure Voting System
</center></h2>

<div id="nav">
    <div id="nav_wrapper">
        <ul>
            <!--<li><a href="#">Enrol to vote</a>
              <ul>
                    <li><a href="#" onclick="document.getElementById('id01').style.display='block'">Register to vote</a>
                    </li>
                    <li><a href="#">Change Address</a>
                    </li>
                    <li><a href="#">Change name</a>
                    </li>
				    <li><a href="#">Check enrolment</a>
                    </li>
                </ul>
            </li>-->
            
            <li>
            <a href="#" onclick="document.getElementById('id02').style.display='block'">Login</a>
            </li>
            <!--<li> <a href="#">Electoral Divisions</a>

                <ul>
                    <li><a href="electorate.html">Find my electoral division</a>
                    </li>
                    <li><a href="divisions.html">Current divisions</a>
                    </li>
                </ul>
            </li>-->
            
                <!--<li> <a href="#">Elections</a>

                <ul>
                    <li><a href="elections.html">Federal elections</a>
                    </li>
                    <li><a href="by-elections.html">By-elections</a>
                    </li>
                    <li><a href="supplementery.html">Supplementary elections</a>
                    </li>
                    <li><a href="referendum.html">Referendums and plebencies</a>
                    </li>
                </ul>
            </li>
            <li> <a href="Education.html">Education</a>
            </li>-->
        </ul>
    </div>
    <!-- Nav wrapper end -->
</div>
<!-- Nav end -->
       <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        
  <div id="id02" class="modal">
  
  <form class="modal-content animate" action="includes/process_login.php" method="post" name="login_form">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close2" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label><b>Username:</b></label>
      <input type="text" placeholder="Enter Username" name="email" required>

      <label><b>Password:</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>
        
      <input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" /> 
      <!--onclick="location.href='vote.php'"-->
      <!-- onclick="location.href='vote.html'" -->
      <input type="checkbox" checked="checked"> Remember me
      <p>If you don't have a login, please <a href="register.php">register</a></p>
      <p>If you are done, please <a href="includes/logout.php">log out</a>.</p>
      <p>You are currently logged <?php echo $logged ?>.</p>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn1">Cancel</button>
      <span class="psw">Forgot <a href="#" onclick="document.getElementById('id03').style.display='block' , document.getElementById('id02').style.display='none'">password?</a></span>
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
        
       
    </body>
</html>
