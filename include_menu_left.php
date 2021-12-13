<?php
$uri = explode('/', $_SERVER['REQUEST_URI']);
// echo "KKKKKK: ".$uri[2];
if($uri[2]=='dashboard.php'){
  $dashboard='active'; 
}else if($uri[2]=='profile.php'){
  $profile='active'; 
}else if($uri[2]=='plansell.php'){
  $plansell='active'; 
}
?>
<div class="sidebar" data-color="orange">
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
      NFT
    </a>
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      PLAN MEMBER
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">
      <li class="<?php echo $dashboard ?> ">
        <a href="index.php">
          <i class="now-ui-icons design_app"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="<?php echo $plansell ?> ">
        <a href="plansell.php">
          <i class="now-ui-icons objects_spaceship"></i>
          <p>Plan Sell</p>
        </a>
      </li> 
      <li class="<?php echo $profile ?> ">
        <a href="profile.php">
          <i class="now-ui-icons users_single-02"></i>
          <p>User Profile</p>
        </a>
      </li> 
      
      <li class="active-pro">
        <a href="auth-logout.php">
          <i class="now-ui-icons media-1_button-power"></i>
          <p>Sign out</p>
        </a>
      </li>
    </ul>
  </div>
</div>