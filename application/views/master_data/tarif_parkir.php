<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<?php $this->load->view('include/head') ?>

    <body class="horizontal-layout horizontal-menu dark-layout 2-columns navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">
        <?php $this->load->view('include/header') ?>
            <div class="horizontal-menu-wrapper">
                <div class="header-navbar navbar-expand-sm navbar navbar-horizontal sticky-nav navbar-dark navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
                    <div class="navbar-header">
                        <ul class="nav navbar-nav flex-row">
                            <li class="nav-item mr-auto">
                                <a class="navbar-brand" href="

								<?php echo base_url() ?>html/ltr/horizontal-menu-template-dark/index.html">
                                    <div class="brand-logo"></div>
                                    <h2 class="brand-text mb-0">IZZI PARKING</h2>
                                </a>
                            </li>
                            <li class="nav-item nav-toggle">
                                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <?php $this->load->view('include/menu') ?>
                </div>
            </div>
            <div class="app-content content">
                <div class="content-overlay"></div>
                <div class="header-navbar-shadow"></div>
                <div class="content-wrapper">
                    <div class="content-header row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                    <h2 class="content-header-title float-left mb-0">Tarif Parkir</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-body">
                        <section id="basic-horizontal-layouts">
                            <div class="row match-height">
								
								
	                                <div class="col-md-6 col-12">
	                                    <div class="card" style="">

	                                        <div class="card-content">
	                                            <div class="card-body">
	                                               <form class="form form-horizontal" id="" action="" method="POST">
	                                                    <div class="form-body">
	                                                        <div class="row">
	                                                            
                                                                <div class="col-12">
                                                                    <div class="form-group row">
                                                                        <div class="col-md-12 mb-2">
                                                                            <h3>Pilih Jenis Kendaraan</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
	                                                            

	                                                            <div class="col-12">
	                                                                <div class="form-group row">
	                                                                    <div class="col-md-4">
	                                                                        <span>Jenis Kendaraan</span>
	                                                                    </div>

                                                                    <?php
                                                                    if($jenis_kendaraan == 'motor' || $jenis_kendaraan == ''){ ?>
                                                                     <div class="col-md-8">
	                                                                        <select name="jenis_kendaraan" id="jenis_kendaraan" required="" onchange="kendaraan();" class="form-control">
	                                                                            <option value="motor">Motor</option>
	                                                                            <option value="mobil">Mobil</option>
	                                                                        </select>
	                                                                    </div>
                                                                        <?php }else{ ?>
                                                                            <div class="col-md-8">
	                                                                        <select name="jenis_kendaraan" id="jenis_kendaraan" required="" onchange="kendaraan();" class="form-control">
                                                                            <option value="mobil">Mobil</option>
                                                                                <option value="motor">Motor</option>
	                                                                            
	                                                                        </select>
	                                                                    </div>
                                                                        <?php } ?>
	                                                                   

	                                                                </div>

	                                                            </div>

	                                                        </div>
	                                                    </div>
	                                                    </form>
	                                                    <div class="sidenav-overlay"></div>
	                                                    <div class="drag-target"></div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
								

                                    <?php foreach ($get_settingtarif as $get_settingtarif) {} ?>
	                                <div class="col-md-6 col-12">
	                                    <div class="card" style="">

	                                        <div class="card-content">
	                                            <div class="card-body">
	                                            	<form class="form form-horizontal" id="FormData" action="" method="POST">
	                                                <div class="form-body">
	                                                    <div class="row">
	                                                        
                                                            <div class="col-12">
	                                                            <div class="form-group row">
	                                                                <div class="col-md-8">
	                                                                    <input type="hidden" value="<?php echo $get_settingtarif['id_tarif']; ?>"  class="form-control" name="id_tarif">
	                                                                </div>
                                                                    
	                                                            </div>
	                                                        </div>
                                                            
                                                            
                                                            <div class="col-12">
	                                                            <div class="form-group row">
	                                                                <div class="col-md-4">
	                                                                    <span>Periode Maks</span>
	                                                                </div>
	                                                                <div class="col-md-8">
	                                                                    <select name="periode_maks" class="form-control">
                                                                        <option><?php echo $get_settingtarif['periode_maks']; ?></option>
	                                                                        <option>Forever</option>
	                                                                        <option>Fullday</option>
	                                                                        <option>Changeday</option>
	                                                                    </select>
	                                                                </div>
                                                                    
	                                                            </div>
	                                                        </div>

	                                                        <div class="col-12">
	                                                            <div class="form-group row">
	                                                                <div class="col-md-4">
	                                                                    <span>Tarif Hilang</span>
	                                                                </div>
	                                                                <div class="col-md-8">
	                                                                    <input type="number" value="<?php echo $get_settingtarif['tarif_hilang']; ?>" id="email-id" class="form-control" name="tarif_hilang">
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                        <div class="col-12">
	                                                            <div class="form-group row">
	                                                                <div class="col-md-4">
	                                                                    <span>Tarif Inap</span>
	                                                                </div>
	                                                                <div class="col-md-8">
	                                                                    <input type="number" value="<?php echo $get_settingtarif['tarif_inap']; ?>" id="email-id" class="form-control" name="tarif_inap">
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                        <div class="col-12">
	                                                            <div class="form-group row">
	                                                                <div class="col-md-4">
	                                                                    <span>Tarif Event</span>
	                                                                </div>
	                                                                <div class="col-md-8"> 
	                                                                    <input type="number" value="<?php echo $get_settingtarif['tarif_event']; ?>" id="email-id" class="form-control" name="tarif_event">
	                                                                </div>
	                                                            </div>
	                                                        </div>
	                                                        <div class="col-md-8 offset-md-4">
	                                                            <button type="submit" value="Submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Simpan</button>
	                                                            <!-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button> -->
	                                                        </div>
	                                                        </form>
	                                                        <div class="sidenav-overlay"></div>
	                                                        <div class="drag-target"></div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            
                                    <?php foreach ($tarif_siang as $tarif_siang) {} ?>
	                           
                                	<div class="col-md-6 col-12">
                                    <div class="card" style="">
                                        <div class="card-header">
                                            <h4 class="card-title">Tarif Siang</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                            	 <form class="form form-horizontal" id="tarif_siang" action="" method="POST">
                                                <div class="form-body">
                                                    <div class="row">

                                                    <div class="col-12">
	                                                            <div class="form-group row">
	                                                                <div class="col-md-8">
	                                                                    <input type="hidden" value="<?php echo $tarif_siang['id_tarif']; ?>"  class="form-control" name="id_tarif">
	                                                                </div>
                                                                    
	                                                            </div>
	                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Jam Mulai</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                <input type="number" min="1" max="24"  value="<?php echo $tarif_siang['jam_mulai']; ?>" id="email-id" class="form-control" name="jam_mulai">
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Jam Pertama</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                <input type="number" min="1" max="24"  value="<?php echo $tarif_siang['jam_pertama']; ?>" id="email-id" class="form-control" name="jam_pertama">
                                                                
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Jam Kedua</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                <input type="number" min="1" max="24"  value="<?php echo $tarif_siang['jam_kedua']; ?>" id="email-id" class="form-control" name="jam_kedua">
                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Jam Berikut</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="number" value="<?php echo $tarif_siang['jam_berikutnya']; ?>" id="email-id" class="form-control" name="jam_berikutnya">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Maksimum</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="number" id="email-id" value="<?php echo $tarif_siang['maksimum']; ?>" class="form-control" name="maksimum">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Tarif VIP</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="number" value="<?php echo $tarif_siang['vip']; ?>" id="email-id" class="form-control" name="vip">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <span>Tarif Valet</span>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <input type="number" value="<?php echo $tarif_siang['valet']; ?>" id="email-id" class="form-control" name="valet">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-8 offset-md-4">
                                                            <button type="submit" value="Submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Simpan</button>
                                                            <!-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button> -->
                                                        </div>
                                                        </form>
                                                        <div class="sidenav-overlay"></div>
                                                        <div class="drag-target"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                	</div>
                            	

                            	
                                    <?php foreach ($tarif_malam as $tarif_malam) {} ?>
	                           
                               <div class="col-md-6 col-12">
                               <div class="card" style="">
                                   <div class="card-header">
                                       <h4 class="card-title">Tarif Malam</h4>
                                   </div>
                                   <div class="card-content">
                                       <div class="card-body">
                                            <form class="form form-horizontal" id="tarif_malam" action="" method="POST">
                                           <div class="form-body">
                                               <div class="row">

                                                    <div class="col-12">
                                                        <div class="form-group row">               
                                                            <div class="col-md-8">
                                                                <input type="hidden" value="<?php echo $tarif_malam['id_tarif']; ?>"  class="form-control" name="id_tarif">
                                                            </div>
                                                        </div>
                                                    </div>

                                                   <div class="col-12">
                                                       <div class="form-group row">
                                                           <div class="col-md-4">
                                                               <span>Jam Mulai</span>
                                                           </div>
                                                           <div class="col-md-8">
                                                           <input type="number" min="1" max="24"  value="<?php echo $tarif_malam['jam_mulai']; ?>" id="email-id" class="form-control" name="jam_mulai">
                                                           
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-12">
                                                       <div class="form-group row">
                                                           <div class="col-md-4">
                                                               <span>Jam Pertama</span>
                                                           </div>
                                                           <div class="col-md-8">
                                                           <input type="number" min="1" max="24"  value="<?php echo $tarif_malam['jam_pertama']; ?>" id="email-id" class="form-control" name="jam_pertama">
                                                           
                                                           </div>
                                                       </div>

                                                   </div>
                                                   <div class="col-12">
                                                       <div class="form-group row">
                                                           <div class="col-md-4">
                                                               <span>Jam Kedua</span>
                                                           </div>
                                                           <div class="col-md-8">
                                                           <input type="number" min="1" max="24"  value="<?php echo $tarif_malam['jam_kedua']; ?>" id="email-id" class="form-control" name="jam_kedua">
                                                           
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-12">
                                                       <div class="form-group row">
                                                           <div class="col-md-4">
                                                               <span>Jam Berikut</span>
                                                           </div>
                                                           <div class="col-md-8">
                                                               <input type="number" value="<?php echo $tarif_malam['jam_berikutnya']; ?>" id="email-id" class="form-control" name="jam_berikutnya">
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-12">
                                                       <div class="form-group row">
                                                           <div class="col-md-4">
                                                               <span>Maksimum</span>
                                                           </div>
                                                           <div class="col-md-8">
                                                               <input type="number" id="email-id" value="<?php echo $tarif_malam['maksimum']; ?>" class="form-control" name="maksimum">
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-12">
                                                       <div class="form-group row">
                                                           <div class="col-md-4">
                                                               <span>Tarif VIP</span>
                                                           </div>
                                                           <div class="col-md-8">
                                                               <input type="number" value="<?php echo $tarif_malam['vip']; ?>" id="email-id" class="form-control" name="vip">
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-12">
                                                       <div class="form-group row">
                                                           <div class="col-md-4">
                                                               <span>Tarif Valet</span>
                                                           </div>
                                                           <div class="col-md-8">
                                                               <input type="number" value="<?php echo $tarif_malam['valet']; ?>" id="email-id" class="form-control" name="valet">
                                                           </div>
                                                       </div>
                                                   </div>

                                                   <div class="col-md-8 offset-md-4">
                                                       <button type="submit" value="Submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Simpan</button>
                                                       <!-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button> -->
                                                   </div>
                                                   </form>
                                                   <div class="sidenav-overlay"></div>
                                                   <div class="drag-target"></div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               </div>
                           
                            	
                            </div>
                        </section>
                    </div>
                </div>
<?php $this->load->view('include/script') ?>

                <script>
                    $("#FormData").on('submit', (function(e) {
                        e.preventDefault();

                        $.ajax({
                            url: ' <?php echo base_url('Master_data/simpan_edit_tarif/').$get_settingtarif['id_tarif']; ?>',
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

                   

                  
</script>

<script>
                    $("#tarif_siang").on('submit', (function(e) {
                        e.preventDefault();

                        $.ajax({
                            url: ' <?php echo base_url('Master_data/simpan_edit_siang/').$tarif_siang['id_tarif']; ?>',
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

                   

                  
</script>	

<script>
                    $("#tarif_malam").on('submit', (function(e) {
                        e.preventDefault();

                        $.ajax({
                            url: ' <?php echo base_url('Master_data/simpan_edit_malam/').$tarif_malam['id_tarif']; ?>',
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

                   

                  
</script>		
<script>
function kendaraan() {
    var e = document.getElementById("jenis_kendaraan");
    var jenis_kendaraan = e.options[e.selectedIndex].value;
    if(jenis_kendaraan == "motor"){
        window.location.replace("<?php echo base_url('Master_data/tarif_parkir/motor') ?>");
    }else{
        window.location.replace("<?php echo base_url('Master_data/tarif_parkir/mobil') ?>");
    }
}
</script>