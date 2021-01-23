<div class="content">
    <h2>本班学生全部状态</h2>
    <button class="mdui-btn mdui-btn-raised" onclick="all_off()">全部离线</button>
    <button class="mdui-btn mdui-btn-raised" onclick="to_dd('online')">汇总在线到钉钉</button>
    <button class="mdui-btn mdui-btn-raised" onclick="to_dd('leave')">汇总离开到钉钉</button>
    <button class="mdui-btn mdui-btn-raised" onclick="to_dd('offline')">汇总离线到钉钉</button>
    <?php

        require_once("../functions.php");
        $user = new user($username);
        $list = $user -> get_state($classname);
        
    
    ?>

<h3>在线成员</h3>
    <br>
    <div class="mdui-divider"></div>
    <br>
    <div class="mdui-table-fluid">
  <table class="mdui-table">
    <thead>
      <tr>
        <th>姓名</th>
        <th>在线状态</th>
      </tr>
    </thead>
    <tbody>
    <?php
    
        foreach($list as $item){
            $name = $item[0];
            $state = $item[2];
            if($state == "offline"){
                $state = "离线";
            }
            else if($state == "leave"){
                $state = "离开";
            }
            else if($state == "online"){
                $state = "在线";
            }
            if($state == "在线"){
                echo("
                
                <tr>
                <th>$name</th>
                <th>$state</th>
                </tr>
                ");
            }
        }
    
    ?>
    </tbody>
  </table>
</div>


<br>

        <div class="mdui-divider"></div>
<br>

<h3>离开成员</h3>
    <br>
    <div class="mdui-divider"></div>
    <br>
    <div class="mdui-table-fluid">
  <table class="mdui-table">
    <thead>
      <tr>
        <th>姓名</th>
        <th>在线状态</th>
      </tr>
    </thead>
    <tbody>
    <?php
    
        foreach($list as $item){
            $name = $item[0];
            $state = $item[2];
            if($state == "offline"){
                $state = "离线";
            }
            else if($state == "leave"){
                $state = "离开";
            }
            else if($state == "online"){
                $state = "在线";
            }
            if($state == "离开"){
                echo("
                
                <tr>
                <th>$name</th>
                <th>$state</th>
                </tr>
                ");
            }
        }
    
    ?>
    </tbody>
  </table>
</div>

<br>

        <div class="mdui-divider"></div>
<br>

<h3>离线成员</h3>
    <br>
    <div class="mdui-divider"></div>
    <br>
    <div class="mdui-table-fluid">
  <table class="mdui-table">
    <thead>
      <tr>
        <th>姓名</th>
        <th>在线状态</th>
      </tr>
    </thead>
    <tbody>
    <?php
    
        foreach($list as $item){
            $name = $item[0];
            $state = $item[2];
            if($state == "offline"){
                $state = "离线";
            }
            else if($state == "leave"){
                $state = "离开";
            }
            else if($state == "online"){
                $state = "在线";
            }
            if($state == "离线"){
                echo("
                
                <tr>
                <th>$name</th>
                <th>$state</th>
                </tr>
                ");
            }
        }
    
    ?>
    </tbody>
  </table>
</div>

<br>

        <div class="mdui-divider"></div>
<br>

    <h3>所有成员</h3>
    <br>
    <div class="mdui-divider"></div>
    <br>
    <div class="mdui-table-fluid">
  <table class="mdui-table">
    <thead>
      <tr>
        <th>姓名</th>
        <th>在线状态</th>
      </tr>
    </thead>
    <tbody>
    <?php
    
        foreach($list as $item){
            $name = $item[0];
            $state = $item[2];
            if($state == "offline"){
                $state = "离线";
            }
            else if($state == "leave"){
                $state = "离开";
            }
            else if($state == "online"){
                $state = "在线";
            }
            echo("
            
            <tr>
            <th>$name</th>
            <th>$state</th>
            </tr>
            ");
        }
    
    ?>
    </tbody>
  </table>
</div>

</div>

<script>
    function to_dd(types){
        $.ajax({
             type: "POST",
             url: "/users/states/to_dd.php",
             data: {
                 types : types
             },
             dataType: "json",
             success: function(data){
                 console.log(data.code)
                 if(data.code == 500){
                    mdui.snackbar({
                        message: '已汇总',
                        position: 'left-top'
                    });
                 }
             }
            })
    }

        function all_off(){
            $.ajax({
             type: "POST",
             url: "/users/states/setstate.php",
             data: {
                 state : "alloff"
             },
             dataType: "json",
             success: function(data){
                 console.log(data.code)
                 if(data.code == 400){
                    mdui.snackbar({
                        message: '已重置状态',
                        position: 'left-top'
                    });
                 }
             }
            })
        }

</script>
    

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>




