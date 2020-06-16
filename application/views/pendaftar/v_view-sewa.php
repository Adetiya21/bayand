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
					<i class="feather icon-file-text bg-c-blue"></i>
					<!-- <i class="fa fa-file-text-o bg-c-blue"></i> -->
					<div class="d-inline">
						<h5>Data Pengajuan Sewa</h5>
						<span>Berikut data pengajuan penyewaan teras Indomaret.</span>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="page-header-breadcrumb">
					<ul class=" breadcrumb breadcrumb-title">
						<li class="breadcrumb-item">
							<a href="<?= site_url('home') ?>"><i class="feather icon-home"></i></a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?= site_url('sewa') ?>">Sewa</a>
						</li>
						<li class="breadcrumb-item">
							<a href="<?= site_url('sewa/') ?>">Data Pengajuan Sewa</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="pcoded-inner-content"  style="margin-top: -20px;margin-bottom: -20px">
		<div class="main-body">
			<div class="page-wrapper">
			<div class="page-body">
				<!-- <button class="btn btn-danger btn-round" onclick="exportpdf()"><span class="fa fa-print"></span> cetak</button> -->
				<?php if ($sewa->status=="Diterima") { ?>
					<a href="<?= site_url('sewa/cetak/'.$sewa->id) ?>" class="btn btn-primary btn-round" onclick="ExportPdf()"><span class="fa fa-eye"></span> Form Perjanjian</a>
					<label class="label label-lg label-success" style="position:absolute; right: 30px">Status Pengajuan <?= $sewa->status ?></label>
				<?php } else if ($sewa->status=="Menunggu") { ?>
					<a href="<?= site_url('sewa/cetak/'.$sewa->id) ?>" class="btn btn-primary btn-round disabled" onclick=""><span class="fa fa-eye"></span> Form Perjanjian</a>
					<label class="label label-lg label-warning" style="position:absolute; right: 30px">Status Pengajuan <?= $sewa->status ?></label>
				<?php } else if ($sewa->status=="Selesai") { ?>
					<a href="<?= site_url('sewa/cetak/'.$sewa->id) ?>" class="btn btn-primary btn-round disabled" onclick=""><span class="fa fa-eye"></span> Form Perjanjian</a>
					<label class="label label-lg label-primary" style="position:absolute; right: 30px">Status Pengajuan <?= $sewa->status ?></label>
				<?php } else { ?>
					<a href="<?= site_url('sewa/cetak/'.$sewa->id) ?>" class="btn btn-primary btn-round disabled" onclick=""><span class="fa fa-eye"></span> Form Perjanjian</a>
					<label class="label label-lg label-primary" style="position:absolute; right: 30px">Status Pengajuan <?= $sewa->status ?></label>
				<?php }?>
				
			</div>
		</div></div>
	</div>
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-body">
					<div class="card">
						<div class="card-header">
							<h5>Informasi Pengajuan Sewa</h5>
							<div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>
						</div>
						<div class="card-block">
							<p style="text-align: justify;">Hai <b style="font-weight: bold"><?= $profil->nama ?></b>, jika pengajuan penyewaan anda sudah <b style="font-weight: bold">DITERIMA</b>, silahkan cetak <b style="font-weight: bold">FORM PERJANJIAN PENYEWAAN</b> dan bawa berkas tersebut kekantor kami. Terima kasih.
						</div>
					</div>
					<div id="myCanvas" class="card" >
						<div class="card-header">
							<h5>Data Pengajuan Sewa Teras Indomaret</h5>
							<div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>
							<!-- <h4 style="font-weight: bold;margin-bottom: 15px">DATA PERMOHONAN PENYEWAAN TERAS INDOMARET</h4>
							
							<hr style="height: 2px; background: #333; margin-top: 10px"> -->
						</div>
						<div class="card-block" style="padding-left: 50px;padding-right: 50px;padding-top: 30px;">
							<h4 class="sub-title" style="margin-bottom: 0;">PEMOHON SEWA</h4>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">Nama</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $profil->nama ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">Email</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $profil->email ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">No Telp</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $profil->no_telp ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -5px; font-size:0.9em;">Alamat Sekarang</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -5px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $profil->alamat ?></b></label>
								</div>
							<h4 style="margin-bottom: 0;" class="sub-title">OBJEK SEWA DAN FASILITAS</h4>
								<?php foreach ($toko->result() as $key) { if ($sewa->kd_toko == $key->kd_toko) { ?>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -20px; font-size:0.9em;">Nama Toko</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -20px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $key->nama_toko ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-top:-10px;margin-bottom: -20px; font-size:0.9em;">Alamat Toko</label>
									<label class="col-sm-8 col-form-label" style="margin-top:-10px;margin-bottom: -20px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $key->alamat_toko ?></b></label>
								</div>
								<?php }} ?>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-top: -10px; margin-bottom: -20px; font-size:0.9em;">Luas Yang di Gunakan</label>
									<label class="col-sm-8 col-form-label" style="margin-top: -10px; margin-bottom: -20px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $sewa->luas_sewa ?> meter</b></label>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-top: -10px;margin-bottom: -20px; font-size:0.9em;">Produk Yang di Jual</label>
									<label class="col-sm-8 col-form-label" style="margin-top: -10px;margin-bottom: -20px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $sewa->produk_jual ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-top: -10px; margin-bottom: -5px; font-size:0.9em;">Kebutuhan Fasilitas Listrik / Air</label>
									<label class="col-sm-8 col-form-label" style="margin-top: -10px; margin-bottom: -5px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $sewa->kebutuhan ?></b></label>
									<span style="font-size: 0.75em;margin-left: 15px;">*(listrik = maksimum 100 watt / air menyatu dengan fasilitas toko)</span>
								</div>
							<h4 style="margin-bottom: 0;" class="sub-title">PERIODE WAKTU dan HARGA</h4>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">Tanggal Mulai Sewa</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $sewa->tgl_sewa ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">Periode Sewa</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $sewa->jangka_sewa ?> Bulan</b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">Tanggal Habis Masa Sewa</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $sewa->tgl_selesai ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -25px; font-size:0.9em;">Biaya Sewa Perbulan</label>
									<?php foreach ($toko->result() as $key) { if ($sewa->kd_toko == $key->kd_toko) { ?>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -25px; font-size:0.9em;">: <b style="font-weight: bold;">Rp. <?= $key->harga_sewa ?></b></label>
									<?php }} ?>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -5px; font-size:0.9em;">Total Biaya Sewa</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -5px; font-size:0.9em;">: <b style="font-weight: bold;">Rp. <?= $sewa->total ?></b></label>
								</div>
							<h4 style="margin-bottom: 0;" class="sub-title">PRODUK JUAL</h4>
							<label class="col-form-label">
								Objek sewa akan digunakan oleh <b style="font-weight: bold"><?= $profil->nama ?></b> untuk keperluan berdagang :</label>
								<h3>□ <?= $sewa->produk_jual ?></h3>
							
							<h4 style="margin-top: 20px;margin-bottom: 0" class="sub-title">DIKONFIRMASI OLEH</h4>
							<?php foreach ($officer->result() as $key) {
							if ($sewa->id_officer==$key->nik) { ?>
								<label class="col-form-label">Officer yang mengkonfirmasi status penyewaan : <b style="font-weight: bold"><?= $key->nama ?></b>
							<?php }} ?>

							<h4 style="margin-top: 20px;" class="sub-title">LAIN-LAIN</h4>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group row">
										<div class="col-md-12">
											<label for="University-2" class="block">Foto KTP</label>
										</div>
										<div class="col-md-12">
											<img style="width:100%; border-radius: 10px; box-shadow: 0px 0px 3px 0px;" src="<?= base_url('assets/assets/img/ktp/') ?><?= $profil->foto_ktp ?>" alt=" Foto Gerobak"/>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										<div class="col-md-12">
											<label for="University-2" class="block">Foto Gerobak</label>
										</div>
										<div class="col-md-12">
											<img style="width:100%; border-radius: 10px; box-shadow: 0px 0px 3px 0px;" src="<?= base_url('assets/assets/img/gerobak/') ?><?= $sewa->foto_gerobak ?>" alt=" Foto Gerobak"/>
										</div>
									</div>
								</div>
							</div>
							
							
							<hr>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="styleSelector">
		</div>
	</div>
</div>
<script src="https://kendo.cdn.telerik.com/2017.2.621/js/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.2.621/js/jszip.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
<script type="text/javascript">
n =  new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = "Tanggal : "+ d + "/" + m + "/" + y; //Full date Bulan/tanggal/tahun
document.getElementById("date1").innerHTML = d + "/" + m + "/" + y; //Full date Bulan/tanggal/tahun
</script>
<script type="text/javascript">
     function ExportPdf(){ 
kendo.drawing
    .drawDOM("#myCanvas", 
    { 
        paperSize: "A4",
        margin: { left:"1cm", right:"1cm" ,top: "0", bottom: "0.2cm" },
        scale: 0.61,
        height: 800
    })
        .then(function(group){
        kendo.drawing.pdf.saveAs(group, "Form Perjanjian INDOMARET.pdf")
    });
}
</script>