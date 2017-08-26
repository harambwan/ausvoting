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
</head>


<body>
<?php

// SELECT Candidates.Name ,sum(Num_Vote) FROM Votes, Candidates WHERE Can_ID = 1 and Candidates.ID = 1



include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();


/* 


*/


$servername = "localhost";
$username = "root";
$password = "S#cuReP@s5w0rd";
$database = "secure_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error); }

		$resultA = mysqli_query($conn,"SELECT id,Name,Party FROM Candidates" );
		$resultB = mysqli_query($conn,"SELECT DISTINCT Votes.Can_ID, sum(Num_Vote) FROM Votes GROUP by Can_ID ORDER by sum(Num_Vote) DESC" );
	
echo "<table border='3'> 
<tr>
<th>id</th>
<th>Name</th>
<th>Party</th>
</tr>";


while($row = mysqli_fetch_array($resultA)) {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['Name'] . "</td>";
  echo "<td>" . $row['Party'] . "</td>";
  echo "</tr>";
}	
	
	
	
	
	
	
echo " <table border='3'> 
<tr>
<th>Candidate ID</th>
<th>Number of Votes</th>
</tr>";


while($row = mysqli_fetch_array($resultB)) {
  echo "<tr>";
  echo "<td>" . $row['Can_ID'] . "</td>";
  echo "<td>" . $row['sum(Num_Vote)'] . "</td>";


  echo "</tr>";
}

//$result = mysqli_query($conn,"SELECT DISTINCT Votes.Can_ID, sum(Num_Vote) FROM Votes GROUP by Can_ID ORDER by sum(Num_Vote) DESC" );







mysqli_close($conn);	
?>

</body>

</html>