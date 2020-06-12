<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse"
role="navigation">

<div class="navbar-header">
    <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
    data-toggle="menubar">
    <span class="sr-only">Toggle navigation</span>
    <span class="hamburger-bar"></span>
</button>
<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
data-toggle="collapse">
<i class="icon wb-more-horizontal" aria-hidden="true"></i>
</button>
<a class="navbar-brand navbar-brand-center" href="<?php echo base_url()?>">
  <img class="navbar-brand-logo navbar-brand-logo-" style="height:40px;width:auto" src="<?php echo base_url();?>assets/topbar/assets/images/upnbaru1.png">
  <!-- <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?php echo base_url();?>assets/topbar/assets/images/logo.png"
  title="Remark"> -->
  <!-- <img class="navbar-brand-logo navbar-brand-logo-special" src="<?php echo base_url();?>assets/topbar/assets/images/logo-colored.png"
  title="Remark"> -->
  <span class="navbar-brand-text hidden-xs-down">Aplikasi Monitoring Flooding Attack</span>
</a>
<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
data-toggle="collapse">
<span class="sr-only">Toggle Search</span>
<i class="icon wb-search" aria-hidden="true"></i>
</button>
</div>

<div class="navbar-container container-fluid">
  <!-- Navbar Collapse -->
  <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
    <!-- Navbar Toolbar -->
    <ul class="nav navbar-toolbar">

    </ul>
    <!-- End Navbar Toolbar -->

    <!-- Navbar Toolbar Right -->
    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
       <li class="nav-item dropdown">
           <a class="nav-link" data-toggle="dropdown" style=' font-family: "HelveticaNeue-Light", "Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;font-weight: 300' onclick="back();" href="javascript:void(0)" role="button">BACK
           </a>
       </li>
       &nbsp&nbsp&nbsp&nbsp
       <li class="nav-item dropdown">
        <p><div id="clockbox" style="color:white;"></div></p>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
        data-animation="scale-up" role="button">
        <span class="avatar avatar-online">
            <img src="<?php echo base_url();?>assets/topbar/assets/portraits/5.jpg" alt="...">
            <i></i>
        </span>
    </a>
    <div class="dropdown-menu" role="menu">
        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> <?= ($this->session->userdata('username'))!==null?$this->session->userdata('username'):'Session End'?></a>
 <!--        <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
    <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a> -->
    <div class="dropdown-divider" role="presentation"></div>
    <a class="dropdown-item" href="<?php echo base_url('index.php/auth/logout'); ?>" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
</div>
</li>

</ul>
<!-- End Navbar Toolbar Right -->
</div>
<!-- End Navbar Collapse -->

<!-- Site Navbar Seach -->
<div class="collapse navbar-search-overlap" id="site-navbar-search">
  <form role="search">
    <div class="form-group">
      <div class="input-search">
        <i class="input-search-icon wb-search" aria-hidden="true"></i>
        <input type="text" class="form-control" name="site-search" placeholder="Search...">
        <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
        data-toggle="collapse" aria-label="Close"></button>
    </div>
</div>
</form>
</div>
<!-- End Site Navbar Seach -->
</div>
</nav>   
<div class="site-menubar site-menubar-light">
  <div class="site-menubar-body">
    <div>
      <div>
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-category">General</li>
          <li class="dropdown site-menu-item">
            <!-- <a data-toggle="dropdown" href="../kategori/monitor_ids.php" data-dropdown-toggle="false"> -->
              <a data-toggle="dropdown" href="<?php echo base_url('index.php/page/home'); ?>" data-dropdown-toggle="false">
                <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                <span class="site-menu-title">Home</span>
            </a>
        </li>

        <li class="dropdown site-menu-item">
            <a data-toggle="dropdown" href="<?php echo base_url('index.php/page/user'); ?>" data-dropdown-toggle="false">
              <i class="site-menu-icon wb-file" aria-hidden="true"></i>
              <span class="site-menu-title">Users</span>
          </a>
      </li>
      <li class="dropdown site-menu-item">
            <a data-toggle="dropdown" href="<?php echo base_url('index.php/page/monitor'); ?>" data-dropdown-toggle="false">
              <i class="site-menu-icon wb-file" aria-hidden="true"></i>
              <span class="site-menu-title">Monitoring IDS</span>
          </a>
      </li>
      <li class="dropdown site-menu-item">
            <a data-toggle="dropdown" href="<?php echo base_url('index.php/page/clustering'); ?>" data-dropdown-toggle="false">
              <i class="site-menu-icon wb-file" aria-hidden="true"></i>
              <span class="site-menu-title">Clustering K-Means</span>
          </a>
      </li>
      <li class="dropdown site-menu-item">
            <a data-toggle="dropdown" href="<?php echo base_url('index.php/clustering/index_rekap'); ?>" data-dropdown-toggle="false">
              <i class="site-menu-icon wb-file" aria-hidden="true"></i>
              <span class="site-menu-title">Rekap</span>
          </a>
      </li>
  </ul>      
</div>
</div>
</div>
</div>