<?php
    if (isset($_POST['donald'])) {
        shell_exec('/home/ubuntu/vote.sh D');
    }
    elseif(isset($_POST['hillary'])) {
        shell_exec('/home/ubuntu/vote.sh H');
    }
?>