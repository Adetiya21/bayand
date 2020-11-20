<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $('.pdft').addClass('active');
      $('.input-pdft').addClass('active');
  	});
  	
    function check_int(evt) {
      var charCode = ( evt.which ) ? evt.which : event.keyCode;
      return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    }

  	function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function (oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  };
</script>

<div class="pcoded-content">
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="feather icon-users bg-c-blue"></i>
					<div class="d-inline">
						<h5>Input Pendaftar Sewa</h5>
						<span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="page-header-breadcrumb">
					<ul class=" breadcrumb breadcrumb-title">
						<li class="breadcrumb-item">
							<a href="<?= site_url('admin/home') ?>"><i class="feather icon-home"></i></a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?= site_url('admin/pdft') ?>">Pendaftar</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?= site_url('admin/home/profil') ?>">Input Pendaftar</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="pcoded-inner-content">

		<div class="main-body">
			<div class="page-wrapper">

				<div class="page-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h5>Form Pendafataran</h5>	
									<div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>				
								</div>
								<div class="card-block">
									<!-- <form id="main" method="post" action="https://colorlib.com/" novalidate> -->
									<?= $this->session->flashdata('pesan'); ?>
			                        <?= $this->session->flashdata('error'); ?>
			                        <?php $arb = array('enctype' => "multipart/form-data", );?>
			                        <?= form_open('admin/pdft/proses',$arb); ?>
			                        
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Username</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="username">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Password</label>
											<div class="col-sm-10">
												<input type="password" class="form-control" name="password">
											</div>
										</div>
										<hr>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Nama Sesuai KTP</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="nama" selected>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Email</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" name="email">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">No.Telp</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" maxlength="13"  name="no_telp" onkeypress='return check_int(event)'>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Alamat</label>
											<div class="col-sm-10">
												<textarea class="form-control" name="alamat">
												</textarea> 
											</div>
										</div>
										<div class="form-group row">
											<label class="col-sm-2 col-form-label">Foto KTP</label>
											<div class="col-sm-10">
												<input id="uploadImage" class="form-control" type="file" name="foto_ktp" onchange="PreviewImage();" />
												<?= $this->session->flashdata('upload_error') ?>
												<div class="form-group" id="photo-preview"></div>
								                <!-- <div class="btn btn-default btn-file"> -->

								                <!-- </div> -->
								                <p class="help-block">Max. 2MB</p>
								                <img id="uploadPreview" style="width:300px; height:200px; border-radius: 10px; box-shadow: 0px 0px 3px 0px;" src="<?= base_url('assets/assets/img/ktp/') ?>" alt=" Foto KTP"/>
												<!-- <input type="file" class="form-control"> -->
											</div>
										</div>
										<hr>
										
										
										<div class="form-group row">
											<!-- <label class="col-sm-2"></label> -->
											<div class="col-sm-2">
												<button class="btn btn-primary m-b-0 btn-round" style="color: #fff"><i class="fa fa-edit"></i> Simpan Data</abutton>
											</div>
										</div>
									<?= form_close(); ?>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>

		<div id="styleSelector">
		</div>
	</div>
</div>