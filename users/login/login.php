<?php

    require_once("../functions.php");
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new user($username);
        $login = $user -> login($password);
        if($login['code'] == 200){
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
        }
        echo(json_encode($login));
    }

?>