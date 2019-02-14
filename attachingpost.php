<?php
    session_start();
    include 'engine.php';
    $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
    $send_data = $pdo -> query("INSERT INTO posts (Id, post_name, post_description, post_text, author_id, post_image) VALUES (NULL, '$FirstName', '$SecondName', '$Login', '$Email', '$Password_MD5', '')");

    var_dump($_POST, $_FILES);
?>