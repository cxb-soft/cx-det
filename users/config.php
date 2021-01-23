<?php

    const DATABASE_ADDR = "localhost"; // 填写你的数据库地址
    const DATABASE_USERNAME = "你的数据库用户名"; // 填写的你的数据库用户名
    const DATABASE_PASS = "你的数据库密码"; // 填写你的数据库密码
    const DATABASE = "你的数据库名"; // 填写你的数据库名
    
    const WEBSITE = "CX 监控"; // 填写你的站点名称

    const DING_WEBHOOK = "DingDing Webhook机器人提供的webhook地址"; // 填写钉钉webhook机器人地址

    const INITPASS = "123456"; // 学生初始密码
    const TEACHER_PASS = "admin"; // 教师初始密码

    $db = mysqli_connect(DATABASE_ADDR,DATABASE_USERNAME,DATABASE_PASS,DATABASE);

?>