<?php
    session_start();
    if(isset($_POST['Login']) && isset($_POST['Password'])){
        $Login = $_POST['Login'];
        $Password = $_POST['Password'];
        $Password_MD5 = MD5($Password);
        $pdo = new PDO("mysql:host=localhost;dbname=secondmodule","root","");// Connetction to Data Base
        $select_user = $pdo -> query("SELECT * FROM users WHERE login='$Login' and password='$Password_MD5'");
        $received_user = $select_user -> fetchAll(PDO::FETCH_ASSOC);
        //$received_user =
        if(empty($received_user)){
            echo "Wrong Login or Password, please try again!";
        }
        else{
            $_SESSION['userid'] = $received_user[0]['Id'];
            $_SESSION['userlogin'] = $received_user[0]['login'];
            echo "Congratulations, you have been authorized!!!";
            //header('Location:index.php');
        }
        //var_dump($received_user, $_SESSION);
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