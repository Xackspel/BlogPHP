<?php
    session_start(); // Start seesion;

    $pdo = new PDO("mysql:host=localhost;dbname=secondmodule","root",""); // Connection to Data Base;
    $statement = $pdo -> query("SELECT * FROM posts"); // Selection all posts;
    $posts = $statement -> fetchall(PDO::FETCH_ASSOC); // Transforming posts to array;
    //var_dump($_SESSION); // Diagnostick line; For running remove // before Var_dump();
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
                        <p class="text-white">
                            <h2 class="text-right" style="color:white">
                            <!-- Showing Congratulations or User Name if he is authorized -->
                            <!-- Start -->
                                <?php
                                    if (!isset($_SESSION['userlogin'])){
                                        echo "Wellcome!";
                                    }
                                    else{
                                        echo $_SESSION['userlogin'];    
                                    }
                                ?>
                            <!-- End -->
                            </h2>
                        </p>
                    </div>
                </div>
                <nav class="navbar navbar-dark bg-dark">
                    <a class="navbar-brand" href="index.php">Home</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <!--Interactive menu: Hide some links if user are not authoried-->
                            <!-- Start -->
                            <?php
                                if (!isset($_SESSION['userlogin'])){
                                    echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                                }
                                else{
                                    echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li><li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';    
                                }
                            ?>
                            <!-- End -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="container">
            <br>
            <h1 class="text-center">Module #2. Home Task.</h1>
            <br>
            <!-- Showing all posts as minipost -->
            <!-- Start -->
            <?php foreach ($posts as $post):?>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $post['post_image']?>" class="card-img-top" alt="Code PHP">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post["post_name"]?></h5>
                        <p class="card-text"><?php echo $post["post_description"]?></p>
                        <button type="button" class="btn btn-dark" onclick="document.location='readpost.php?Id=<?php echo $post['post_id']?>'">Read</button>
                    </div>
                </div>
            <?php endforeach?>
            <!-- End -->
        </div>
        <br>
        <!-- Bootstrap JS section -->
        <!-- Start -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <!-- End -->
    </body>
</html>