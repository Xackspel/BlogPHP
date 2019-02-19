<?
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
            header('Location:profile.php');
        }
        else{
            var_dump($_POST);
            echo "Wrong Password, please retry";
        }
    }

?>