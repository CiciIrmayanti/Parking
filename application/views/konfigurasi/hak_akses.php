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
              <a class="navbar-brand" href="
                <?php echo base_url() ?>html/ltr/horizontal-menu-template-dark/index.html">
                <div class="brand-logo"></div>
                <h2 class="brand-text mb-0">Vuexy</h2>
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
          <section id="basic-datatable">
            <div class="row card-title">
              <div class="col-lg-12 col-sm-12 col-12">
                <div class="card">
                  <div class="card-header">
                  <div class="row">
                       
                     
                    </div>
                  </div>
                  <div class="card-content">
                  <div class="card-body card-dashboard">
                  <div class="table-responsive">
                        <table id="DataKaryawan" class="table zero-configuration">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>ID User</th>
                              <th>Username</th>
                              <th>Nama</th>
                              <th>LEVEL</th>
                              <!-- <th>Foto Profil</th> -->
                              <th class='no-sort'>Action</th>
                            </tr>
                          </thead>
                          <tbody></tbody>
                        </table>
                      </div>
                  </div>
                    
                    </section>
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
    <!-- <footer class="pull-left footer"><p class="col-md-12"><hr class="divider">
Copyright &COPY; 2015 <a href="http://www.pingpong-labs.com">Gravitano</a></p></footer></div> -->
    <?php $this->load->view('include/script') ?>
    <script type="text/javascript" language="javascript" >
$(document).ready(function() {
var dataTable = $('#DataKaryawan').DataTable( {
"processing":true,
"serverSide": true,
"stateSave" : false,
"AutoWidth": true,
"oLanguage": {
"sSearch": "<i class='fa fa-search fa-fw'></i> Pencarian : ",
"sLengthMenu": "Display _MENU_ records per page",
"sInfo": "Menampilkan _START_ s/d _END_ dari<b>_TOTAL_ data</b>",
"sInfoFiltered": "(difilter dari _MAX_ total data)",
"sZeroRecords": "Pencarian tidak ditemukan",
"sEmptyTable": "Data kosong",
"sLoadingRecords": "Harap Tunggu...",
"oPaginate": {
"sPrevious": "<",
"sNext": ">"
}
},
"aaSorting": [[ 0, "asc" ]],
"columnDefs": [
{
"targets": 'no-sort',
"orderable": false,
}
],
"sPaginationType": "simple_numbers",
"iDisplayLength": 10,
"aLengthMenu": [[10, 20, 50, 100, 150], [10, 20, 50, 100, 150]],
"ajax":{
url :"<?php echo site_url('Konfigurasi/get_data_akses'); ?>",
type: "POST",
error: function(){
$(".my-grid-error").html("");
$("#my-grid").append('<tbody class="my-grid-error"><tr><th colspan="12">No data found in the server</th></tr></tbody>');
$("#my-grid_processing").css("display","none");
}
}
} );
});

$(document).on('click', '#hapus', function(e){
e.preventDefault();
var Link = $(this).attr('href');
var Url = $(this).data('url');

Swal.fire({
title: 'Are you sure?',
text: "You won't be able to revert this!",
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Yes, delete it!'
}).then((result) => {
if (result.value) {

$.ajax({
url: Link,
type: "POST",
cache: false,
dataType:'json',
success: function(data){
// $('#Notifikasi').html(data.pesan);
// $("#Notifikasi").fadeIn('fast').show().delay(3000).fadeOut('fast');
$('#DataKaryawan').DataTable().ajax.reload( null, false );
}
});
}

});

});

$(document).on('click', '#YesDelete', function(e){
e.preventDefault();
$('#GetModal').modal('hide');

$.ajax({
url: $(this).data('url'),
type: "POST",
cache: false,
dataType:'json',
success: function(data){
// $('#Notifikasi').html(data.pesan);
// $("#Notifikasi").fadeIn('fast').show().delay(3000).fadeOut('fast');
$('#DataKaryawan').DataTable().ajax.reload( null, false );
}
});
});

$(document).on('click', '#TambahKaryawan, #edit, #detail', function(e){
e.preventDefault();

if($(this).attr('id') == 'TambahKaryawan')
{

$('.modal-dialog').removeClass('modal-sm');
$('.modal-dialog').addClass('modal-lg');
$('#ModalHeader').html('Tambah');
}
if($(this).attr('id') == 'DetailKaryawan')
{
$('.modal-dialog').removeClass('modal-sm');
$('.modal-dialog').addClass('modal-lg');
$('#ModalHeader').html('Detail');
}
if($(this).attr('id') == 'EditKaryawan')
{
$('.modal-dialog').removeClass('modal-sm');
$('.modal-dialog').removeClass('modal-lg');
$('#ModalHeader').html('Edit');
}

$('#ModalContent').load($(this).attr('href'));
$('#GetModal').modal('open');
});

$(document).on('keyup', '.id_karyawan', function(){
$(this).parent().find('span').html("");

var Kode = $(this).val();
var Indexnya = $(this).parent().parent().index();
var Pass = 0;
$('#TabelTambahKaryawan tbody tr').each(function(){
if(Indexnya !== $(this).index())
{
var KodeLoop = $(this).find('td:nth-child(2) input').val();
if(KodeLoop !== '')
{
if(KodeLoop == Kode){
 Pass++;
}
}
}
});

if(Pass > 0)
{
$(this).parent().find('span').html("<font color='red'>Kode sudah ada</font>");
$('#SimpanTambahKaryawan').addClass('disabled');
}
else
{
$(this).parent().find('span').html('');
$('#SimpanTambahKaryawan').removeClass('disabled');

$.ajax({
url: "<?php echo site_url('Member/get_data_user'); ?>",
type: "POST",
cache: false,
data: "kodenya="+Kode,
dataType:'json',
success: function(json){
if(json.status == 0){
 $('#TabelTambahKaryawan tbody tr:eq('+Indexnya+') td:nth-child(2)').find('span').html(json.pesan);
 $('#SimpanTambahKaryawan').addClass('disabled');
}
if(json.status == 1){
 $('#SimpanTambahKaryawan').removeClass('disabled');
}
}
});
}
});

    </script>
  </body>
  <!-- END: Body-->
</html>