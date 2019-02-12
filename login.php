<?php
    session_start();
    include 'engine.php';

    if(isset($_POST['Login']) && isset($_POST['Password'])){
        $Login = $_POST['Login'];
        $Password = $_POST['Password'];
        $Password_MD5 = MD5($Password);
        $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
        $select_user = $pdo -> query("SELECT * FROM users WHERE login='$Login' and password='$Password_MD5'");
        $received_user = $select_user -> fetchAll(PDO::FETCH_ASSOC);
        if(empty($received_user)){
            echo "Wrong Login or Password, please try again!";
        }
        else{
            $_SESSION['userid'] = $received_user[0]['Id'];
            $_SESSION['userlogin'] = $received_user[0]['login'];
            //echo 'Congratulations, you have been authorized!!!';
            header('Location:index.php');
        }
    }
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
        
    </div>
    <br>
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Log In</h4>
                <form action="login.php" method="post">
                    
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                            <input name="Login" class="form-control" placeholder="Login" type="text" required>
                    </div>
                      
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="Password" class="form-control" placeholder="Password" type="password" required>
                    </div>
                                       
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>      
                    <p class="text-center">Have an account? <a href="regnewuser.php">Register</a> </p>                                                                 
                </form>
            </article>
        </div>
        <!-- card.// -->
    </div> 
    <!--container end.//-->

    <!--Bootstrap JS section-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

<!--
    INSERT INTO `users` (`Id`, `firstname`, `secondname`, `login`, `email`, `password`, `userphoto`) VALUES (NULL, 'Dimka', 'Zhuk', 'Dima', 'dima@mail.com', 'f75', '');
-->
</html>