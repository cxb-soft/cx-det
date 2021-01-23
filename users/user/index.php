<?php

    session_start();
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        require_once("../functions.php");
        $user = new user($username);
        $login = $user -> login($password);
        
        $logincode = $login['code'];
        if($logincode == 200){
            $detail = $login['detail'];
            
            $per = $detail['per'];
            $name = $detail['name'];
            $classname = $detail['class'];
            $_SESSION['classname'] = $classname;
        }
        else{
            header("location:/");
        }
    }
    else{
        header("location:/");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo(WEBSITE) ?></title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
        integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
        crossorigin="anonymous"
    />

    <style>
        .content{
            padding-left:5%;
            padding-right:5%;
            padding-top:5%;
        }
    </style>
</head>
<body class="mdui-theme-layout-dark">
    <?php
    
        include("pages/index_app.php");
        if($per == "student"){
            include("pages/jiankong.php");
        }
        else{
            include("teacher_index.php");
        }
    
    ?>
    

</body>




</html>