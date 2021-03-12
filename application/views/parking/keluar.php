<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<?php $this->load->view('include/head'); ?>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout dark-layout 2-columns navbar-floating footer-static pace-done menu-hide vertical-overlay-menu" data-open="click" data-col="1-columns" data-layout="dark-layout">

    <!-- BEGIN: Content-->
    <?php $this->load->view('include/header_vertical'); ?>

    <div class="app-content content">

        <div class="content-wrapper">
            <div class="content-header row">

            </div>
            <div class="content-body">
    
                <!-- CSS Classes -->
                <div class="row">
                    <div class="col-4">


                        <h5>Masuk</h5>
                        <img id="pic" src="<?php echo base_url('app-assets/images/nocam.png')?>"  alt="your image" style="width:100%;"  />


                    </div>


                    <div class="col-8">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first-name-vertical">NO. TIKET</label>
                                                <input   type="text" required=""  name="no_tiket" id="no_tiket" class="form-control form-control-lg"  placeholder="Kode Parking">
                                                <input type="hidden" id="id_kendaraan">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">NO. POL</label>
                                                <input  type="text" id="no_pol" class="form-control form-control-lg" name="plat_nomor" placeholder="No. Pol">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">JENIS KENDARAAN</label>
                                                <input  type="text" disabled id="jenis_kendaraan" class="form-control form-control-md" name="jenis_kendaraan" placeholder="Jenis Kendaraan">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Tanggal Masuk</label>
                                                <input  type="date" disabled id="tanggal" class="form-control form-control-md" name="tanggal_masuk" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Jam Masuk</label>
                                                <input  type="text" disabled name="jam_masuk" id="jam_masuk" class="form-control form-control-md" placeholder="">
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">Jam Keluar</label>
                                                <input  type="text" id="contact-info-vertical" class="form-control form-control-lg" name="jam_keluar" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date('h:i:s')?>" placeholder="Jam Keluar">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-info-vertical">BAYAR</label>
                                                <input  type="text" onkeyup="payment();" class="form-control form-control-lg" name="bayar" id="bayar" placeholder="Bayar">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6">
                                                    <button style="width: 100%"  class="btn btn-primary btn-md mr-1 mb-1 waves-effect waves-light" value="Take Snapshot" onClick="keluar();">Submit</button>
                                                </div>
                                                <div class="col-6">
                                                    <button style="width: 100%" type="reset" class="btn btn-outline-warning btn-md mr-1 mb-1 waves-effect waves-light">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <button style="width: 100%" id="bukagerbang" class="btn btn-success btn-md mr-1 mb-1 waves-effect waves-light">Buka Gerbang</button>

                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <h5>Keluar</h5>
                            <div id="my_camera"></div>
                            <input type="hidden"  name="image" id="foto_keluar" class="image-tag">
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card-header">
                                        <h4 class="card-title">Tarif Parkir</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="card-text">
                                            <input type="text" val='0' id='tarifparkir' placeholder="Rp.0" style="background: none; border: none; color: white; font-size: 50pt" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">

                                    <div class="card-content">
                                      <div class="card-header">
                                        <h4 class="card-title">Kembalian</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-text">
                                            <h1 id="tarifkembali" style="font-size: 50pt;"><b>Rp. 0</b></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div style="text-align: center;align-content: center;margin-left: 10px;margin-right: 10px;" class="row">
                            <div class="col-2">
                                <button style="width: 100%;" title="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F1</b><br>Bayar</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F2</b><br>Isi No. Pol</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F3</b><br>Isi No. Pol</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F4</b><br>Isi No. Pol</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F5</b><br>Refresh Aplikasi</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F6</b><br>Isi No. Pol</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" title="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F7</b><br>Bayar</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F8</b><br>Isi No. Pol</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F9</b><br>Isi No. Pol</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-outline-info mr-1 mb-1 waves-effect waves-light"><b>F10</b><br>Isi No. Pol</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-success mr-1 mb-1 waves-effect waves-light"><b>F11</b><br>Isi No. Pol</button>
                            </div>
                            <div class="col-2">
                                <button style="width: 100%;" onclick="" class="btn btn-warning mr-1 mb-1 waves-effect waves-light"><b>F12</b><br>Tiket Hilang</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--/ CSS Classes -->
            <!-- HTML Markup -->

            <!--/ HTML Markup -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<?php $this->load->view('include/script'); ?>


<!-- First, include the Webcam.js JavaScript Library -->
<script type="text/javascript" src="../assets/webcamjs/webcam.min.js"></script>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    Webcam.attach('#my_camera' );

    function keluar() {
        
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
        });

        let no_tiket        = $("#no_tiket").val();
        let id_kendaraan	= $("#id_kendaraan").val(); 
	    let jam_keluar 	    =" <?php echo date('H:i:s'); ?>";
		let foto_keluar     = $("#foto_keluar").val();
		let tanggal_keluar  = "<?php echo date('Y-m-d'); ?>";
		let total           = $("#tarifparkir").val();
		let bayar           = $("#bayar").val();
        let status          = 0;

        $.ajax({
                url:"<?php echo site_url('Parking/simpan_edit_keluar');?>",
                type:"POST",
                data: 'id_kendaraan='+id_kendaraan+'&no_tiket='+no_tiket+'&jam_keluar='+jam_keluar+'&tanggal_keluar='+tanggal_keluar+'&total='+total+'&bayar='+bayar+'&foto_keluar='+foto_keluar+'&status='+status,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    

                if(hasil=="") {
                   alert("Gagal");

               }
                else{
                    location.reload(); 

                }

                   //console.log(data);
               }
            });

        
    }

</script>

</body>
<!-- END: Body-->
<script>

    //keypress no_transaksi
    $("#no_tiket").keypress(function(){

        if(event.which == 13) {
            console.log('berhasil');
            var no_tiket = $("#no_tiket").val();
            
            $.ajax({
                url:"<?php echo site_url('Parking/cari_transaksi');?>",
                type:"POST",
                data:"no_tiket="+no_tiket,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    

                if(hasil=="") {
                   alert("Data tidak ditemukan");

               }
               else{
                    //    console.log(hasil);
                    data = hasil.split("|");
                    let jenis_kendaraan = data[2];
                    $('#id_kendaraan').val(data[5]);
                    $("#jam_masuk").val(data[0]);  
                    $("#tanggal").val(data[1]);
                    $("#jenis_kendaraan").val(data[2]);
                    $("#no_pol").val(data[4]);
                    $('#pic').attr('src',data[3]);
                    $("#pic_F").val( data[3]); 
                    $("#bayar").focus();
                    cekkodeparkir(jenis_kendaraan);


                }

                   //console.log(data);
               }
            }) //end ajax

        } //end event

    }) //end keypress

</script> 

<script type="text/javascript">
    shortcut.add("Ctrl+Shift+X",function() {
        alert("Hi there!");
    });

</script>

<script type="text/javascript">
    function imgError(image) {
        image.onerror = "";
        image.src = "http://190.190.190.200:8765/picture/1/current/?_=1570681840207";
        return true;
    }
</script>

<script type="text/javascript">
    var _img = document.getElementById('camera');
    var newImg = new Image;
    newImg.onload = function() {
        _img.src = this.src;
    }   
    newImg.src = 'http://190.190.190.200:8765/picture/1/current/?_=1570681840207';
</script>

<script type="text/javascript">
        function cekkodeparkir(jenis_kendaraan) {
        $.ajax({
                url:"<?php echo site_url('Parking/cari_tarif');?>",
                type:"POST",
                data:"jenis_kendaraan="+jenis_kendaraan,
                cache:false,
                success:function(hasil){
                //split digunakan untuk memecah string    

                if(hasil=="") {
                   alert("Data tidak ditemukan");

                }
                else{
                    //    console.log(hasil);
                    data = hasil.split("|");
                    <?php if (date('H') < 18) { ?>
                        $("#tarifparkir").val(data[1]);
                    <?php }else if(date('H') < 24 ){ ?>
                        $("#tarifparkir").val(data[1]);
                   <?php } ?>
                    
                }
            
                   //console.log(data);
               }
            }) 

       
    }

    function payment() {
        let tarif =  $("#tarifparkir").val();
        let bayar = $("#bayar").val();
        let hitung = bayar - tarif;
        document.getElementById("tarifkembali").innerHTML = hitung;
    }
</script>



</html>