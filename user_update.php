<?php
    session_start();
    include "engine.php";
    $User_ID = $_SESSION['userid']; // Retreiweing User Id;
    $FirstName = $_POST['First_Name']; // Retreiweing Updated First_Name;
    $SecondName = $_POST['Second_Name']; //Retreiweing Updated Second_Name;
    $Email = $_POST['Email']; // Retreiweing Updated email address;
    $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
    $statement = $pdo -> query("UPDATE `users` SET `firstname`='$FirstName',`secondname`='$SecondName', `secondname`='$SecondName', `email`='$Email'  WHERE Id='$User_ID'"); // Updating;
    header('Location:profile.php');
?>