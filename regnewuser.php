<?php
    include 'engine.php';

    /* New User Registration */
    if(isset($_POST['FirstName']) && isset($_POST['SecondName']) && isset($_POST['Login']) && isset($_POST['Email']) && isset($_POST['Password'])){
        $FirstName = $_POST['FirstName'];
        $SecondName = $_POST['SecondName'];
        $Login = $_POST['Login'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $RePassword = $_POST['RePassword'];

        if($Password == $RePassword){
            $Password_MD5 = MD5($Password); // Convert Password to MD5 hash;
            $pdo = new PDO($MySQL_Path, $DataBaseLogin, $DataBasePass); // Connection to Data Base;
            $send_data = $pdo -> query("INSERT INTO users (Id, firstname, secondname, login, email, password, userphoto) VALUES (NULL, '$FirstName', '$SecondName', '$Login', '$Email', '$Password_MD5', '')");
            echo "Congratulations, you have registered";
        }
        else{
            var_dump($_POST);
            echo "Wrong Password, please retry";
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
        
    </div>
    <br>
    <div class="container">
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Create Account</h4>
                <form action="regnewuser.php" method="post">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                            <input name="FirstName" class="form-control" placeholder="First Name" type="text" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                            <input name="SecondName" class="form-control" placeholder="Second Name" type="text" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                            <input name="Login" class="form-control" placeholder="Login" type="text" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="Email" class="form-control" placeholder="Email address" type="email" required>
                    </div>  
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="Password" class="form-control" placeholder="Create password" type="password" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input name="RePassword" class="form-control" placeholder="Repeat password" type="password" required>
                    </div>                                      
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>      
                    <p class="text-center">Are you registered? <a href="login.php">Log In</a> </p>                                                                 
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