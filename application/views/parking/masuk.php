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
                  

                    <div class="col-12">
                        <div class="card">
                            <form action="<?php echo base_url('Parking/save_masuk') ?>" method="POST">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical" class="mb-1">CAPTURE MASUK</label>
                                                    <div id="my_camera"></div>
                                                    <input type="hidden" name="image" class="image-tag">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">INPUT PLAT NOMOR</label>
                                                    <input required="" autofocus="" type="text" id="contact-info-vertical" class="form-control form-control-md" name="nopol" placeholder="Plat Nomor">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="email-id-vertical">JENIS KENDARAAN</label>

                                                    <select name="jenis_kendaraan" class="form-control form-control-md">
                                                        <option value="MOTOR">MOTOR</option>
                                                        <option value="MOBIL">MOBIL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button style="width: 100%" type="submit" class="btn btn-primary btn-md mr-1 mb-1 waves-effect waves-light" value="Take Snapshot" onClick="take_snapshot()">Simpan</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <button style="width: 100%" type="reset" class="btn btn-outline-warning btn-md mr-1 mb-1 waves-effect waves-light">Reset</button>
                                                    </div>
                                                </div>

                                            </div>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                               

                                <div class="col-12">

                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="card-text">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>No. Tiket</th>
                                                        <th>No. Pol</th>
                                                        <th>Jenis</th>
                                                        <th>Tgl Masuk</th>
                                                        <th>Jam Masuk</th>
                                                    </tr>
                                                    <?php foreach ($data_masuk as $row) {?>
                                                      <tr>
                                                        <td><?php echo $row['no_tiket'] ?></td>
                                                        
                                                        <td><?php echo $row['no_pol'] ?></td>
                                                        
                                                        <td><?php echo $row['jenis_kendaraan'] ?></td>
                                                        
                                                        <td><?php echo $row['tanggal'] ?></td>
                                                        
                                                        <td><?php echo $row['jam_masuk'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr>
                                                    
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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

        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
	</script>
	
</body>

<!-- First, include the Webcam.js JavaScript Library -->

    
<!-- END: Body-->

<!-- <script type="text/javascript">
        // seleksi elemen video
        var video = document.querySelector("#video-webcam");

        // minta izin user
        navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

        // jika user memberikan izin
        if (navigator.getUserMedia) {
            // jalankan fungsi handleVideo, dan videoError jika izin ditolak
            navigator.getUserMedia({
                video: true
            }, handleVideo, videoError);
        }

        // fungsi ini akan dieksekusi jika  izin telah diberikan
        function handleVideo(stream) {
            video.srcObject = stream;
        }

        // fungsi ini akan dieksekusi kalau user menolak izin
        function videoError(e) {
            // do something
            alert("Izinkan menggunakan webcam untuk demo!")
        }
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
    </script> -->
    <script type="text/javascript">
        function cekkodeparkir() {
            document.getElementById("tarifparkir").innerHTML = "Rp 5.000";
        }

        function payment() {

           document.getElementById("tarifparkir").innerHTML = "Rp 5.000";
       }
   </script>

   </html>