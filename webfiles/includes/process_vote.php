<?php
//error reporting, disable later
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';
include_once 'db_connect.php';
sec_session_start();

if (isset($_POST['candidate']) && $_POST['candidate'] >= 0 && $_POST['candidate'] <= 21) {
    $candidate = $_POST['candidate'];

    //Check database to make sure user has not voted yet
    $query = "SELECT voted FROM members WHERE id = ".$_SESSION['user_id'];
    $voted_query = mysqli_query($mysqli, $query);
    $voted_array = mysqli_fetch_assoc($voted_query);
    $voted = $voted_array['voted'];

    if ($voted == NULL) {
/*        $old_path = getcwd();
        chdir('/home/ubuntu/corescripts/');
        $cmd = 'sudo ./vote.sh '.$candidate.' 2>&1; echo $?';
        $output = shell_exec($cmd);
        chdir($old_path);
        //Debugging
        echo 'OUTPUT: ', $output;
*/
    echo 'ATTEMPTED TO VOTE FOR: ', $candidate;

    //Insert into database that user has voted...

    $_SESSION['voted'] = 'YES';
    //Redirect to results page
    header("Location: ../results.php");
    } elseif ($voted == 1) {
        $_SESSION['voted'] = 'NO';
        header("Location: ../results.php");
    } else {
        header("Location: ../error.php?err=Voted data corrupt");
    }
} else {
    //Display warning message
    print 'PLEASE SELECT A CANDIDATE FROM THE LIST';
}

?>