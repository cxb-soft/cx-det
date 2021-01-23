<h3>登录</h3>
<div class="mdui-divider"></div>
<br><br>
<div class="mdui-textfield">
  <label class="mdui-textfield-label">用户名</label>
  <input class="mdui-textfield-input" id="username" type="text"/>
</div>
<div class="mdui-textfield">
  <label class="mdui-textfield-label">密码</label>
  <input class="mdui-textfield-input" id="password" type="password"/>
</div>
<button class="mdui-btn mdui-btn-raised" onclick="login()">登录</button>


<script>
    function login(){
        var username = $("#username").val()
        var password = $("#password").val()
        $.ajax({
             type: "POST",
             url: "/users/login/login.php",
             data: {
                 username : username,
                 password : password
             },
             dataType: "json",
             success: function(data){
                 console.log(data['code'])
                 var code = data['code']
                 if(code == 200){
                    mdui.snackbar({
                        message: '登陆成功,即将跳转...',
                        position: 'left-top'
                    });
                    setTimeout(() => {
                        window.location = "/users/user/index.php";
                    }, 1500);
                 }
             }
        })
    }
</script>