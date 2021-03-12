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
                            <h2 class="brand-text mb-0">PARKING</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <?php $this->load->view('include/menu') ?>
        </div>
    </div>
    <!-- END: Main Menu-->


<div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
              <div class="col-12">
                <h2 class="content-header-title float-left mb-0">List Perangkat</h2>
              
              </div>
            </div>
          </div>
          <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrum-right">
              <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle waves-effect waves-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<!-- Content types section start -->

  
</section>
<!-- Content types section end -->


<!-- Background variants section start -->
<section id="bg-variants">
  
  <div class="row">
  <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border-success text-center bg-transparent">
        <div class="card-content">
          <img src="<?php echo base_url(); ?>app-assets/images/elements/cpu.png" alt="element 04" width="150" class="float-left mt-3 pl-2">
          <div class="card-body">
         <h4 class="card-title mt-3">Controller</h4>
            <p class="card-text mb-25">192.192.192.105</p>
             <?php

$url = '192.192.192.105';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if($httpcode>=200 && $httpcode<300){
  echo '<button class="btn btn-success mt-1 waves-effect waves-light">Connected</button>';
} else {
  echo '<button class="btn btn-danger mt-1 waves-effect waves-light">Disconnected</button>';
}

?></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border-success text-center bg-transparent">
        <div class="card-content">
          <img src="<?php echo base_url(); ?>app-assets/images/elements/webcam.png" alt="element 04" width="150" class="float-left mt-3 pl-2">
          <div class="card-body">
         <h4 class="card-title mt-3">LPR Camera In</h4>
            <p class="card-text mb-25">192.192.192.105</p>
            <?php

$url = '192.192.192.105';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if($httpcode>=200 && $httpcode<300){
  echo '<button class="btn btn-success mt-1 waves-effect waves-light">Connected</button>';
} else {
  echo '<button class="btn btn-danger mt-1 waves-effect waves-light">Disconnected</button>';
}

?></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border-success text-center bg-transparent">
        <div class="card-content">
          <img src="<?php echo base_url(); ?>app-assets/images/elements/webcam.png" alt="element 04" width="150" class="float-left mt-3 pl-2">
          <div class="card-body">
         <h4 class="card-title mt-3">LPR Camera Out</h4>
            <p class="card-text mb-25">192.192.192.105</p>
            <?php

$url = '192.192.192.105';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if($httpcode>=200 && $httpcode<300){
  echo '<button class="btn btn-success mt-1 waves-effect waves-light">Connected</button>';
} else {
  echo '<button class="btn btn-danger mt-1 waves-effect waves-light">Disconnected</button>';
}

?></button>
          </div>
        </div>
      </div>
    </div>
   <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border-success text-center bg-transparent">
        <div class="card-content">
          <img src="<?php echo base_url(); ?>app-assets/images/elements/printer.png" alt="element 04" width="150" class="float-left mt-3 pl-2">
          <div class="card-body">
         <h4 class="card-title mt-3">Printer</h4>
            <p class="card-text mb-25">192.192.192.105</p>
            <?php

$url = '192.192.192.105';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if($httpcode>=200 && $httpcode<300){
  echo '<button class="btn btn-success mt-1 waves-effect waves-light">Connected</button>';
} else {
  echo '<button class="btn btn-danger mt-1 waves-effect waves-light">Disconnected</button>';
}

?></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border-success text-center bg-transparent">
        <div class="card-content">
          <img src="<?php echo base_url(); ?>app-assets/images/elements/imac.png" alt="element 04" width="150" class="float-left mt-3 pl-2">
          <div class="card-body">
         <h4 class="card-title mt-3">PC Keluar</h4>
            <p class="card-text mb-25">192.192.192.105</p>
             <?php

$url = '192.192.192.105';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if($httpcode>=200 && $httpcode<300){
  echo '<button class="btn btn-success mt-1 waves-effect waves-light">Connected</button>';
} else {
  echo '<button class="btn btn-danger mt-1 waves-effect waves-light">Disconnected</button>';
}

?></button>
          </div>
        </div>
      </div>
    </div>
   <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card border-success text-center bg-transparent">
        <div class="card-content">
          <img src="<?php echo base_url(); ?>app-assets/images/elements/imac.png" alt="element 04" width="150" class="float-left mt-3 pl-2">
          <div class="card-body">
         <h4 class="card-title mt-3">PC Keluar</h4>
            <p class="card-text mb-25">192.192.192.105</p>
            <?php

$url = '192.192.192.125';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if($httpcode>=200 && $httpcode<300){
  echo '<button class="btn btn-success mt-1 waves-effect waves-light">Connected</button>';
} else {
  echo '<button class="btn btn-danger mt-1 waves-effect waves-light">Disconnected</button>';
}

?></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Background variants section end -->

        </div>
      </div>
    </div>

    <!-- Buynow Button-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <?php $this->load->view('include/script') ?>

</body>
<!-- END: Body-->

</html>