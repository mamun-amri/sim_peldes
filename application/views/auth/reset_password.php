<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>PMB - STIT AL-KHAIRIYAH</title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />
		<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<br><br><img src="<?php echo base_url();?>assets/images/logos.png" alt="Logo" />
							</div>
							<div class="space-6"></div>

							<div class="position-relative">
							
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Setel Ulang Kata Sandi
											</h4>

											<div class="space-6"></div>
											<p>
												Setel ulang kata sandi Anda untuk mulai masuk
											</p>

											<?php echo form_open(site_url().'auth/reset_password/token/'.$token); ?>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="passconf" class="form-control" placeholder="Repeat Password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>
													<?php echo form_hidden('id_users', $id_users);?>
													<div class="clearfix">
														<button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Reset</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<br>
												<br>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div>
							

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
