<?
    session_start();
    include 'engine.php';

    /* Post details */
    /* Start */
    $post_id = $_SESSION['postid']; // Take post id and assign to varriable;
    $author_id = $_SESSION['userid']; // Take user id and assign to varriable;
    $post_name = $_POST['Post_Name']; // Take post name and assign to varriable;
    $post_description = $_POST['Post_Description']; // Take post description and assign to varriable;
    $post_text = $_POST['Post_Text']; // Take post text and assign to varriable;
    $post_image = $_FILES['post_photo']['name']; // Take photo name and assign to varriable;
    //var_dump($_SESSION, $_POST, $_FILES);
    /* Post details */
    /* End */

    /* Move post image to local storage if user attached new one */
    /* Start */
   if(isset($post_image)){
       $OriginalPhotoName = basename($_FILES['post_photo']['name']); // Take full filename with extension; 
       move_uploaded_file($_FILES['post_photo']['tmp_name'], $PathFiles.$OriginalPhotoName); // Move file to photos folder;    
   }else{
       $post_image = $DefaultPhotoName; // if owner leave default photo, put dafault photo name;
   }
    /* Move post image to local storage */
    /* End */
    
   $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
   $send_data = $pdo -> query("UPDATE `posts` SET `post_name`='$post_name', `post_description`='$post_description', `post_text`='$post_text', `author_id`='$author_id', `post_image`='$post_image' WHERE post_id='$post_id'"); // Updating post;
   unset($_SESSION['postid']);
   header('Location:index.php'); // Once all details been sent, move user to main page;
?>