<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>bower_components/jquery.steps/css/jquery.steps.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>assets/css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
      $('.sewa').addClass('active');
  	});


    function check_int(evt) {
      var charCode = ( evt.which ) ? evt.which : event.keyCode;
      return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
    }
</script>

<div class="pcoded-content">
	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="feather icon-edit bg-c-blue"></i>
					<div class="d-inline">
						<h5>Form Edit Sewa</h5>
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
							<a href="<?= site_url('admin/sewa') ?>">Sewa</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?= site_url('admin/sewa') ?>">Edit Sewa</a>
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
					<div class="card">
						<div class="card-header">
							<h5>Edit Pengajuan Sewa Teras</h5>
							<div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>
						</div>
						<div class="card-block">
							<div id="wizard">
								<section>
									<form class="wizard-form" id="example-advanced-form" action="<?= site_url('admin/sewa/prosesedit') ?>" method="post" enctype="multipart/form-data">
										<?php $arb = array('enctype' => "multipart/form-data", );?>
				                        <?= form_open('admin/sewa/prosesedit',$arb); ?>
										<h3> Data Diri Pendaftar </h3>
										<fieldset class="table table-responsive" style="width:100%;">
											<input type="hidden" name="id" value="<?= $sewa->id ?>">
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="userName-2" class="block">Nama Lengkap Sesuai KTP *</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<select class="form-control select2" name="id_pendaftar" style="width: 100%;"  onchange="changeValue2(this.value)">
														<option>Pilih Pendaftar Sewa</option>
														<?php 
														$jsArrayNama = "var dtPdft = new Array();\n";    
														foreach ($pdft->result() as $key) {
											                if ($sewa->id_pendaftar == $key->id) {
											                  echo '<option value="'.$key->id.'" selected>'.$key->nama.'</option>';
											                }else{
											                  echo '<option value="'.$key->id.'">'.$key->nama.'</option>';
											                }$jsArrayNama .= "dtPdft['" . $key->id . "'] = {
											                	email:'" . addslashes($key->email) . "',
											                	no_telp:'" . addslashes($key->no_telp) . "',
											                	alamat:'".addslashes($key->alamat)."',
											                	foto_ktp:'" . addslashes($key->foto_ktp) . "'
											                };\n"; ?>
										                <?php } ?>		
													</select>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="email-2" class="block">Email *</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<?php foreach ($pdft->result() as $key) {
														if ($sewa->id_pendaftar == $key->id) { ?>
													<input id="email" name="email" type="email" class="required form-control" value="<?= $key->email  ?>" readonly/>
													<?php }} ?>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="no_telp" class="block">No Telp *</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<?php foreach ($pdft->result() as $key) {
														if ($sewa->id_pendaftar == $key->id) { ?>
													<input id="no_telp" name="no_telp" type="number" class="form-control required phone" value="<?= $key->no_telp  ?>" readonly/>
													<?php }} ?>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="Country-2" class="block">Alamat*</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<?php foreach ($pdft->result() as $key) {
														if ($sewa->id_pendaftar == $key->id) { ?>
													<input id="alamat" name="alamat" type="text" class="form-control required" value="<?= $key->alamat ?>" readonly/>
													<?php }} ?>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="" class="block">Foto KTP*</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<?php foreach ($pdft->result() as $key) {
														if ($sewa->id_pendaftar == $key->id) { ?>
													<img id="foto_ktp" style="width:350px; height:210px; border-radius: 10px; box-shadow: 0px 0px 3px 0px;" alt=" Tidak Ada Foto KTP" src="<?= base_url('assets/assets/img/ktp/') ?><?= $key->foto_ktp ?>" />
													<?php }} ?>
												</div>
											</div>
										</fieldset>
										
										<h3> Pilih Toko Tempat Sewa </h3>
										<fieldset class="table table-responsive" style="width:100%;">
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="name-2" class="block">Toko Yang Diminati</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<select class="form-control select2"  name="kd_toko" style="width: 100%;"  onchange="changeValue(this.value)">
														<?php 
														$jsArray = "var dtToko = new Array();\n";    
														foreach ($toko->result() as $key) {
											                if ($sewa->kd_toko == $key->kd_toko) {
											                  echo '<option value="'.$key->kd_toko.'" selected>'.$key->nama_toko.'</option>';
											                }else{
											                  echo '<option value="'.$key->kd_toko.'">'.$key->nama_toko.'</option>';
											                }
											                $jsArray .= "dtToko['" . $key->kd_toko . "'] = {alamat_toko:'" . addslashes($key->alamat_toko) . "',harga_sewa:'".addslashes($key->harga_sewa)."'};\n"; ?>
										                <?php } ?>		
													</select>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="Country-2" class="block">Alamat Toko</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<?php foreach ($toko->result() as $key) {
														if ($sewa->kd_toko == $key->kd_toko) { ?>
													<input id="alamat_toko" name="alamat_toko" type="text" class="form-control required" value="<?= $key->alamat_toko; ?>" readonly>
													<?php }} ?>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="surname-2" class="block">Harga Sewa / Bulan</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<?php foreach ($toko->result() as $key) {
														if ($sewa->kd_toko == $key->kd_toko) { ?>
													<div class="input-group">
													<span class="input-group-prepend" id="basic-addon2">
													<label class="input-group-text">Rp.</label>
													</span>
													<input id="harga_sewa" name="harga_sewa" type="text" class="form-control required" value="<?= $key->harga_sewa ?>" readonly>
													<?php }} ?>
													</div>
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="date" class="block">Tanggal Mulai Sewa</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<input id="date" class="form-control required date-control" type="date" name="tgl_sewa" value="<?= $sewa->tgl_sewa ?>" />
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="phone-2" class="block">Jangka Waktu Sewa</label>
													<span class="block">*Bulan</span>
												</div>
												<div class="col-md-2 col-lg-2">
													<input id="jangka_sewa" name="jangka_sewa" type="number" class="form-control required phone" maxlength="3" onkeypress='return check_int(event)' onchange="changeValue1(this.value)" value="<?= $sewa->jangka_sewa ?>">
												</div>
											</div>	
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="surname-2" class="block">Tanggal Selesai</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<input id="jumlahbulan" type="hidden" name="tgl_selesai" >
													<input id="jumlahbulan1" type="text" class="form-control" value="<?= $sewa->tgl_selesai ?>" readonly>
												</div>
											</div>	
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="surname-2" class="block">Total Biaya</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<div class="input-group">
													<span class="input-group-prepend" id="basic-addon2">
													<label class="input-group-text">Rp.</label>
													</span>
													<input id="totbiaya" type="text" class="form-control" value="<?= $sewa->total ?>" readonly>
													</div>
													<input id="totalbiaya" name="total" type="hidden" class="form-control" value="<?= $sewa->total ?>" readonly>
													
												</div>
											</div>
											<hr>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="University-2" class="block">Kebutuhan Listrik/Air</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<select class="form-control select2"  name="kebutuhan">
														<?php if($sewa->kebutuhan=='Tidak'){
															echo '<option value="Tidak" selected>Tidak</option>
																<option value="Listrik">Listrik</option>
																<option value="Air">Air</option>
																<option value="Listrik dan Air">Listrik dan Air</option>';
														} elseif ($sewa->kebutuhan=='Listrik') {
															echo '<option value="Tidak">Tidak</option>
																<option value="Listrik" selected>Listrik</option>
																<option value="Air">Air</option>
																<option value="Listrik dan Air">Listrik dan Air</option>';
														} elseif ($sewa->kebutuhan=='Air') {
															echo '<option value="Tidak">Tidak</option>
																<option value="Listrik">Listrik</option>
																<option value="Air" selected>Air</option>
																<option value="Listrik dan Air">Listrik dan Air</option>';
														} elseif ($sewa->kebutuhan=='Listrik dan Air') {
															echo '<option value="Tidak">Tidak</option>
																<option value="Listrik">Listrik</option>
																<option value="Air">Air</option>
																<option value="Listrik dan Air" selected>Listrik dan Air</option>';
														} ?>
													</select>													
												</div>
											</div>
										</fieldset>
										<h3> Data Produk Jual </h3>
										<fieldset class="table table-responsive" style="width:100%;">
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="University-2" class="block">Produk Yang Dijual</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<input id="University-2" name="produk_jual" type="text" class="form-control required" value="<?= $sewa->produk_jual ?>">
												</div>
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="University-2" class="block">Foto Gerobak</label>
												</div>
												<div class="col-md-6 col-lg-4">
													<input id="uploadImage" class="form-control" type="file" name="foto_gerobak" onchange="PreviewImage();" value="<?= $sewa->foto_gerobak ?>" />
													<div class="form-group" id="photo-preview"></div>
									                <p class="help-block">Max. 2MB</p>
									                <img id="uploadPreview" style="width:520px; height:350px; border-radius: 10px; box-shadow: 0px 0px 3px 0px;" src="<?= base_url('assets/assets/img/gerobak/') ?><?= $sewa->foto_gerobak ?>" alt=" Foto Gerobak"/>
												</div>
											</div>
										</fieldset>
										<h3> Edit Status Pengajuan Sewa </h3>
										<fieldset class="table table-responsive" style="width:100%;">
											<div class="form-group row">
												<div class="col-md-12 col-lg-12">
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos perspiciatis eum consequuntur explicabo iusto nulla, aut nihil ipsam quod ipsa repellendus, qui iste expedita laborum perferendis placeat tempora maiores eligendi.
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos perspiciatis eum consequuntur explicabo iusto nulla, aut nihil ipsam quod ipsa repellendus, qui iste expedita laborum perferendis placeat tempora maiores eligendi.
												</div>	
											</div>
											<div class="form-group row">
												<div class="col-md-6 col-lg-4">
													<label for="University-2" class="block">Status Pengajuan</label>
												</div>
												<div class="col-md-6 col-lg-8">
													<select class="form-control select2"  name="status" style="width: 100%;">
														<?php if($sewa->status=='Menunggu'){
															echo '<option value="Menunggu" selected>Menunggu</option>
																<option value="Diterima">Diterima</option>
																<option value="Ditolak">Ditolak</option>
																<option value="Selesai">Selesai</option>';
														} elseif ($sewa->status=='Diterima') {
															echo '<option value="Menunggu">Menunggu</option>
																<option value="Diterima" selected>Diterima</option>
																<option value="Ditolak">Ditolak</option>
																<option value="Selesai">Selesai</option>';
														} elseif ($sewa->status=='Ditolak') {
															echo '<option value="Menunggu">Menunggu</option>
																<option value="Diterima">Diterima</option>
																<option value="Ditolak" selected>Ditolak</option>
																<option value="Selesai">Selesai</option>';
														} elseif ($sewa->status=='Selesai') {
															echo '<option value="Menunggu">Menunggu</option>
																<option value="Diterima">Diterima</option>
																<option value="Ditolak">Ditolak</option>
																<option value="Selesai" selected>Selesai</option>';
														} ?>	
													</select>
												</div>
											</div>
											<div class="form-group row">
												<!-- <label class="col-sm-2"></label> -->
												<div class="col-sm-2">
													<button class="btn btn-primary m-b-0" style="color: #fff"><i class="fa fa-edit"></i> Kirim</abutton>
												</div>
											</div>
										</fieldset>
										<?= form_close(); ?>
									</form>
								</section>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<div id="styleSelector">
</div>
	
<script type="text/javascript">
<?php echo $jsArrayNama; ?> 
    function changeValue2(item){ 
	    document.getElementById('email').value = dtPdft[item].email; 
	    document.getElementById('alamat').value = dtPdft[item].alamat; 
	    document.getElementById('no_telp').value = dtPdft[item].no_telp;
	    // document.getElementById('foto_ktp').value = dtPdft[item].foto_ktp;

	    document.getElementById("foto_ktp").src = '<?= base_url("assets/assets/img/ktp/") ?>'+dtPdft[item].foto_ktp;
	    // var img = document.createElement("img");
	    // img.src = '<?= base_url("assets/assets/img/ktp/") ?>'+dtPdft[item].foto_ktp;
	    
	    // // This next line will just add it to the <body> tag
	    // document.getElementById('foto_ktp').appendChild(img);
		};
</script>
<script type="text/javascript">
<?php echo $jsArrayToko; ?> 
    function changeValue(item){ 
	    document.getElementById('alamat_toko').value = dtToko[item].alamat_toko; 
	    document.getElementById('harga_sewa').value = dtToko[item].harga_sewa;
	};
</script>
<script type="text/javascript">
	function changeValue1(item) {
		var tanggal = document.getElementById("date").value.substr(8,2);
		var bulan = document.getElementById("date").value.substr(5,2);
		var tahun = parseInt(document.getElementById("date").value.substr(0,4));
		var js = parseInt($("#jangka_sewa").val());
		var bln = parseInt(bulan);
		var bln2 = bln + js;
		var bln = parseInt(bulan);
		var bln2 = bln + js;
		if (bln2>12) {
			bln2=bln2-12;
			tahun=tahun+1;
		}
		var strDtTransSt1 = tanggal + "/" + bln2 + "/" + tahun;
		var strDtTransSt = tahun+"-"+bln2+"-"+tanggal;
		$("#jumlahbulan").val(strDtTransSt);
		$("#jumlahbulan1").val(strDtTransSt1);
		
		var angka1  = parseInt($("#harga_sewa").val());
        var hasil = angka1 * js;
        $("#totalbiaya").val(hasil); 
        var	reverse = hasil.toString().split('').reverse().join(''),
		ribuan 	= reverse.match(/\d{1,3}/g);
		ribuan	= ribuan.join('.').split('').reverse().join('');

        $("#totbiaya").val(ribuan); 
	}
</script>

<script type="0c02f9e383c53a06f1a03b30-text/javascript" src="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="0c02f9e383c53a06f1a03b30-text/javascript" src="<?= base_url('assets/') ?>assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>

<script type="0c02f9e383c53a06f1a03b30-text/javascript" src="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>

<script type="0c02f9e383c53a06f1a03b30-text/javascript" src="<?= base_url('assets/') ?>bower_components/datedropper/js/datedropper.min.js"></script>

<script src="<?= base_url('assets/') ?>assets/pages/waves/js/waves.min.js" type="80e04729b0cb0dda322eaea3-text/javascript"></script>

<script src="<?= base_url('assets/') ?>bower_components/jquery.steps/js/jquery.steps.js" type="80e04729b0cb0dda322eaea3-text/javascript"></script>
<script src="<?= base_url('assets/') ?>bower_components/jquery-validation/js/jquery.validate.js" type="80e04729b0cb0dda322eaea3-text/javascript"></script>

<script type="80e04729b0cb0dda322eaea3-text/javascript" src="<?= base_url('assets/') ?>assets/pages/form-validation/validate.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>bower_components/datedropper/css/datedropper.min.css" />
<script src="<?= base_url('assets/') ?>assets/pages/forms-wizard-validation/form-wizard.js" type="80e04729b0cb0dda322eaea3-text/javascript"></script>

<script src="<?= base_url('assets/') ?>ajax.cloudflare.com/cdn-cgi/scripts/7089c43e/cloudflare-static/rocket-loader.min.js" data-cf-settings="80e04729b0cb0dda322eaea3-|49" defer=""></script></body>

<!-- Mirrored from colorlib.com//polygon/admindek/default/form-wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jun 2020 14:36:31 GMT -->
</html>
