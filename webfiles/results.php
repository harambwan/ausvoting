<?php
sec_session_start();
?>

If $_SESSION['voted'] == TRUE:
<br>
1) Thanks for voting... Results will be displayed here once voting period has ended!
<br>
If $_SESSION['voted'] == FALSE:
<br>
2) You have already voted!
<br>
Click here to <a href="includes/logout.php">Logout</a>