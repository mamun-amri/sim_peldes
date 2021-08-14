<?php
if ($this->session->userdata('status_login') != "login") {
	redirect(base_url("auth"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>
		<?php
		if (isset($title)) {
			echo "$title";
		} else {
			echo "sim pelayanan desa";
		}
		?>
	</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link href="<?php echo base_url() ?>favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.custom.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/chosen.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datepicker2.css" />

	<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/ace-extra.min.js"></script>


</head>

<body class="skin-1">
	<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<div class="navbar-header pull-left">
				<a href="<?php echo base_url() ?>Dashboard" class="navbar-brand">
					<small>
						<i class="fa fa-users"></i>
						SISITEM INFORMASI PELAYANAN DESA
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="
								<?php
								if (empty($this->session->userdata('images'))) {
									echo "" . base_url() . "assets/foto_profil/people.png";
								} else {
									echo "" . base_url() . "assets/foto_profil/" . $this->session->userdata('images') . "";
								}
								?>" alt="<?php echo $this->session->userdata('nama'); ?>" />
							<span class="user-info">
								<small>Welcome,</small>
								<?php echo $this->session->userdata('nama'); ?>
							</span>
							<i class="ace-icon fa fa-caret-down"></i>
						</a>
						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

							<li>
								<a href="<?= base_url("User_profil") ?>">
									<i class="ace-icon fa fa-user"></i>
									Profile
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?php echo base_url() ?>auth/logout">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try {
				ace.settings.loadState('main-container')
			} catch (e) {}
		</script>

		<div id="sidebar" class="sidebar responsive ace-save-state">
			<script type="text/javascript">
				try {
					ace.settings.loadState('sidebar')
				} catch (e) {}
			</script>
			<?php $this->load->view('template/sidebar'); ?>

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>
		<div class="main-content">
			<div class="main-content-inner">

				<div class="breadcrumbs ace-save-state" id="breadcrumbs">
					<?php $this->load->view('template/breadcrumbs'); ?>
				</div>

				<div class="page-content">
					<div class="ace-settings-container" id="ace-settings-container">
						<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
							<i class="ace-icon fa fa-cog bigger-130"></i>
						</div>
						<div class="ace-settings-box clearfix" id="ace-settings-box">
							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<div class="pull-left">
										<select id="skin-colorpicker" class="hide">
											<option data-skin="skin-1" value="#222A2D">#222A2D</option>
											<option data-skin="no-skin" value="#438EB9">#438EB9</option>
											<option data-skin="skin-2" value="#C6487E">#C6487E</option>
											<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
										</select>
									</div>
									<span>&nbsp; Choose Skin</span>
								</div>
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
									<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
								</div>
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
									<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
								</div>
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
									<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
								</div>
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
									<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
								</div>
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
									<label class="lbl" for="ace-settings-add-container">
										Inside
										<b>.container</b>
									</label>
								</div>
							</div>
							<div class="pull-left width-50">
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
									<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
								</div>
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
									<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
								</div>
								<div class="ace-settings-item">
									<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
									<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<?php
							echo $contents;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-50">
						<span class="blue bolder">SISTEM INFORMASI PELAYANAN DESA</span>
						<?= $this->session->userdata('kode_st') ?> &copy; <?= date("Y") ?>
					</span>
				</div>
			</div>
		</div>
		<a href="<?php echo base_url() ?>#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div>

	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="<?php echo base_url() ?>assets/js/jquery-migrate-1.4.1.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/ace-elements.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/chosen.jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker2.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.maskedinput.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
	<script>
		$(document).ready(function() {
			$("#formku").validate();
			$("#formku2").validate();
			$.validator.format(8);
		});
	</script>
	<style type="text/css">
		label.error {
			color: red;
			padding-left: .5em;
		}
	</style>
	<script>
		$(document).ready(function() {
			$('#datepicker').datepicker({
				format: "yyyy-mm-dd"
			}).on('changeDate', function(ev) {
				$(this).datepicker('hide');
			});
			$('#datepicker2').datepicker({
				format: "yyyy-mm-dd"
			}).on('changeDate', function(ev) {
				$(this).datepicker('hide');
			});
			$('#datepicker3').datepicker({
				format: "yyyy-mm-dd"
			}).on('changeDate', function(ev) {
				$(this).datepicker('hide');
			});
			$('#datepicker4').datepicker({
				format: "yyyy-mm-dd"
			}).on('changeDate', function(ev) {
				$(this).datepicker('hide');
			});
			$('#datepicker5').datepicker({
				format: "yyyy-mm-dd"
			}).on('changeDate', function(ev) {
				$(this).datepicker('hide');
			});
		});
	</script>
	<script type="text/javascript">
		jQuery(function($) {

			if (!ace.vars['touch']) {
				$('.chosen-select').chosen({
					allow_single_deselect: true
				});
				$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
					if (event_name != 'sidebar_collapsed') return;
					$('.chosen-select').each(function() {
						var $this = $(this);
						$this.next().css({
							'width': $this.parent().width()
						});
					})
				});
			}
		});
	</script>
</body>

</html>