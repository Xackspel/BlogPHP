<?php
    session_start();
    $PostId = $_GET['Id'];
    $pdo = new PDO("mysql:host=localhost;dbname=secondmodule","root",""); // Connection to Data Base.
    $CurrentPost = $pdo -> query("SELECT `post_id`, `post_name`, `post_description`, `post_text`, `author_id`, `post_image` FROM `posts` WHERE post_id='$PostId'"); // query to database by Post Id
    $posts = $CurrentPost -> fetchAll(PDO::FETCH_ASSOC); 
    //var_dump();
    $NamePost = $posts[0]['post_name']; // Variable NamePost received Post Name from array
    $DescriptonPost = $posts[0]['post_description']; // Variable TextPost received Text Post from array
    $TextPost = $posts[0]['post_text'];
    $PostImage = $posts[0]['post_image'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>PHP Blog</title>
</head>
<body>
    <div class="container">
        <div class="bg-dark p-4">
            <div class=row>
                 <div class="col-sm">
                    <img src="http://marlindev.ru/img/new/logo.svg" alt="Marlin dev school" title="Marlin dev school">
                </div>
                <div class="col-sm">
                    <font color="white"><h2 class="text-right" color="white">Aleksey Zhuk [ 1 ]</h2></font>
                </div>
            </div>
            <nav class="navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="index.php">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
        <br>
        <h1 class="text-center">Module #2. Home Task.</h1>
        <br>
        <!--Post Card-->
        <div class="card text-center">
            <div class="card-header">
                <img src="<?php echo $PostImage ?>" class="card-img-top" alt="Code PHP">
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $NamePost ?></h5>
                <p class="card-text"><?php echo $DescriptonPost.'<br>'.$TextPost?></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>

    <br>
    <div class="container">
        <div class="row">
            
        </div>
    </div>

    <!--Bootstrap JS section-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

<!--
    Attaching new user INSERT INTO `users` (`Id`, `name`, `secondname`, `login`, `password`, `userphoto`, `date_reg`) VALUES (NULL, 'Aleksey', 'Zhuk', 'Aleksey', MD5('f75'), '', UNIX_TIMESTAMP());
-->
</html>