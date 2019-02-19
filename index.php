<?php
    session_start(); // Start seesion;
    include 'engine.php';
    $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
    $statement = $pdo -> query("SELECT * FROM posts"); // Selection all posts;
    $posts = $statement -> fetchall(PDO::FETCH_ASSOC); // Transforming posts to array;
    $User_ID = $_SESSION['userid'];
    
    //var_dump($posts); // Diagnostick line; For running remove // before Var_dump();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="photos/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="photos/favicon-16x16.png">
        <link rel="manifest" href="photos/site.webmanifest">
        <title>PHP Blog</title>
    </head>
    <body>
        <div class="container">
            <div class="bg-dark p-4">
                <div class=row>
                    <div class="col-sm" style="font-family: 'Audiowide', cursive; color:white">
                        <h2>PHP Blog<h2>
                    </div>
                    <div class="col-sm">
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
                                    echo '<li class="nav-item"><li class="nav-item"><a class="nav-link" href="addpost.php">Create Post</a></li><a class="nav-link" href="profile.php">Profile</a></li><li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';    
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
            <div class="row">
                <?php foreach ($posts as $post):?>
                    <div class="col-md-4">
                        <br>
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo $PathFiles.$post['post_image']?>" class="card-img-top" alt="Code PHP" height="170px">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $post["post_name"]?></h5>
                                <p class="card-text"><?php echo $post["post_description"]?></p>
                                <button type="button" class="btn btn-primary btn-sm" onclick="document.location='readpost.php?Id=<?php echo $post['post_id']?>'">Read</button>
                                <?
                                    $PostId = $post['post_id'];
                                    $AuthorId = $post['author_id'];
                                    if($AuthorId == $User_ID){
                                        $InsertId = '\'deletepost.php?Id='.$PostId.'';
                                        $EditpostById = '\'editpost.php?Id='.$PostId.'';

                                        $ButEdit = '<button type="button" class="btn btn-primary btn-sm"onclick="document.location='.$EditpostById.'\'">Edit</button>&nbsp;';
                                        $ButAdd = '<a href="addpost.php" class="btn btn-primary btn-sm">New</a>&nbsp;';
                                        $ButDel = '<button type="button" class="btn btn-dark btn-sm" onclick="document.location='.$InsertId.'\'">Delete</button>';
                                        echo $ButEdit.$ButAdd.$ButDel;
                                    }
                                ?>
                            </div>
                        </div>
                    </div> 
                <?php endforeach?>
            </div>
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