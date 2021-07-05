<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PMB - STIT AL-KHAIRIYAH</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="shortcut icon" href="<?=base_url()?>favicon.ico" type="image/x-icon" />
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
					<br><br><img src="<?php echo base_url();?>assets/images/logos.png" alt="Logo" />
				</div>
				<div class="well">
					<h3 class="red smaller lighter">Pendaftaran SUkses !!</h3>
						Silahkan buka email yang anda daftarkan untuk membuat sandi dan melanjutkan ketahap berikutnya.
						<br>
						<br>
						<center>
						<a href="<?php echo base_url('auth') ?>" class="btn btn-primary"><i class="fa fa-key"></i> Login PMB</a></center>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
	</body>
</html>
