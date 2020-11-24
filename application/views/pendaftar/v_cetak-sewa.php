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
						<h5>Form Sewa</h5>
						<span>Cetak form perjanjian sewa teras dengan tombol berwarna merah </span>
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
							<a href="<?= site_url('sewa/view') ?>">Preview Sewa</a>
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
				<?php if ($sewa->status=="Diterima") {?>
					<button class="btn btn-danger btn-round" onclick="ExportPdf()"><span class="fa fa-print"></span> Cetak Dokumen</button>
					<a class="btn btn-primary btn-round" href="<?= site_url('sewa/view/'.$sewa->id) ?>"><span class="fa fa-history"></span> Kembali</a>
					<label class="label label-lg label-success" style="position:absolute; right: 30px">Status Pengajuan <?= $sewa->status ?></label>
				<?php } else { ?>
					<button class="btn btn-danger btn-round disabled" onclick=""><span class="fa fa-print"></span> Cetak Dokumen</button>
					<a class="btn btn-primary btn-round" href="<?= site_url('sewa/view/'.$sewa->id) ?>"><span class="fa fa-history"></span> Kembali</a>
					<label class="label label-lg label-danger" style="position:absolute; right: 30px">Status Pengajuan <?= $sewa->status ?></label>
				<?php } ?>
				
			</div>
		</div></div>
	</div>
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-body">
					<div id="myCanvas" class="card" style="padding-left: 50px;padding-right: 50px;padding-top: 30px;">
						<div class="card-header" align="center">
							<h4 style="font-weight: bold;margin-bottom: 15px">PERJANJIAN KEMITRAAN DAN SEWA MENYEWA</h4>
							<span id="date"></span>
							<hr style="height: 2px; background: #333; margin-top: 10px">
						</div>
						<div class="card-block">
							<div class="form-group row" style="margin-top: -60px">
								<label class="col-sm-3 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">Nomor</label>
								<label class="col-sm-9 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">: <b style="font-weight: bold;">DEV/KSM/<?= $sewa->kd_toko ?>/PTK/XI/2019</b></label>
							</div>
							<div class="form-group row" style="margin-bottom: 8px">
								<label class="col-sm-3 col-form-label" style="font-size:0.9em;">Tempat / Tanggal</label>
								<label class="col-sm-9 col-form-label" style="font-size:0.9em;">: <b style="font-weight: bold;">Pontianak, <span id="date1"></span></b></label>
							</div>
							<h4 style="margin-bottom: 3px;" class="sub-title">PARA PIHAK</h4>
								<u>Pihak Pertama</u>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">Nama</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">: <b style="font-weight: bold;">Slamet Rianto</b></label>
									
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">Alamat Sekarang</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">: <b style="font-weight: bold;">Jl. Ya'm Sabran Ruko Anggrek blok H15-18</b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-form-label" style="margin-bottom: -15px; font-size:0.9em;">Dalam hal ini bertindak lam kedudukannya selaku ADM, dari dan oleh karena itu, untuk dan atas nama serta sah dan berwenang mewakili <b style="font-weight: bold;">PT. INDOMARCO PRISMATAMA</b>.</label>
								</div>
								<u>Pihak Kedua</u>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">Nama</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $profil->nama ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">Alamat Sekarang</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $profil->alamat ?></b></label>
								</div>
								<div class="form-group row"  style="margin-bottom: 10px;">
									<label class="col-sm-12 col-form-label" style=" font-size:0.9em;">Dalam hal ini bertindak untuk dan atas dirinya sendiri.</label>
								</div>
							<h4 style="margin-bottom: 0;" class="sub-title">OBJEK SEWA DAN FASILITAS</h4>
								<label class="col-form-label" style="font-size: 0.8em">
								Pihak pertama dengan ini menyewakan kepada pihak kedua dan pihak kedua dengan ini menerima sewa dari pihak pertama sebagaian area teras toko Indomaret berikut dan fasilitasnya sebagai berikut:</label>
								<?php foreach ($toko->result() as $key) { if ($sewa->kd_toko == $key->kd_toko) { ?>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-top:-10px;margin-bottom: -20px; font-size:0.9em;">Nama Toko</label>
									<label class="col-sm-8 col-form-label" style="margin-top:-10px;margin-bottom: -20px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $key->nama_toko ?></b></label>
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
							<h4 style="margin-bottom: 0;" class="sub-title">JANGKA WAKTU, HARGA, dan PEMBAYARAN</h4>
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
									<label class="col-sm-4 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">Biaya Sewa Perbulan</label>
									<?php foreach ($toko->result() as $key) { if ($sewa->kd_toko == $key->kd_toko) { ?>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -30px; font-size:0.9em;">: <b style="font-weight: bold;">Rp. <?= $key->harga_sewa ?></b></label>
									<?php }} ?>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -25px; font-size:0.9em;">Biaya Tambahan</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -25px; font-size:0.9em;">: <b style="font-weight: bold;">Rp. <?= $sewa->t_biaya ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -25px; font-size:0.9em;">Total Biaya Sewa</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -25px; font-size:0.9em;">: <b style="font-weight: bold;">Rp. <?= $sewa->total+$sewa->t_biaya ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -10px; font-size:0.9em;">Pembayaran</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -10px; font-size:0.9em;">: Dilakukan setiap termin kerja</label>
									<label class="col-sm-12 col-form-label" style="margin-bottom: -10px; font-size:0.8em;text-align: justify;">● Pembayaran termin pertama (1) dilakukan secara tunai / transfer. <br>● Pembayaran selanjutnya dilakukan pada masing-masing toko dengan cara pembayaran yang diterima oleh masing-masing toko. Untuk seluruh penerimaan uang tersebut, pihak pertama akan memberikan tanda penelusuran berupa kwitansi untuk pembayaran pertama dan struk dari toko untuk pembayaran selanjutnya.</label>
								</div>
							<h4 style="margin-bottom: 0;" class="sub-title">LAIN-LAIN</h4>
							<label class="col-form-label">
								Objek sewa akan digunakan oleh pihak kedua <b style="font-weight: bold"><?= $profil->nama ?></b> untuk keperluan berdagang :</label>
								<h3>□ <?= $sewa->produk_jual ?></h3>
							<label class="col-form-label" style="font-size:0.8em;text-align: justify;">
								Segala kegiatan & surat menyurat untuk pihak kedua akan ditujukan ke alamat Toko 
								<b style="font-weight: bold">
									<?php foreach ($toko->result() as $key) { if ($sewa->kd_toko == $key->kd_toko) { ?>
										<?= $key->alamat_toko ?>
									<?php }} ?>
								</b>.
								<br>Demikian penjanjian ini dibuat oleh dan antara kedua pihak dalam 2 rangkap, bermaterai ditandatangni oleh kedua belah pihak, dan masing-masing rangkap mempunyai kekuatan hukum yang sama. <br><br>Jika masa sewa habis, etalase atau gerobak dan perlengkapan penyewa harus segera diambil dengan menyerahkan Foto Copy KTP max 1 minggu dari tanggal berakhir sewa. Jika adanya kehilangan Indomaret tidak bertanggung jawab. <br><br>Dengan ditandatangani perjanjian ini, kedua pihak dengan ini setuju untuk tunduk dan mengikat diri pada semua ketentuan dan syarat yang tercantum dalam ketentuan Umum Perjanjian Kemitraan dan Sewa Menyewa yang terlampir.</label>
							<div class="row">
								<div class="col-sm-6" style="font-size: 0.9em;text-align: center;font-weight: bold">
									Pihak Pertama<br>PT.INDOMARCO PRISMATAMA
									<br><br><br><br>
									Slamet Rianto<br>(ODM OPR)
								</div>
								<div class="col-sm-6" style="font-size: 0.9em;text-align: center;font-weight: bold">
									Pihak Kedua<br>PEMILIK USAHA
									<br><br><br><br><?= $profil->nama ?><br>
									<div style="border: solid #000 1px; width: 80px;height:45px;position: absolute;bottom: 40px;left: 90px"><p>Materai 6000</p></div>
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