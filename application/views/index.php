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
  <div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-start pb-0">
                <div class="avatar bg-rgba-primary p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-users text-primary font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1"><?php echo $pengunjung_hariini; ?></h2>
                <p class="mb-0">Pengunjung Hari Ini</p>
            </div>
            <div class="card-content">
                <div id="line-area-chart-1"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-start pb-0">
                <div class="avatar bg-rgba-success p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-credit-card text-success font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1"><?php echo $pengunjung_bulanini; ?></h2>
                <p class="mb-0">Pengunjung Bulan Ini</p>
            </div>
            <div class="card-content">
                <div id="line-area-chart-2"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-start pb-0">
                <div class="avatar bg-rgba-danger p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-shopping-cart text-danger font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1">Rp. <?php echo $pendapatan_bulanini; ?></h2>
                <p class="mb-0">Pendapatan Bulan Ini</p>
            </div>
            <div class="card-content">
                <div id="line-area-chart-3"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-header d-flex flex-column align-items-start pb-0">
                <div class="avatar bg-rgba-warning p-50 m-0">
                    <div class="avatar-content">
                        <i class="feather icon-package text-warning font-medium-5"></i>
                    </div>
                </div>
                <h2 class="text-bold-700 mt-1"><?php echo $kendaraan?></h2>
                <p class="mb-0">Kendaraan Didalam</p>
            </div>
            <div class="card-content">
                <div id="line-area-chart-4"></div>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
      <div class="col-lg-8 col-md-6 col-12">
          <div class="card">
              <div class="card-header d-flex justify-content-between align-items-end">
                  <h4 class="card-title">Revenue</h4>
                  <p class="font-medium-5 mb-0"><i class="feather icon-settings text-muted cursor-pointer"></i></p>
              </div>
              <div class="card-content">
                  <div class="card-body pb-0">
                      <div class="d-flex justify-content-start">
                          <div class="mr-2">
                              <p class="mb-50 text-bold-600">Hari Ini</p>
                              <h2 class="text-bold-400">
                                  <sup class="font-medium-1">Rp</sup>
                                  <span class="text-success">86,589</span>
                              </h2>
                          </div>
                          <div>
                              <p class="mb-50 text-bold-600">Kemarin</p>
                              <h2 class="text-bold-400">
                                  <sup class="font-medium-1">Rp</sup>
                                  <span>73,683</span>
                              </h2>
                          </div>

                      </div>
                      <div id="revenue-chart"></div>
                  </div>
              </div>
          </div>
      </div>
     
  </div>
 
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