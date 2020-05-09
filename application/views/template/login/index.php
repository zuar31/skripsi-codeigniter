<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>LOGIN</title>

  <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/topbar/assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/topbar/assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>/assets/topbar/assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/css/site.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/skins/blue.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/examples/css/pages/login-v2.css">


  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/fonts/brand-icons/brand-icons.min.css">
  <!-- <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'> -->
  <link rel='stylesheet' media="screen" href="https://fontlibrary.org/face/u-din-1451-mittelschrift" type="text/css">

    <!--[if lt IE 9]>
    <script src="../../assets/vendor/html5shiv/html5shiv.min.js"></script>
  <![endif]-->

    <!--[if lt IE 10]>
    <script src="../../assets/vendor/media-match/media.match.min.js"></script>
    <script src="../../assets/vendor/respond/respond.min.js"></script>
  <![endif]-->

  <!-- Scripts -->
  <script src="<?php echo base_url();?>assets/topbar/assets/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="animsition page-login-v2 layout-full page-dark">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->


      <style>
        body {
          background: transparent;
        }
        .page-login-v2 {
          height: 100%;
          overflow-x: hidden;
        }

        .page-login-v2:before {
          background-image: url("<?php echo base_url();?>assets/topbar/assets/kremlin.jpg");
        }

        .page-login-v2.page-dark.layout-full:after {
          background-color: rgba(38, 50, 56, .6);
        }

        .page-login-v2 .page-brand-info {
          margin: 220px 100px 0 90px;
        }

        .page-login-v2 .page-brand-info .brand-img {
          vertical-align: middle;
        }

        .page-login-v2 .page-brand-info .brand-text {
          display: inline-block;
          margin: 11px 0 11px 20px;
          vertical-align: middle;
        }

        .page-login-v2 .page-brand-info p {
          max-width: 650px;
          opacity: .6;
        }

        .page-login-v2 .page-login-main {
          position: absolute;
          top: 0;
          right: 0;
          height: auto;
          min-height: 100%;
          padding: 150px 60px 180px;
          color: #76838f;
          background: #fff;
        }

        .page-login-v2 .page-login-main .brand {
          margin-bottom: 60px;
        }

        .page-login-v2 .page-login-main .brand-img {
          vertical-align: middle;
        }

        .page-login-v2 .page-login-main .brand-text {
          display: inline-block;
          margin: 11px 0 11px 20px;
          color: #3e8ef7;
          vertical-align: middle;
        }

        .page-login-v2 form {
          width: 350px;
          margin: 45px 0 20px;
        }

        .page-login-v2 form > button {
          margin-top: 38px;
        }

        .page-login-v2 form a {
          margin-left: 20px;
        }

        .page-login-v2 footer {
          position: absolute;
          right: 0;
          bottom: 0;
          left: 0;
          margin: 50px 60px;
          text-align: center;
        }

        .page-login-v2 .social .icon, .page-login-v2 .social .icon:hover, .page-login-v2 .social .icon:active {
          color: #fff;
        }

        @media (min-width: 992px) {
          .page-login-v2 .page-content {
            padding-right: 500px;
          }
        }

        @media (max-width: 991px) {
          .page-login-v2 .page-login-main {
            padding-top: 60px;
          }
        }

        @media (min-width: 768px) and (max-width: 991px) {
          .page-login-v2 .page-login-main {
            padding-top: 80px;
          }

          .page-login-v2 .page-brand-info {
            margin: 160px 0 0 35px;
          }

          .page-login-v2 .page-brand-info > p {
            color: transparent;
            opacity: 0;
          }
        }

        @media (max-width: 767px) {
          .page-login-v2 .page-login-main {
            width: 100%;
            padding-top: 60px;
          }

          .page-login-v2 form {
            width: auto;
          }
        }

        @media (max-width: 479px) {
          .page-login-v2 .page-brand-info {
            margin: 220px 0 0;
          }

          .page-login-v2 .page-login-main {
            padding: 50px 30px 180px;
          }

          .page-login-v2 form {
            width: auto;
          }

          .page-login-v2 footer {
            margin: 50px 30px;
          }
        }

        p{
          font-family:"HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
          font-weight:300;
        }

      </style>
      <!-- Page -->
      <div class="page" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <div class="page-content">
          <div class="page-brand-info">
            <div class="brand">
              <img class="brand-img" src="<?php echo base_url();?>assets/topbar/assets/images/logo@2x.png" alt="..."> 
              <h2 class="brand-text font-size-40"></h2>
            </div>
            <p class="font-size-20">APLIKASI MONITORING SERANGAN FLOODING ATTACK UPT TELEMATIKA UPN 'VETERAN' YOGYAKARTA</p>
          </div>

          <div class="page-login-main animation-slide-right animation-duration-1">
            <div class="brand hidden-md-up">
              <img class="brand-img" src="<?php echo base_url();?>assets/topbar/assets/images/logo-colored@2x.png" alt="...">
              <h3 class="brand-text font-size-40">Remark</h3>
            </div>
            <h3 class="font-size-24">Sign In</h3>
            <!-- <div id="infoMessage"><?php echo $message;?></div> -->

            <?php
            /*
            * Variabel $contentnya diambil dari core MY_Controller
            * (application/core/MY_Controller.php)
            * */
            echo $contentnya;
            ?>

           <!-- <p>No account? <a href="register-v2.html">Sign Up</a></p> -->
         </div>

       </div>
     </div>
     <!-- End Page -->


     <!-- Core  -->
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/babel-external-helpers/babel-external-helpers.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/jquery/jquery.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/popper-js/umd/popper.min.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/bootstrap/bootstrap.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/animsition/animsition.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/mousewheel/jquery.mousewheel.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/asscrollbar/jquery-asScrollbar.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/asscrollable/jquery-asScrollable.js"></script>

     <!-- Plugins -->
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/switchery/switchery.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/intro-js/intro.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/screenfull/screenfull.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/slidepanel/jquery-slidePanel.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

     <!-- Scripts -->
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Component.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Base.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Config.js"></script>

     <script src="<?php echo base_url();?>assets/topbar/assets/js/Section/Menubar.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Section/Sidebar.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Section/PageAside.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/menu.js"></script>

     <!-- Config -->
     <script src="<?php echo base_url();?>assets/topbar/assets/js/config/colors.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/config/tour.js"></script>
     <script>Config.set('assets', '<?php echo base_url();?>assets/topbar/assets/');</script>

     <!-- Page -->
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Site.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/asscrollable.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/slidepanel.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/switchery.js"></script>
     <script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/jquery-placeholder.js"></script>

     <script>
      (function(document, window, $){
        'use strict';

        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
    
  </body>
  </html>
