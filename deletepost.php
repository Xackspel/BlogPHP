<?php
    session_start();
    include 'engine.php';
    $PostId = $_GET['Id']; // Receive post ID;
    $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
    $statement = $pdo -> query("DELETE FROM `posts` WHERE post_id='$PostId'"); // Deleting selected post from data base;
    //header('Location:index.php');
    var_dump($PostId);
?>