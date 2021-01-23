<div class="content">
        <h3>你好,<?php echo($name); ?></h3>
        <h3>已进入监控状态</h3>
    </div>



<script>
    $.ajax({
             type: "POST",
             url: "/users/states/setstate.php",
             data: {
                 state : "online"
             },
             dataType: "text",
             success: function(data){
                 console.log(data)
             }
            })
    document.addEventListener("visibilitychange", function() {
        console.log( document.hidden );
        var hi = document.hidden
        if(hi == true){
            $.ajax({
             type: "POST",
             url: "/users/states/setstate.php",
             data: {
                 state : "leave"
             },
             dataType: "text",
             success: function(data){
                 console.log(data)
             }
            })
        }
        else{
            $.ajax({
             type: "POST",
             url: "/users/states/setstate.php",
             data: {
                 state : "online"
             },
             dataType: "text",
             success: function(data){
                 console.log(data)
             }
            })
        }
        // Modify behavior...
    });
</script>