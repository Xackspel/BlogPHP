<?php
    session_start();

    /*$pdo = new PDO("mysql:host=localhost;dbname=secondmodule","root","");
    $statement = $pdo -> query("SELECT * FROM users");
    $users = $statement -> fetchall(PDO::FETCH_ASSOC);*/
    var_dump($_POST);
    if (isset($_POST['submit'])){
        $FirstName = $_POST['FirstName'];
        $SecondName = $_POST['SecondName'];
        $Login = $_POST['Login'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $RePassword = $_POST['RePassword'];
        var_dump($_POST);
        if($Password == $RePassword){
            $Password = md5($Password);
            $pdo = new PDO("mysql:host=localhost;dbname=secondmodule","root","");
            $statement = $pdo -> query("INSERT INTO users (firstname, secondname, login, email, password) VALUES ('$FirstName', '$SecondName', '$Login', '$Email', '$Password')");
        }
        else{
            echo "Wrong Password, please try again.";
        }
    }
    else {
        echo "Something went wrong";
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
                    <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                 
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
    Attaching new user INSERT INTO `users` (`Id`, `name`, `secondname`, `login`, `password`, `userphoto`, `date_reg`) VALUES (NULL, 'Aleksey', 'Zhuk', 'Aleksey', MD5('f75'), '', UNIX_TIMESTAMP());
-->
</html>