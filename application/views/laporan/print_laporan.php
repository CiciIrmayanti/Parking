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
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal sticky-nav navbar-dark navbar-without-dd-arrow navbar-shadow menu-border"
            role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="<?php echo base_url() ?>html/ltr/horizontal-menu-template-dark/index.html">
                            <div class="brand-logo"></div>
                            <h2 class="brand-text mb-0">Vuexy</h2>
                        </a>
                    </li>
                    <li class="nav-item nav-toggle">
                        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                        <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a>
                    </li>
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
            <div class="content-header row"></div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">

                </section>
                <!-- Dashboard Ecommerce ends -->
                <div class="row card-title">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <div class="card">

                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <h1 class="text-center"><?php echo $title ?></h1>
                                    <h2 class="text-center mt-1"><?php echo $subtitle ?></h2>
                                    
                                    <div class="row ml-1">
                                        <div class="col-lg-9">
                                            <h5 class="ml-3 mt-2">Banyak Data : <?php echo $banyakdata?></h5>
                                            <h5 class="ml-3">Total Pemasukan : Rp. <?php echo $jumlahtotal?></h5>
                                        </div>
                                        <div class="col-lg-3">
                               
                                            <a href="<?php echo base_url('laporan/cetak/2020')?>" class="btn btn-warning ml-5 mt-2">Cetak PDF</a>
                                        </div>
                                    </div>
                                
                                    <table class="table table-bordered mt-1" style="width : 90%; margin-left: 5%; ">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>No Tiket</th>
                                                <th>Tanggal</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach ($datafilter as $row): ?>
                                            <tr class="text-center">

                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $row->no_tiket; ?></td>
                                                <td><?php echo $row->tanggal; ?></td>
                                                <td><?php echo $row->jenis_kendaraan; ?></td>
                                                <td><?php echo $row->total; ?></td>

                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
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
            </div>
        </div>
    </div>

</body>
<!-- END: Body-->

</html>