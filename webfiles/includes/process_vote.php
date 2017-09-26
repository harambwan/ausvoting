<?php
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
        //JSON RPC connection settings
        $config=array( 
        'default' => array(   
            'name' => 'ausvoting',
            'rpchost' => '127.0.0.1',
            'rpcport' => '9578',
            'rpcuser' => 'multichainrpc',
            'rpcpassword' => 'Eo8Kycn2Sg9yPdqJzzca6DoeDNH7zJQ1LW9ZvrJJWc5C'
            )
        );
        set_multichain_chain($config['default']);
        
        //Get new multichain address
        $address = multichain('getnewaddress');
        $address = $address['result'];
        
        //Execute bash script
        $old_path = getcwd();
        chdir('/home/ubuntu/corescripts/');
        $cmd = 'sudo ./vote.sh '.$candidate.' '.$address.' 2>&1; echo $?';
        shell_exec($cmd);    
        
        //Retrieve encrypted hex data
        $vote = trim(file_get_contents('/tmp/'.$address.'/vote.txt.enc.hex'));
        $key = trim(file_get_contents('/tmp/'.$address.'/key.bin.enc.hex'));
        
        //Give address send permission
        multichain('grant', $address, 'send');
        //Publish vote & key data
        $voteresponse=multichain('publishfrom', $address, 'voting', 'vote', $vote);
        $keyresponse=multichain('publishfrom', $address, 'voting', 'key', $key);
        //Revoke send permission
        multichain('revoke', $address, 'send');
       
        //Cleanup temporary files
        shell_exec('sudo ./cleanup.sh');
        chdir($old_path);
        
        //Insert into database that user has voted
        $query = $mysqli->prepare("UPDATE members SET voted = 1 WHERE id = ?");
        $query->bind_param('i', $_SESSION['user_id']);
        $query->execute();

        $_SESSION['voted'] = 'YES';
        //Redirect to results page
        header("Location: ../results.php");
        
    } elseif ($voted == 1) {
        $_SESSION['voted'] = 'NO';
        header("Location: ../results.php");
    } else {
        header("Location: ../error.php?err=Users 'voted' database value corrupt. Must be NULL, 0, or 1");
    }
} else {
    //Display warning message
    print 'PLEASE SELECT A CANDIDATE FROM THE LIST';
}

?>