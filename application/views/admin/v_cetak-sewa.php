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
						<span>Cetak form permohonan sewa teras dengan tombol berwarna merah </span>
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
							<a href="<?= site_url('admin/sewa') ?>">Cetak Sewa</a>
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
				<?php if ($sewa->status=="Diterima") {?>
					<button class="btn btn-danger btn-round" onclick="ExportPdf()"><span class="fa fa-print"></span> Cetak Dokumen</button>
					<a class="btn btn-primary btn-round" href="<?= site_url('admin/sewa/view/'.$sewa->id) ?>"><span class="fa fa-history"></span> Kembali</a>
					<label class="label label-lg label-success" style="position:absolute; right: 30px">Status Pengajuan <?= $sewa->status ?></label>
				<?php } else { ?>
					<button class="btn btn-danger btn-round disabled" onclick=""><span class="fa fa-print"></span> Cetak Dokumen</button>
					<a class="btn btn-primary btn-round" href="<?= site_url('admin/sewa/view/'.$sewa->id) ?>"><span class="fa fa-history"></span> Kembali</a>
					<label class="label label-lg label-danger" style="position:absolute; right: 30px">Status Pengajuan <?= $sewa->status ?></label>
				<?php } ?>
				
				</div>
			</div>
		</div>
	</div>
	<div class="pcoded-inner-content">
		<div class="main-body">
			<div class="page-wrapper">
				<div class="page-body">
					<div id="myCanvas" class="card" style="padding-left: 50px;padding-right: 50px;padding-top: 30px;">
						<div class="card-header" align="center">
							<h4 style="font-weight: bold;margin-bottom: 15px">FORMULIR PERMOHONAN SEWA TERAS INDOMARET</h4>
							<span id="date"></span>
							<hr style="height: 2px; background: #333; margin-top: 10px">
						</div>
						<div class="card-block">
							<h4 class="sub-title">DATA YANG DIISI OLEH PEMOHON</h4>
								<?php foreach ($pdft->result() as $key) {
								if ($sewa->id_pendaftar==$key->id) { ?>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -20px">Nama Lengkap Sesuai KTP</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -20px">: <?= $key->nama ?></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -20px;">Alamat Sekarang</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -20px;">: <?= $key->alamat ?></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Nomor Telepon</label>
									<label class="col-sm-8 col-form-label">: <?= $key->no_telp ?></label>
								</div>
								<?php }} ?>
								<hr>
								<?php foreach ($toko->result() as $key) {
											                if ($sewa->kd_toko == $key->kd_toko) { ?>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -20px;">Toko Yang di Minati</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -20px;">: <?= $key->nama_toko ?></label>
								</div>
								<?php }} ?>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -20px;">Luas Yang di Gunakan</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -20px;">: <?= $sewa->luas_sewa ?></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -20px;">Kebutuhan Listrik / Air</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -20px;">: <?= $sewa->kebutuhan ?></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -20px;">Tanggal Mulai Sewa</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -20px;">: <?= $sewa->tgl_sewa ?></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -20px;">Periode Sewa</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -20px;">: <?= $sewa->jangka_sewa ?> Bulan</label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Biaya Sewa</label>
									<label class="col-sm-8 col-form-label">: Rp. <?= $sewa->total ?></label>
								</div>
								<hr style="margin-bottom: 30px;">
							<h4 class="sub-title">KETENTUAN SEWA TERAS</h4>
							<div class="row">
								<div class="col-sm-12" style="font-size: 0.9em;text-align: justify;">
									<ol>
										<li>Menjaga kebersihan dan kerapian lahan objek sewa demi kenyamanan bersama.</li>
										<li>Periode sewa akan dimulai tanggal 1 (awal bulan). Jika melewati tanggal 1 (awal bulan), periode dan hitungan sewa akan disesuaikan (Proposional).</li>
										<li>Penggunaan lahan dan listrik harus sesuai dengan perjanjian sewa. Jika penggunaan listrik melebihi yang disepakati, akan dikenakan biaya tambahan.</li>
										<li>Jika masa sewa habis, etalase atau gerobak dan perlengkapan penyewa harus segera diambil dengan menyerahkan Foto Copy KTP max 1 minggu dari tanggal berakhir sewa. apabila tidak segera diambil Indomaret akan segera menyingkirkan dari toko</li>
										<li>Pembayaran perpanjang sewa tahap 2 dan seterusnya diserahkan ke cash / tunai ke toko. Max tanggal 7.</li>
										<li>Pembayaran sewa teras Indomaret bisa melalui Rekening PT. INDOMARCO PRISMATAMA.<br>
											<ul>
											<li><b style="font-weight: bold;">● BCA	: 0292142089</b></li>
											<li><b style="font-weight: bold;">● Mandiri	:1460000882071</b></li>
											<li><b style="font-weight: bold;">● BRI	: 007101001086304</b></li>
											</ul>
										</li>
										<li>Standarisasi tampilan sewa :
											<ul><li>● Menggunakan Etalase Alumunium</li>
												<li>● <b style="font-weight: bold;">TIDAK</b> menggunakan <b style="font-weight: bold;">TERPAL</b></li></ul>
										</li>
										<li>Penyewa WAJIB patuh dan tunduk terhadap ketentuan sewa teras apabila lahan digunakan untuk kepentingan Indomaret, maka Indomaret berhak MEMUTUSKAN PERJANJIAN  sewa secara sepihak tanpa konpensasi apapun.</li>
										<li>Produk yang dijual harus sesuai dengan perjanjian, tidak boleh mengganti produk atau menambah produk tanpa persetujuan Indomaret.</li>
										<li>Tidak menyediakan meja dan kursi untuk keperluan makan (Take Away).</li>
										<li>Indomaret tidak bertanggung jawab atas segala kerusakan dan kehilangan barang-barang milik Mitra UMKM di lokasi objek yang disebabkan oleh peristiwa yang terjadi diluar kendali para pihak seperti kebakaran, huru-hara, bencana alam, dan kerusakan massa.</li>
									</ol>
									<div class="table-responsive">
										<table class="table-bordered" width="100%">
												<tr align="center">
													<th colspan="2" style="padding: 5px;">MENYETUJUI</th>
													<th>FOLLOW UP</th>
													<th>MENGETAHUI</th>
													<th>PEMOHON</th>
												</tr>
												<tr height="80px">
													<td></td><td></td><td></td><td></td><td></td>
												</tr>
												<tr align="center">
													<td>Dev. Manager</td>
													<td>Area Manager</td>
													<td>Tenant / Area Spv</td>
													<td>Toko (Stampel)</td>
													<td>
														<?php foreach ($pdft->result() as $key) {
														if ($sewa->id_pendaftar==$key->id) { echo $key->nama; }}
														?>
													</td>
												</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- ------------------ -->
						<hr>
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
									<label class="col-sm-12 col-form-label" style="margin-bottom: -15px; font-size:0.9em;">Dalam hal ini bertindak dalam kedudukannya selaku ADM, dari dan oleh karena itu, untuk dan atas nama serta sah dan berwenang mewakili <b style="font-weight: bold;">PT. INDOMARCO PRISMATAMA</b>.</label>
								</div>
								<u>Pihak Kedua</u>
								<?php foreach ($pdft->result() as $key) {
								if ($sewa->id_pendaftar==$key->id) {
								?>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">Nama</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $key->nama ?></b></label>
								</div>
								<div class="form-group row">
									<label class="col-sm-4 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">Alamat Sekarang</label>
									<label class="col-sm-8 col-form-label" style="margin-bottom: -35px; font-size:0.9em;">: <b style="font-weight: bold;"><?= $key->alamat ?></b></label>
								</div>
								<?php }} ?>
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
								<?php foreach ($pdft->result() as $key) {
								if ($sewa->id_pendaftar==$key->id) {
								?>
								Objek sewa akan digunakan oleh pihak kedua <b style="font-weight: bold"><?= $key->nama ?></b> untuk keperluan berdagang :</label>
								<?php }} ?>
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
									<?php foreach ($pdft->result() as $key) {
									if ($sewa->id_pendaftar==$key->id) {
									?>
									<br><br><br><br><?= $key->nama ?><br>
									<?php }} ?>
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
        margin: { left:"1cm", right:"1cm" ,top: "0.5cm", bottom: "0.2cm" },
        scale: 0.61,
        height: 800
    })
        .then(function(group){
        kendo.drawing.pdf.saveAs(group, "Form Permohonan dan Perjanjian INDOMARET.pdf")
    });
}
</script>