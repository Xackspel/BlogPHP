<?php
    session_start();
    $User_ID = $_SESSION['userid'];
    include 'engine.php';
    $OriginalPhotoName = basename($_FILES['user_photo']['name']); // Take full filename with extension; 
    move_uploaded_file($_FILES['user_photo']['tmp_name'], $PathFiles.$OriginalPhotoName); // Move file to photos folder;
    $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
    $statement = $pdo -> query("UPDATE `users` SET `userphoto`='$OriginalPhotoName' WHERE Id='$User_ID'"); // Updating;
    header('Location:profile.php');
    //var_dump($_FILES);
?>