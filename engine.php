<?php
    /* This file created for creation and declaration varriables and functions */

    /* Data Base Configuration */
    $MySQL_Path = "mysql:host=localhost;dbname=secondmodule";
    $DataBaseLogin = "root";
    $DataBasePass ="";

    /* Path to storage where you can save all photos */
    $PathFiles = "photos/";
    $DefaultPhotoName = "reinis-birznieks-1355047-unsplash.jpg";
    $DefaultPhoto = $PathFiles.$DefaultPhotoName;

    /* Setup default user photo */
    $Avatar = "default_user_photo.jpg";
    $DefaultUserPhoto = $PathFiles.$Avatar;

?>