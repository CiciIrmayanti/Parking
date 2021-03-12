 <center>
    <img id="imagepreview" src="<?php echo base_url().'upload/user.png' ?>" style="width:150px;height:auto;" />
    </center>
    <br>

	<form class="form form-horizontal" action="<?php echo base_url() ?>" method="POST" id="formtambah">
	    <div class="form-body">
	        <div class="row">

	        	 <div class="col-12">
	                <div class="form-group row">
	                    <div class="col-md-4">
	                        <span>Foto Profil</span>
	                    </div>
	                    <div class="col-md-8">
	                        <input type="file" accept="image/*" id="imgInp" name="profil_pic" class="form-control">
	                    </div>
	                </div>
	            </div>

	            <div class="col-12">
	                <div class="form-group row">
	                    <div class="col-md-4">
	                        <span>Username</span>
	                    </div>
	                    <div class="col-md-8">
	                        <input type="text" class="form-control" name="username" placeholder="Username">
	                    </div>
	                </div>
	            </div>

	            <div class="col-12">
	                <div class="form-group row">
	                    <div class="col-md-4">
	                        <span>Password</span>
	                    </div>
	                    <div class="col-md-8">
	                        <input type="text" class="form-control" name="password" placeholder="Password">
	                    </div>
	                </div>
	            </div>

	            <div class="col-12">
	                <div class="form-group row">
	                    <div class="col-md-4">
	                        <span>Nama Lengkap</span>
	                    </div>
	                    <div class="col-md-8">
	                        <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
	                    </div>
	                </div>
	            </div>

	            <div class="col-12">
	                <div class="form-group row">
	                    <div class="col-md-4">
	                        <span>Nomor Telepon</span>
	                    </div>
	                    <div class="col-md-8">
	                        <input type="text" class="form-control" name="notelp" placeholder="Nomor Telepon">
	                    </div>
	                </div>
	            </div>

	            <div class="col-12">
	                <div class="form-group row">
	                    <div class="col-md-4">
	                        <span>Email</span>
	                    </div>
	                    <div class="col-md-8">
	                        <input type="text" class="form-control" name="email" placeholder="Email">
	                    </div>
	                </div>
	            </div>
	            
	            <div class="col-md-8 offset-md-4">
	                <button type="submit" value="Submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">Submit</button>
	                <button type="reset" class="btn btn-outline-warning mr-1 mb-1 waves-effect waves-light">Reset</button>
	            </div>
	        </div>
	    </div>
	</form>

<script>
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

<script type="text/javascript">
     $(document).ready(function(){
 
        $('#formtambah').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                     url:'<?php echo base_url();?>Master_data/save_tambah_user',
                     type:"POST",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
                          Swal.fire(
							  'Sukses!',
							  'Data telah tersimpan',
							  'success'
							);

          location.reload();
                   }
                 });
            });
         
 
    });
</script>