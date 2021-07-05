<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PPDB Online - MAN 1 Pandeglang</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="center">
					<br><br><img src="<?php echo base_url();?>template/img/logo.png" alt="Logo" />
				</div>
				<div class="well">
					<h3 class="red smaller lighter">Pendaftaran Awal Sukses !!</h3>
						Silahkan Buka alamat email yang di daftarkan untuk melakukan tahap pendafataran berikutnya. Siapakan File Foto, Scan KK dan persayaratan lainnya.
						<br><center>
						<a href="<?php echo base_url() ?>auth" class="btn btn-primary"><i class="fa fa-key"></i> Login</a></center>
					<hr>
					Belum mendapatkan email dari kami, kirim ulang email.
					<br><center>
						<form action="<?=base_url()?>Home/resend_email" method="post">
						<input type="hidden" name="email" value="<?=$this->session->userdata('regemail')?>">
						<button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> Kirim Ulang</button>
						</form>
					</center>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
	</body>
</html>
