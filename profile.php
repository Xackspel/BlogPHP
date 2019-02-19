<?php
    session_start(); // Session start;
    include 'engine.php';
    $User_ID = $_SESSION['userid'];
    $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
    $select_user = $pdo -> query("SELECT * FROM users WHERE Id='$User_ID'"); // Select user by Id;
    $received_user = $select_user -> fetch(PDO::FETCH_ASSOC); // Transforming user information to array;
    $FirstName = $received_user['firstname'];
    $SecondName = $received_user['secondname'];
    $Email = $received_user['email'];
    $UserPhoto = $received_user['userphoto'];
    //var_dump($_SESSION); // Diagnostic tool;
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
                <!-- Navigation -->
                <!-- Start -->
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
                                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';    
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
            <div class="row">
                <div class="col-md-auto">
                    <!--User Profile Section-->
                    <!-- Start -->
                    <?
                        if(!empty($UserPhoto)){
                            echo '<img src="'.$PathFiles.$UserPhoto.'" alt="..." class="img-thumbnail" width="200px">';
                        }
                        else{
                            echo '<img src="'.$DefaultUserPhoto.'" alt="..." class="img-thumbnail" width="200px">';
                        }
                    ?>

                    <form action="uploadingphoto.php" method="POST" enctype="multipart/form-data">
                        <input name="user_photo" type="file">
                        <br><br>
                        <button type="submit" class="btn btn-primary btn-sm">Update photo</button>
                    </form>
                </div>
                <div class="col-sm">    
                    <form action="user_update.php" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">First Name &nbsp;&nbsp;&nbsp;&nbsp;</span>
                            </div>
                            <input name="First_Name" class="form-control" value="<?php echo $FirstName?>" aria-label="Postname" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Second Name</span>
                            </div>
                            <input type="text" name="Second_Name" maxlength="255" class="form-control" value="<?php echo $SecondName?>" aria-label="Postname" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <!-- I apologies for this trash =) -->
                            </div>
                            <input name="Email" maxlength="255" class="form-control" aria-label="Postext" value="<?php echo $Email?>">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary btn-sm">Confirm Updating</button>
                        <button type="button" class="btn btn-dark btn-sm" onclick="document.location='index.php'">Cancel</button>
                    </form>
                </div>           
            </div>
        </div>
        <br>
        <!--Bootstrap JS section-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>