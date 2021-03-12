
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php $this->load->view('include/head') ?>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="horizontal-layout horizontal-menu dark-layout 2-columns navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">

  <!-- BEGIN: Header-->
  <?php $this->load->view('include/header') ?>
  <!-- END: Header-->


  <!-- BEGIN: Main Menu-->
  <div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal sticky-nav navbar-dark navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo base_url() ?>html/ltr/horizontal-menu-template-dark/index.html">
            <div class="brand-logo"></div>
            <h2 class="brand-text mb-0">Vuexy</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
          </ul>
        </div>
        <!-- Horizontal menu content-->
        <?php $this->load->view('include/menu') ?>
      </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Ecommerce Starts -->
          <section id="dashboard-ecommerce">
           
          </section>
          <!-- Dashboard Ecommerce ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- Buynow Button-->
    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    
    <?php $this->load->view('include/script') ?>

  </body>
  <!-- END: Body-->
  </html>