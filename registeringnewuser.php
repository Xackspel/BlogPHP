<?
    /* New User Registration */
    session_start();
    include 'engine.php';
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
            $select_user = $pdo -> query("SELECT * FROM users WHERE login='$Login'"); // Select user by Id;
            $received_user = $select_user -> fetch(PDO::FETCH_ASSOC); // Transforming user information to array;
            $_SESSION['userid'] = $received_user['Id'];
            $_SESSION['userlogin'] = $received_user['login'];
            header('Location:profile.php');
        }
        else{
            echo "Wrong Password, please retry";
        }
    }

?>