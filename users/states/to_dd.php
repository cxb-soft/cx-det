<?php

    session_start();
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $classname = $_SESSION['classname'];
        $types = $_POST['types'];
        require("../functions.php");
        $user = new user($username);
        echo(json_encode( $user -> to_dd($types,$classname) ));

    }

?>