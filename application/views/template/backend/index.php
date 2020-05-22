<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
 <meta name="description" content="bootstrap admin template">
 <meta name="author" content="">

 <title>POS Data Collection Information System</title>

 <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/topbar/assets/images/apple-touch-icon.png">
 <link rel="shortcut icon" href="<?php echo base_url();?>assets/topbar/assets/images/favicon.ico">

 <!-- Stylesheets -->
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/css/bootstrap-extend.min.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/css/site.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/skins/blue.css">

 <!-- Plugins -->
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/animsition/animsition.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/asscrollable/asScrollable.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/switchery/switchery.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/intro-js/introjs.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/slidepanel/slidePanel.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/flag-icon-css/flag-icon.css">
 <!--<link rel="stylesheet" href="../../Admin Remark/topbar/assets/vendor/chartist/chartist.css">-->
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/aspieprogress/asPieProgress.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/examples/css/dashboard/v2.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.css">

 <script src="<?php echo base_url();?>assets/topbar/assets/vendor/chart-js/Chart.js"></script>

 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/examples/css/tables/datatable.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/select2/select2.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/chartist/chartist.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/vendor/timepicker/jquery-timepicker.css">

 <!-- Fonts -->
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/fonts/glyphicons/glyphicons.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/fonts/web-icons/web-icons.min.css">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/topbar/assets/fonts/brand-icons/brand-icons.min.css">
 <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
 <script src="<?php echo base_url();?>assets/topbar/assets/vendor/jquery/jquery.js"></script>

    <!--[if lt IE 9]>
    <script src="../../assets/vendor/html5shiv/html5shiv.min.js"></script>
  <![endif]-->

    <!--[if lt IE 10]>
    <script src="../../assets/vendor/media-match/media.match.min.js"></script>
    <script src="../../assets/vendor/respond/respond.min.js"></script>
  <![endif]-->

  <!-- Scripts -->
  <script src="<?php echo base_url();?>assets/topbar/assets/vendor/breakpoints/breakpoints.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/toast/css/jquery.toast.css">
  <script>
    Breakpoints();
  </script>
  <style>
    /*.navbar-inverse{
      background-color:orange; 
    }*/
    .navbar-brand-text{
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
      font-weight:300;
      font-size:17pt;
    }
    .site-menu-title{
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
      font-weight:300;
      font-size:12pt;
    }
    #clockbox{
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
      font-weight:600;
      font-size:12pt;
    }
    .page-title{
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
      font-weight:300;
    }
    .table{
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
      font-weight:300;
      font-size:11pt;
    }
    .modal{
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
      font-weight:300;
    }
    .btn{
      font-family: "HelveticaNeue-Light", "Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
      font-weight:300;
    }
    .site-menubar{
      height:auto;
    }
    ul.site-menu{
      padding-left: 10px;
      padding-right: 0px;
    }
    .page{
      /*margin-top:3.8rem;*/
    }
  </style>
</head>
<body class="animsition site-navbar-small dashboard">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php
        /*
        * Variabel $headernya diambil dari core MY_Controller
        * (application/core/MY_Controller.php)
        * */
        echo $headernya;
        ?>
    </nav>

        <?php
        /*
        * Variabel $contentnya diambil dari core MY_Controller
        * (application/core/MY_Controller.php)
        * */
        echo $contentnya;
        ?>

    <!-- Load file Javascript Bootstrap & jQuery -->
    <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
</body>
</html>

<script src="<?php echo base_url();?>assets/topbar/assets/vendor/babel-external-helpers/babel-external-helpers.js"></script>



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
<!--<script src="../../Admin Remark/topbar/assets/vendor/chartist/chartist.min.js"></script>-->
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/gmaps/gmaps.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/matchheight/jquery.matchHeight-min.js"></script>

<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-fixedheader/dataTables.fixedHeader.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-rowgroup/dataTables.rowGroup.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-scroller/dataTables.scroller.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-responsive/dataTables.responsive.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-buttons/dataTables.buttons.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-buttons/buttons.html5.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-buttons/buttons.flash.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-buttons/buttons.print.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-buttons/buttons.colVis.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/asrange/jquery-asRange.min.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/bootbox/bootbox.js"></script>

<!-- Scripts -->
<script src="<?php echo base_url();?>assets/topbar/assets/js/Component.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Base.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Config.js"></script>

<script src="<?php echo base_url();?>assets/topbar/assets/js/Section/Menubar.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Section/Sidebar.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Section/PageAside.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/menu.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/select2/select2.full.min.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/select2.js"></script>

<!-- Config -->
<script src="<?php echo base_url();?>assets/topbar/assets/js/config/colors.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/config/tour.js"></script>
<script>Config.set('assets', '<?php echo base_url();?>assets/topbar/assets');</script>

<!-- Page -->

<script src="<?php echo base_url();?>assets/topbar/assets/js/Site.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/asscrollable.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/slidepanel.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/switchery.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/gmaps.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/matchheight.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/asscrollable.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/datatables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/toast/js/jquery.toast.js"></script>

<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/jt-timepicker.js"></script>

<script src="<?php echo base_url();?>assets/topbar/assets/examples/js/tables/datatable.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/js/Plugin/bootstrap-datepicker.js"></script>
 <script src="<?php echo base_url();?>assets/js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/timepicker/jquery.timepicker.min.js"></script>
 <script src="<?php echo base_url();?>assets/topbar/assets/vendor/chartist/chartist.js"></script>
<script src="<?php echo base_url();?>assets/topbar/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>

 <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
<script type="text/javascript">

  $(document).ready(function(){
    var response_success='<?= $this->session->flashdata('success')?>';
    var response_error='<?= $this->session->flashdata('error')?>';

    if(response_success)
    {
      success(response_success);
    }

    if(response_error)
    {
      error(response_error);
    }

  })

function show_modal(url) { // clear error string
  $.ajax({
    url:url,
    dataType: 'text',
    success: function(data) {
      $("#formModal").html(data);
      $("#formModal").modal('show');
        // todo:  add the html to the dom...
      }
    });
};


  function back()
  {
    window.history.back();
  }

  function error(error)
{
  $.toast({
    heading: 'Peringatan',
    text: error,
    showHideTransition: 'fade',
    icon: 'warning'
})
}

function success(text)
{
  $.toast({
    heading: 'Sukses',
    text: text,
    showHideTransition: 'fade',
    icon: 'success'
})
}
</script>