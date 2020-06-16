<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$('.home').addClass('active');
	});
</script>
<div class="pcoded-content">

	<div class="page-header card">
		<div class="row align-items-end">
			<div class="col-lg-8">
				<div class="page-header-title">
					<i class="feather icon-home bg-c-blue"></i>
					<div class="d-inline">
						<h5>Dashboard Pendaftar Sewa Indomaret</h5>
						<span>Selamat Datang <?= $this->session->userdata('nama')?></span>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="page-header-breadcrumb">
					<ul class=" breadcrumb breadcrumb-title">
						<li class="breadcrumb-item">
							<a href="<?= site_url('home') ?>"><i class="feather icon-home"></i></a>
						</li>
						<li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Home</a> </li>
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
						<div class="col-xl-3 col-md-6">
							<div class="card prod-p-card card-yellow">
								<div class="card-body">
									<div class="row align-items-center m-b-30">
										<div class="col">
											<h6 class="m-b-5 text-white" style="font-size: 1em;margin-left: -5px;">Total Menunggu</h6>
											<h3 class="m-b-0 f-w-700 text-white"><?= $menunggu ?> <span style="font-size: 0.6em">Pengajuan</span></h3>
										</div>
										<div class="col-auto">
											<i class="fas fa-hourglass-2 text-c-yellow f-18"></i>
										</div>
									</div>
									<!-- <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p> -->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card prod-p-card card-green">
								<div class="card-body">
									<div class="row align-items-center m-b-30">
										<div class="col">
											<h6 class="m-b-5 text-white">Total Diterima</h6>
											<h3 class="m-b-0 f-w-700 text-white"><?= $diterima ?> <span style="font-size: 0.6em">Pengajuan</span></h3>
										</div>
										<div class="col-auto">
											<i class="fas fa-spinner text-c-green f-18"></i>
										</div>
									</div>
									<!-- <p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p> -->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card prod-p-card card-red">
								<div class="card-body">
									<div class="row align-items-center m-b-30">
										<div class="col">
											<h6 class="m-b-5 text-white">Total Ditolak</h6>
											<h3 class="m-b-0 f-w-700 text-white"><?= $ditolak ?> <span style="font-size: 0.6em">Pengajuan</span></h3>
										</div>
										<div class="col-auto">
											<i class="fas fa-close text-c-red f-18"></i>
										</div>
									</div>
									<!-- <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p> -->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card prod-p-card card-blue">
								<div class="card-body">
									<div class="row align-items-center m-b-30">
										<div class="col">
											<h6 class="m-b-5 text-white">Total Selesai</h6>
											<h3 class="m-b-0 f-w-700 text-white"><?= $selesai ?> <span style="font-size: 0.6em">Pengajuan</span></h3>
										</div>
										<div class="col-auto">
											<i class="fas fa-check text-c-blue f-18"></i>
										</div>
									</div>
									<!-- <p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p> -->
								</div>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="card">
								<div class="card-header">
									<h5>Profil</h5>
									<?php if ($profil->status=='Menunggu') {
										echo '<button class="btn btn-warning btn-round" style="position: absolute;right: 20px">';
										echo $profil->status; echo'</button>';
									} else if ($profil->status=='Diterima') {
										echo '<button class="btn btn-success btn-round" style="position: absolute;right: 20px">';
										echo $profil->status; echo'</button>';
									} ?>									
								</div>
								<div class="card-block">
									<p style="text-align: justify;">Hai <b style="font-weight: bold"><?= $profil->nama ?></b>, selamat datang di website penyewaan teras Indomaret. 
									<?php if ($profil->status=='Menunggu') { ?>
										Sebagai informasi saat ini status akun anda adalah <u style="font-weight: bold;">Sedang Menunggu</u> persetujuan dari pihak indomaret yang bertugas, silahkan <u style="font-weight: bold;">Lengkapi Profil Data Diri</u> anda agar disegera di proses secepatnya. Terima kasih.</p>
									<?php } else if ($profil->status=='Diterima') { ?>
										Sebagai informasi saat ini status akun anda sudah <u style="font-weight: bold;">Diterima</u> dan anda sudah dapat melakukan pengajuan penyewaan teras indomaret. Terima kasih.</p> 
									<?php } ?>
								</div>
							</div>
							
							<!-- <div class="card">
								<div class="card-header">
									<h5>Data Profil</h5>
									<div class="card-header-right"> <ul class="list-unstyled card-option"> <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li> <li><i class="feather icon-maximize full-card"></i></li> <li><i class="feather icon-minus minimize-card"></i></li> <li><i class="feather icon-refresh-cw reload-card"></i></li> <li><i class="feather icon-trash close-card"></i></li> <li><i class="feather icon-chevron-left open-card-option"></i></li> </ul> </div>
								</div>
								<div class="card-block" data-intro="This is Card body" data-step="2" data-hint="Hello step osne!">
									
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="styleSelector">
</div>