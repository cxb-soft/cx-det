<?php

    session_start();
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    require("../functions.php");
    $user = new user($username);
    $user -> set_state($password,"offline");
    session_destroy();

?>