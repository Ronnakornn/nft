<?php include '../Adminmanage/include_head.php';?>

<body class="" onLoad="modLoadContent()">
  <div class="wrapper ">  
    <?php 
      include '../Adminmanage/include_menu_left.php';
    ?>
    <div class="main-panel" id="main-panel">
      <?php 
        include '../Adminmanage/include_nav.php';
      ?>
      <!-- content @s -->
      <div class="nk-content nk-content-fluid">
          <div class="container-xl wide-xl">
              <div class="nk-content-inner">
                  <div class="nk-content-body">
                    <div id="load_mainwaiting" style="display:none">
                          <div class="tb-cell">
                              <div id="page-loading">
                                <div></div>
                            </div>
                          </div>
                      </div>
                      <div id="load_mainContant">
                        <form action="" method="post" name="myForm" id="myForm">
                          <input name="masterkey" type="hidden" id="masterkey" value="<?php echo $_REQUEST["masterkey"]?>" />
                          <input name="myaction" type="hidden" id="myaction" value="" />
                          <input name="menukeyid" type="hidden" id="menukeyid" value="<?php echo $_REQUEST["menukeyid"]?>" />
                          <input name="submenukeyid" type="hidden" id="submenukeyid" value="<?php echo $_REQUEST["submenukeyid"]?>" />
                          <input name="MenuActive" type="hidden" id="MenuActive" value="<?php echo $_REQUEST["MenuActive"]?>" />
                          <input name="SubMenuActive" type="hidden" id="SubMenuActive" value="<?php echo $_REQUEST["SubMenuActive"]?>" />
                        </form> 
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- content @e -->
      <!-- footer @s -->
      
      <!-- footer @e -->
    </div>
         <?php include '../Adminmanage/include_footer.php';?>    
    <!-- app-root @e -->
    <!-- JavaScript -->
    <?php include '../Adminmanage/include_foot.php';?>
    <script src="../Adminmanage/index.js"></script>
</body>

</html>