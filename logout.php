<?php
    /* User Log Out */
    session_start();
    session_destroy();
    header('Location:index.php');
    exit;
?>