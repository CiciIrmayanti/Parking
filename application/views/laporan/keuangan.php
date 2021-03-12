<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php $this->load->view('include/head') ?>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu dark-layout 2-columns navbar-floating footer-static  " data-open="hover"
  data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">

  <!-- BEGIN: Header-->
  <?php $this->load->view('include/header') ?>
  <!-- END: Header-->


  <!-- BEGIN: Main Menu-->
  <div class="horizontal-menu-wrapper">
    <div
      class="header-navbar navbar-expand-sm navbar navbar-horizontal sticky-nav navbar-dark navbar-without-dd-arrow navbar-shadow menu-border"
      role="navigation" data-menu="menu-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand"
              href="<?php echo base_url() ?>html/ltr/horizontal-menu-template-dark/index.html">
              <div class="brand-logo"></div>
              <h2 class="brand-text mb-0">Vuexy</h2>
            </a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                data-ticon="icon-disc"></i></a></li>
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
      <div class="content-body">
        <!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">

        </section>
        <!-- Dashboard Ecommerce ends -->
        <h2>Laporan Keuangan</h2>
        <br>
        <div class="row">
          <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Filter dengan Tanggal</h4>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url();?>Laporan/filter" method="POST" target="_blank">

                <input type="hidden" name="nilaifilter" value="1">

                <span>Tanggal Awal</span>
                <input type="date" class="form-control mt-1 mb-2" name="tanggalawal" required="">

                <span>Tanggal Akhir</span>
                <input type="date" class="form-control mt-1 mb-2" name="tanggalakhir" required="">

                <input type="submit" value="Cari" class="btn btn-primary">
              </form>
            </div>
          </div>

          </div>

          <div class="col-lg-4">
            
          <div class="card">
            <div class="card-header">
              <h4>Filter dengan Bulan</h4>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url();?>Laporan/filter" method="POST" target="_blank">
                <input type="hidden" name="nilaifilter" value="2">

                <span>Pilih Tahun</span><br>
                <select name="tahun1" class="form-control mt-1 mb-2" required="">
                  <?php foreach ($tahun as $row): ?>
                  <option value="<?php echo $row->tahun?>"><?php echo $row->tahun?></option>
                  <?php endforeach ?>
                </select>

                <div class="row">
                  <div class="col-6">
                    <span>Bulan Awal</span><br>
                    <select name="bulanawal" class="form-control mt-1 mb-2" required="">
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>

                  <div class="col-6">
                    <span>Bulan Akhir</span>
                    <select name="bulanakhir" class="form-control mt-1 mb-2" required="">
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>
                </div>

                <input type="submit" value="Cari" class="btn btn-primary">

              </form>
            </div>
          </div>
          </div>

          <div class="col-lg-4">
          <div class="card">
            <div class="card-header">
              <h4>Filter dengan Tahun</h4>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url();?>Laporan/filter" method="POST" target="_blank">
                <input type="hidden" name="nilaifilter" value="3">
                
                <span>Pilih Tahun</span><br>
                <select name="tahun2" class="form-control mt-1 mb-5" required="">
                  <?php foreach ($tahun as $row): ?>
                    <option value="<?php echo $row->tahun?>"><?php echo $row->tahun?></option>
                  <?php endforeach ?>
                </select>
                
                <input type="submit" value="Cari" class="btn btn-primary mt-5">
              </form>
            </div>
          </div>
        </div>
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