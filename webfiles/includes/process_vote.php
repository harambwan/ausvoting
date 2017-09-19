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

    if ($voted == NULL || $voted == 0) {
        //Initialize JsonRPC Client
        require_once('btcclient.php');
        $client = new Bitcoin('multichainrpc','Eo8Kycn2Sg9yPdqJzzca6DoeDNH7zJQ1LW9ZvrJJWc5C','localhost','9578');
        
        //Get new multichain address
        $address = $client->getnewaddress();
        
        //Execute bash script
        $old_path = getcwd();
        chdir('/home/ubuntu/corescripts/');
        $cmd = 'sudo ./vote.sh '.$candidate.' '.$address.' 2>&1; echo $?';
        $output = shell_exec($cmd);       
/*ENABLED DURING DEVELOPMENT FOR TESTING* *****************************************************/
        $_SESSION['output'] = $output;
        $_SESSION['candidate'] = $candidate;
/**********************************************************************************************/

        
        //Store encrypted data
        $vote = file_get_contents('/tmp/'.$address.'/vote.txt.enc.hex');
        $key = file_get_contents('/tmp/'.$address.'/key.bin.enc.hex');
        
        //Publish data to blockchain
        $client->grant($address, "send");
        $client->publishfrom($address, "voting", "vote", $vote);
        $client->publishfrom($address, "voting", "key", $key);
        $client->revoke($address, "send");

        shell_exec('./cleanup.sh');
        chdir($old_path);
        
/*DISABLED DURING DEVELOPMENT FOR TESTING ******************************************************
        //Insert into database that user has voted
        $query = $mysqli->prepare("UPDATE members SET voted = 1 WHERE id = ?");
        $query->bind_param('i', $_SESSION['user_id']);
        $query->execute();
***********************************************************************************************/
        $_SESSION['voted'] = 'YES';
        //Redirect to results page
        header("Location: ../results.php");
    } elseif ($voted == 1) {
        $_SESSION['voted'] = 'NO';
        header("Location: ../results.php");
    } else {
        header("Location: ../error.php?err=Voted database value corrupt. Must be NULL, 0, or 1");
    }
} else {
    //Display warning message
    print 'PLEASE SELECT A CANDIDATE FROM THE LIST';
}

?>