# cx-det
> 一个带推送功能的设备监控
>
> [Github项目地址](https://github.com/cxb-soft/cx-det)



## 安装方法

#### 数据库安装

1. 将根目录下的```cx.sql```导入数据库

#### 站点配置

1. 打开```/users/config.php```修改如下内容：

   ```php
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
   ```

   按照注释进行配置

   


#### 导入用户数据

​	出入应用场景需要，不开放注册，所有用户数据均通过导入的方式

1. 将所有用户信息导入```name_list.xlsx```

2. 编辑```user_import.php```

   ```php
   $classname = "班级"; // 这里输入班级
   ```

   将这里改成要导入的班级

3. 转到网站根目录，执行```php user_import.php```将会进行自动导入。

4. 班级对应的教师账号就是 ```$classname```里存放的班级名，密码是在```conifg.php```中放的```TEACHER_PASS```

5. 每个学生的账号就是自己的中文名，密码是在```conifg.php```中放的```INITPASS```







## 食用方法

### 学生

#### 1.打开浏览器，访问站点

<img src="https://i.loli.net/2021/01/21/9klFzarKpZon3jS.png" alt="image-20210121043204010" style="zoom:50%;" />

#### 2.登录

用户名为自己的中文名

密码为```config.php```中设置的```INITPASS```

<img src="C:\Users\neptunevon\AppData\Roaming\Typora\typora-user-images\image-20210121043339233.png" alt="image-20210121043339233" style="zoom:50%;" />

#### 3.保持页面开启即可,监控会自动开启



### 教师

#### 1.打开浏览器，访问CX 监控

#### 2.登录

教师账号为```$classname```

密码为```config.php```中设置的```TEACHER_PASS```

打开如图页面

<img src="C:\Users\neptunevon\AppData\Roaming\Typora\typora-user-images\image-20210121043648507.png" alt="image-20210121043648507" style="zoom:50%;" />



### 钉钉信息推送

![image-20210121043718630](https://i.loli.net/2021/01/21/uR2UxMVt5kjq4gw.png)

![image-20210121044748852](https://i.loli.net/2021/01/21/2LO1hw8ikZA3vGT.png)

<img src="C:\Users\neptunevon\AppData\Roaming\Typora\typora-user-images\image-20210121045021008.png" alt="image-20210121045021008" style="zoom:50%;" />