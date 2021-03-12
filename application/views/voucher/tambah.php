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
                            <li class="nav-item mr-auto">
                                <a class="navbar-brand" href="<?php echo base_url() ?>html/ltr/horizontal-menu-template-dark/index.html">
                                    <div class="brand-logo"></div>
                                    <h2 class="brand-text mb-0">Vuexy</h2></a>
                            </li>
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
                    <div class="content-body">
                        <!-- Dashboard Ecommerce Starts -->
                        <section id="dashboard-ecommerce">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="col-md-6 col-12">
                                                <div class="card" style="height: 500px;">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Tambah Voucher</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <form class="form form-horizontal" method="post" id="FormData">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <div class="col-md-4">
                                                                                    <span>ID Voucher</span>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" name="id_voucher" placeholder="ID Voucher">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group row">
                                                                                <div class="col-md-4">
                                                                                    <span>Nominal</span>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" name="nominal" placeholder="Masukan Nominal">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="form-group col-md-8 offset-md-4">
                                                                          
                                                                        </div>
                                                                        <div class="col-md-8 offset-md-4">
                                                                            <button type="submit" value="Submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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

            <!-- <footer class="pull-left footer">
<p class="col-md-12">
<hr class="divider">
Copyright &COPY; 2015 <a href="http://www.pingpong-labs.com">Gravitano</a>
</p>
</footer>
</div> -->
            <?php $this->load->view('include/script') ?>
                <script>
                    $("#FormData").on('submit', (function(e) {
                        e.preventDefault();

                        $.ajax({
                            url: ' <?php echo base_url(); ?>Voucher/simpan_voucher',
                            type: "POST",
                            data: new FormData(this),
                            dataType: 'json',
                            contentType: false,
                            processData: false,
                            async: false,
                            cache: false,
                            beforeSend: function() {

                            },
                            success: function(data) {
                                if (data.status == 1) {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Sukses',
                                        text: 'Data Berhasil Disimpan'
                                    });
                                    document.getElementById("FormData").reset();

                                } else {
                                    swal("Terjadi Kesalahan!", "Coba Lagi", "error");
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) { // Ketika terjadi error
                                Swal.fire({
                                    type: 'error',
                                    title: 'Error',
                                    text: 'Data Gagal Disimpan'
                                });
                            }

                        });
                    }))

                    function submitForm() {
                        // Get the first form with the name
                        // Usually the form name is not repeated
                        // but duplicate names are possible in HTML
                        // Therefore to work around the issue, enforce the correct index
                        var frm = document.getElementsByName('contact-form')[0];
                        frm.submit(); // Submit the form
                        frm.reset(); // Reset all form data
                        return false; // Prevent page refresh
                    }

                    function readURL(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('#imagepreview').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(input.files[0]);
                        }
                    }

                    $("#imgInp").change(function() {
                        readURL(this);
                    });
                </script>

    </body>
    <!-- END: Body-->

</html>