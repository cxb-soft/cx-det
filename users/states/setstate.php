<?php

    session_start();
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $state = $_POST['state'];
        require_once("../functions.php");
        $user = new user($username);
        if($state == "alloff"){
            $classname = $_SESSION['classname'];
            $result = $user -> set_state_all_off($password,$classname);
            echo(json_encode($result));
            exit();
        }
        
        $result = $user -> set_state($password,$state);
        echo(json_encode($result));
    }

?>