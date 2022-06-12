<?php
    /// delete the session variable
    /// forward to sign in page

    session_start();

    unset($_SESSION['useremail']);
    session_destroy();


    echo "<script>window.location.assign('loginpage.php');</script>";
?>