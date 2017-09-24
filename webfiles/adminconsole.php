<?php
include 'includes/functions.php';
sec_session_start();
?>


<html>
    <head>

    </head>
    
<?php if ($_SESSION['user_id'] == 23) : ?>
        <body>
            <h1>Welcome Admin</h1>
                <input type="button" onclick="location.href='includes/logout.php'" value="Logout">
            <h2>Voting Period:</h2>
            <h3>Start</h3>
                <p>Start time and date</p>
            <h3>Finish</h3>
                <p>Finish time and date</p>
            <h3>Manually count and publish results</h3>
                <input type="button" onclick="location.href='includes/countvotes.php'" value="Ship it!" width="100">
<?php else : ?>
    <p>You are not authorized to access this page.<br>Please <a href="index.php">login</a>.</p>
            
<?php endif; ?>
            
    </body>
</html>