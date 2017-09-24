<?php

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if (isset($_POST['email'], $_POST['p'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['p']; // The hashed password.
    
    if (login($email, $password, $mysqli) == true) {
        // Login Success
        //Check database to make sure user has not voted yet
        $query = "SELECT voted FROM members WHERE id = ".$_SESSION['user_id'];
        $voted_query = mysqli_query($mysqli, $query);
        $voted_array = mysqli_fetch_assoc($voted_query);
        $voted = $voted_array['voted'];
        
        //If user is the administrator, redirect to admin page
        if ($_SESSION['user_id'] == 23) {
            header("Location: ../adminconsole.php");
            exit();
        } else {
            //If user has not voted, redirect to voting page
            if ($voted == NULL || $voted == 0) {
                header("Location: ../protected_page.php");
                exit();
            //If user has voted, redirect to results page
            } else {
                $_SESSION['voted'] = "NO";
                header("Location: ../results.php");
            }
        }
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');
        exit();
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: ../error.php?err=Could not process login');
    exit();
}