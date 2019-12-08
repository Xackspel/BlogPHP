<?php
    session_start();
    include 'engine.php';

    /* Post details */
    /* Start */
    $post_name = $_POST['Post_Name']; // Take post name and assign to variable;
    $post_description = $_POST['Post_Description']; // Take post description and assign to variable;
    $post_text = $_POST['Post_Text']; // Take post text and assign to variable;
    $author_id = $_SESSION['userid']; // Take user id and assign to variable;
    $post_image = $_FILES['post_photo']['name'];
    /* Post details */
    /* End */
    
    /* Move post image to local storage */
    /* Start */
    if(!empty($post_image)){
        $OriginalPhotoName = basename($_FILES['post_photo']['name']); // Take full filename with extension; 
        move_uploaded_file($_FILES['post_photo']['tmp_name'], $PathFiles.$OriginalPhotoName); // Move file to photos folder;    
    }else{
        $post_image = $DefaultPhotoName; // if owner leave default photo, put dafault photo name;
    }
    /* Move post image to local storage */
    /* End */

    $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
    $send_data = $pdo -> query("INSERT INTO posts (post_id, post_name, post_description, post_text, author_id, post_image) VALUES (NULL, '$post_name', '$post_description', '$post_text', '$author_id', '$post_image')");
    header('Location:index.php'); // Once all details been sent, move user to main page;
?>