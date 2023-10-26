<?php
    session_start();
    unset($_SESSION["userid"]);
    
    setcookie("uid", '', time()-1000000);
    header("Location: home.php"); 
?>