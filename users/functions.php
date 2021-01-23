<?php

    require("config.php");

    class user{
        function __construct($username = ""){
            require("config.php");
            $this -> webhook = DING_WEBHOOK;
            $this -> db = $db;
            $this -> username = $username;
        }
        function command($command){
            $db = $this -> db;
            return mysqli_query($db,$command);
        }
        function get_state($classname){
            $command = "select * from states where classname='$classname'";
            $result =  $this -> command($command);
            $result = mysqli_fetch_all($result);
            return $result;
        }
        function set_state_all_off($password,$classname){
            $login = $this -> login($password);
            $username = $this -> username;
            $timen = time();
            if($login['code'] == 200){
                $command = "update states set state='offline' where classname='$classname'";
                $this -> command($command);
                return array(
                    "code" => 400,
                    "msg" => "Success ."
                );

            }
            else{
                return $login;
            }
        }
        function request_by_curl($remote_server, $post_string) {  
            $ch = curl_init();  
            curl_setopt($ch, CURLOPT_URL, $remote_server);
            curl_setopt($ch, CURLOPT_POST, 1); 
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json;charset=utf-8'));
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
            // 线下环境不用开启curl证书验证, 未调通情况可尝试添加该代码
            // curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0); 
            // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $data = curl_exec($ch);
            curl_close($ch);                
            return $data;  
        }  
        
        function to_dd($types,$classname){
            if($types == "online"){
                $command = "select * from states where classname='$classname' and state='online'";
                $result = $this -> command($command);
                $result = mysqli_fetch_all($result);
                $couts = count($result);
                $table = "
                
                在线人数:$couts\n
                
                ";
                foreach($result as $item){
                    $name = $item[0];
                    $state = $item[2];
                    $table .= " - $name\n";
                }
                $data = array ('msgtype' => 'markdown','markdown' => array ('title' => "在线",'text' => $table));
                $data_string = json_encode($data);
                $result = $this -> request_by_curl($this -> webhook, $data_string);  
            }
            if($types == "leave"){
                $command = "select * from states where classname='$classname' and state='leave'";
                $result = $this -> command($command);
                $result = mysqli_fetch_all($result);
                $couts = count($result);
                $table = "
                
                离开人数:$couts\n
                
                ";
                foreach($result as $item){
                    $name = $item[0];
                    $state = $item[2];
                    $table .= " - $name\n";
                }
                $data = array ('msgtype' => 'markdown','markdown' => array ('title' => "离开",'text' => $table));
                $data_string = json_encode($data);
                $result = $this -> request_by_curl($this -> webhook, $data_string);  
            }
            if($types == "offline"){
                $command = "select * from states where classname='$classname' and state='offline'";
                $result = $this -> command($command);
                $result = mysqli_fetch_all($result);
                $couts = count($result);
                $table = "
                
                离线人数:$couts\n
                ";
                foreach($result as $item){
                    $name = $item[0];
                    $state = $item[2];
                    $table .= "- $name \n";
                }
                $data = array ('msgtype' => 'markdown','markdown' => array ('title' => "离线",'text' => $table));
                $data_string = json_encode($data);
                $result = $this -> request_by_curl($this -> webhook, $data_string);  
            }
            return array(
                "code" => 500,
                "msg" => "Success ."
            );
        }
        
        function set_state($password,$state){
            $login = $this -> login($password);
            $username = $this -> username;
            $timen = time();
            
            if($login['code'] == 200){
                $detail = $login['detail'];
                $per = $detail['per'];
                $command = "update states set state='$state',last_time='$timen' where username='$username'";
                $this -> command($command);
                if($state == "leave" && $per=='student'){
                    $message="$username 离开啦!";
                    $data = array ('msgtype' => 'text','text' => array ('content' => $message));
                    $data_string = json_encode($data);
                    $result = $this -> request_by_curl($this -> webhook, $data_string);  
                }
                if($state == "online" && $per=='student'){
                    $message="$username 已上线!";
                    $data = array ('msgtype' => 'text','text' => array ('content' => $message));
                    $data_string = json_encode($data);
                    $result = $this -> request_by_curl($this -> webhook, $data_string);  
                }
                return array(
                    "code" => 300,
                    "msg" => "Success ."
                );

            }

            else{
                return $login;
            }
        }
        function login($password){

            $username = $this -> username;
            $command = "select * from users where username='$username'";
            $result = $this -> command($command);
            $result = mysqli_fetch_assoc($result);
            if(empty($result)){
                return array(
                    "code" => 201,
                    "error" => "User not found ."
                );
            }
            else{
                $co_password = $result['password'];
                if($password == $co_password){
                    return array(
                        "code" => 200,
                        "msg" => "Login successful .",
                        "detail" => $result
                    );
                }
                else{
                    return array(
                        "code" => 202,
                        "error" => "Password incorrect ."
                    );
                }
            }

        }
    }


?>