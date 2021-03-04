<?php
    session_start();
    if(!isset($_SESSION['fullname'])){
        header('location: http://localhost/4b/pertemuan6/login.php');
    }
?>