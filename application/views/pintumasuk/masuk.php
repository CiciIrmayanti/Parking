<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<?php $this->load->view('include/head'); ?>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <!-- BEGIN: Header-->
       <?php $this->load->view('include/header'); ?>
        <!-- END: Header-->

        <div class="content-wrapper">
            <div class="content-header row">
             
            </div>
            <div class="content-body">
                <!-- Description -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">IZZI PARKING</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                              <img style="width: 100px;" src="<?php echo base_url('app-assets/images/ico/izzi parking.png') ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Description -->
                <!-- CSS Classes -->
              <div class="row">
                  <div class="col-4">
                                        
                          <iframe width="460px" height="265px" src="https://www.youtube.com/embed/bPeGC8-PQJg" frameborder="0" allow="accelerometer; autoplay; encrypted-media;"></iframe>
                         <!--  <video  autoplay="true" style="width: 460px;height: 265px;" id="video-webcam">
                              
                          </video> -->
     
                  </div>
                  <script type="text/javascript">
    // seleksi elemen video
    var video = document.querySelector("#video-webcam");

    // minta izin user
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    // jika user memberikan izin
    if (navigator.getUserMedia) {
        // jalankan fungsi handleVideo, dan videoError jika izin ditolak
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
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
                  <div class="col-8">
                     <div class="card">
                  
                    <div class="card-content">
                        <div class="card-body">
                          <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">INPUT KODE PARKING</label>
                                                            <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="Kode Parking">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="email-id-vertical">JENIS PELANGGAN</label>
                                                            
                                                            <select class="form-control">
                                                                <option>UMUM</option>
                                                                <option>TAMU</option>
                                                                <option>KARYAWAN</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">INPUT PLAT NOMOR</label>
                                                            <input type="text" id="contact-info-vertical" class="form-control form-control-lg" name="contact" placeholder="Plat Nomor">
                                                        </div>
                                                    </div>
                                                  <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
                                                    </div>
                                                </div>
                        </div>
                    </div>
                </div>
                  </div>
              </div>
             
                    
                 <div class="card">
                     <div class="row">
                    <div class="col-6">
                    <div class="card-header">
                        <h4 class="card-title">Tarif Parkir</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                              <h1 style="font-size: 50pt;"><b>Rp. 5000</b></h1>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-6">
                    
                    <div class="card-content">
                        <div class="card-body">
                            <div class="card-text">
                              
                              <table>
                                  <tr>
                                      <td><h3><b>IN </b></h3></td>
                                      <td><h3><b>&nbsp;:&nbsp;</b></h3></td>
                                      <td><h3><b>08:00PM</b></h3></td>
                                  </tr>
                                   <tr>
                                      <td><h3><b>OUT </b></h3></td>
                                      <td><h3><b>&nbsp;:&nbsp;</b></h3></td>
                                      <td><h3><b>09:00PM</b></h3></td>
                                  </tr>
                                   <tr>
                                      <td><h3><b>JUMLAH </b></h3></td>
                                      <td><h3><b>&nbsp;:&nbsp;</b></h3></td>
                                      <td><h3><b>1 JAM</b></h3></td>
                                  </tr>
                                    <tr>
                                      <td><h3><b>JUMLAH </b></h3></td>
                                      <td><h3><b>&nbsp;:&nbsp;</b></h3></td>
                                      <td><h3><b>1 JAM</b></h3></td>
                                  </tr>
                              </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div></div>

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

</body>
<!-- END: Body-->

</html>