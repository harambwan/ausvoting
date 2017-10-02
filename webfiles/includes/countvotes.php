<?php
include 'functions.php';
include_once 'db_connect.php';
sec_session_start();

if ($_SESSION['user_id'] == 23) {
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
    
    $old_path = getcwd();
    chdir('/home/ubuntu/corescripts/tmpcountvotes/');
    mkdir('data');
    
    $addresses = multichain('getaddresses');
    
    foreach ($addresses['result'] as $a) {
        file_put_contents('addresses.txt', $a.PHP_EOL, FILE_APPEND);
        mkdir('data/'.$a);
        $items = multichain('liststreampublisheritems', 'voting', $a);
        foreach ($items['result'] as $i) {
            if ($i['key'] == 'vote') {
                file_put_contents('data/'.$a.'/vote.txt.enc.hex', $i['data']);
            } elseif ($i['key'] == 'key') {
                file_put_contents('data/'.$a.'/key.bin.enc.hex', $i['data']);
            }
        }
    }
    
    

    chdir('..');
    shell_exec('sudo ./countvotes.sh');
    chdir($old_path);
    publishresults('true');
    header("Location: ../results.php");    
    
} else {
    header("Location: ../protected_page.php");
}
?>