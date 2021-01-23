<div class="mdui-appbar">
  <div class="mdui-toolbar mdui-color-theme">
    <a href="javascript:toggle();" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">menu</i></a>
    <a href="javascript:;" class="mdui-typo-headline">CX</a>
    <a href="javascript:;" class="mdui-typo-title">监控</a>
    <div class="mdui-toolbar-spacer"></div>
    
  </div>
</div>


<div class="mdui-drawer mdui-drawer-close" id="drawer">
  <ul class="mdui-list">
    <li class="mdui-list-item mdui-ripple">
      <i class="mdui-list-item-icon mdui-icon material-icons">move_to_inbox</i>
      <a href="javascript:window.location='/index.php';"><div class="mdui-list-item-content">首页</div></a>
    </li>
    
    <li class="mdui-subheader">友情链接</li>
    <a href="//blog.bsot.cn"><li class="mdui-list-item mdui-ripple">
      <div class="mdui-list-item-content">源源日记</div>
    </li></a>
    <!--<li class="mdui-list-item mdui-ripple">
      <i class="mdui-list-item-icon mdui-icon material-icons">delete</i>
      <div class="mdui-list-item-content">Trash</div>
    </li>
    <li class="mdui-list-item mdui-ripple">
      <i class="mdui-list-item-icon mdui-icon material-icons">error</i>
      <div class="mdui-list-item-content">Spam</div>
    </li>-->
  </ul>
</div>


<script>
    function toggle(){
        var inst = new mdui.Drawer('#drawer')
        inst.toggle();
    }
</script>

<script
    src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
    integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
    crossorigin="anonymous"
    ></script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>