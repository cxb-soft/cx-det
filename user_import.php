<?php

    class data{
        function __construct($classname){
            require_once("users/config.php");
            $this -> db = $db;
            $this -> classname = $classname;
        }
        function check($name){
            $classname = $this -> classname;
            $db = $this -> db;
            $command = "select * from users where username='$name'";
            $result = mysqli_query($db,$command);
            $result = mysqli_fetch_assoc($result);
            if(empty($result)){
                return false;
            }
            else{
                return true;
            }
        }
        function teacher_sign($classname){
            $db = $this -> db;
            $classname = $this -> classname;
            if($this -> check($name)){
                echo( "$name exist" . "\n" );
                return 1;
            }
            $id = rand(200,655655);
            $command = "insert into users values('$classname','" . INITPASS . "','$classname','$classname','teacher')";
            mysqli_query($db,$command);
            echo( "insert $name ok" . "\n");
            return 0;
        }
        function insert($name){
            $db = $this -> db;
            $classname = $this -> classname;
            if($this -> check($name)){
                echo( "$name exist" . "\n" );
                return 1;
            }
            $id = rand(200,655655);
            $command = "insert into users values('$name','" . INITPASS . "','$classname','$name','student')";
            mysqli_query($db,$command);
            echo( "insert $name ok" . "\n");
            return 0;
        }
    }

    require_once "./PHPExcel/IOFactory.php";
    include 'PHPExcel.php';
    $classname = "班级"; // 这里输入班级
    $namelists = "name_list.xlsx"; // 名单列表地址
    $data = new data($classname);
    $objReader=PHPExcel_IOFactory::createReader('Excel2007');
    $objPHPExcel = $objReader->load("$namelists",'utf-8');
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow(); // 取得总行数
    $highestColumn = $sheet->getHighestColumn(); // 取得总列数
    //echo($highestRow);
    $exists = 0;
    $students = $highestRow - 1;
    for($index=2;$index<=$highestRow;$index++) {
        $name = $objPHPExcel->getActiveSheet()->getCell("B$index")->getValue();
        $result = $data -> insert($name);
        $exists += $result;
    }
    $succeed = $students - $exists;
    print("Exist : $exists \nSucceed : $succeed \n");

?>