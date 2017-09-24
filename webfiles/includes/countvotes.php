<?php
/*ENABLED DURING DEVELOPMENT FOR TESTING* *****************************************************/
error_reporting(E_ALL);
ini_set('display_errors', 1);
/**********************************************************************************************/

include 'functions.php';
include_once 'db_connect.php';
sec_session_start();

if ($_SESSION['user_id'] == 23) :

    //Initialize JsonRPC Client
    require_once('btcclient.php');
    $client = new Bitcoin('multichainrpc','Eo8Kycn2Sg9yPdqJzzca6DoeDNH7zJQ1LW9ZvrJJWc5C','localhost','9578');

    $old_path = getcwd();
    chdir('/home/ubuntu/corescripts/tmpcountvotes/');
    mkdir('data');
    $addr = $client->getaddresses();
    file_put_contents('addresses.txt', implode(PHP_EOL, $addr));
    $client->subscribe("voting");

    foreach ($addr as $address) {
        mkdir('data/'.$address);
        $items = $client->liststreampublisheritems('voting', $address);
        foreach ($items as $i) {
            if ($i['key'] == 'vote') {
                file_put_contents('data/'.$address.'/vote.txt.enc.hex', $i['data']);
            } elseif ($i['key'] == 'key') {
                file_put_contents('data/'.$address.'/key.bin.enc.hex', $i['data']);
            }
        }
    }
    $client->unsubscribe("voting");
    chdir('..');
    shell_exec('sudo ./countvotes.sh');
    chdir($old_path);



endif; 
?>