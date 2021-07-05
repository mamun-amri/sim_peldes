<div class="login-container">
	<div class="center">
		<h1>
			<i class="ace-icon fa fa-building green"></i>
			<span class="red">SISTEM INFROMASI</span>
			<span class="white" id="id-text2">PELAYANAN DESA</span>
		</h1>
		<h4 class="blue" id="id-company-text">© KOTA SERANG</h4>
	</div>

	<div class="space-6"></div>

	<div class="position-relative">
	<?php
		if(!empty($this->session->flashdata('flash_message'))){
			echo"<div class='alert alert-danger alert-dismissable'>
				<i class='fa fa-remove'></i>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b>Failed!</b> ".$this->session->flashdata('flash_message').".
			</div>";
		}
		if(!empty($this->session->flashdata('flash_message2'))){
			echo"<div class='alert alert-success alert-dismissable'>
				<i class='fa fa-remove'></i>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<b>Success!</b> ".$this->session->flashdata('flash_message2').".
			</div>";
		}									
	?>
	<div id="login-box" class="login-box visible widget-box no-border">
		<div class="widget-body">
			<div class="widget-main">
				<h4 class="header blue lighter bigger">
					<i class="ace-icon fa fa-coffee green"></i>
					Masukkan Informasi Anda
				</h4>

				<div class="space-6"></div>
				<?php echo form_open('auth/'); ?>
					<fieldset>
						<label class="block clearfix">
							<span class="block input-icon input-icon-right">
								<input type="text" name="id_user" class="form-control" placeholder="Masukkan ID User" required/>
								<i class="ace-icon fa fa-envelope"></i>
							</span>
						</label>

						<label class="block clearfix">
							<span class="block input-icon input-icon-right">
								<input type="password" name="password" class="form-control" placeholder="Password" required />
								<i class="ace-icon fa fa-lock"></i>
							</span>
						</label>

						<div class="space"></div>

						<div class="clearfix">
							<label class="inline"></label>														
							<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
								<i class="ace-icon fa fa-key"></i>
								<span class="bigger-110">Login</span>
							</button>
						</div>
						<div class="space-4"></div>
					</fieldset>
				</form>
			</div><!-- /.widget-main -->

			<!-- <div class="toolbar clearfix">
				<div>
					<a href="#" data-target="#forgot-box" class="forgot-password-link">
						<i class="ace-icon fa fa-arrow-left"></i>
						Saya, Lupa Password
					</a>
				</div>
				<div>
					<a href="<?=base_url()?>home" class="btn btn-success btn-xs">
						Halaman Awal
						<i class="ace-icon fa fa-home"></i>
					</a>
				</div>
			</div> -->
		</div><!-- /.widget-body -->
	</div><!-- /.login-box -->
	<div id="forgot-box" class="forgot-box widget-box no-border">
		<div class="widget-body">
			<div class="widget-main">
				<h4 class="header red lighter bigger">
					<i class="ace-icon fa fa-key"></i>
					Buat Kata Password baru
				</h4>
				<div class="space-6"></div>
				<p>
					Masukkan email Anda dan untuk menerima instruksi
				</p>

				<?php echo form_open(site_url().'auth/forgot/'); ?>
					<fieldset>
						<label class="block clearfix">
							<span class="block input-icon input-icon-right">
								<input type="email" name="email" class="form-control" placeholder="Email" required />
								<i class="ace-icon fa fa-envelope"></i>
							</span>
						</label>

						<div class="clearfix">
							<button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
								<i class="ace-icon fa fa-lightbulb-o"></i>
								<span class="bigger-110">Kirim</span>
							</button>
						</div>
					</fieldset>
				</form>
			</div><!-- /.widget-main -->

			<div class="toolbar center">
				<a href="#" data-target="#login-box" class="back-to-login-link">
					Kembali untuk Login
					<i class="ace-icon fa fa-arrow-right"></i>
				</a>
			</div>
		</div><!-- /.widget-body -->
	</div><!-- /.forgot-box -->

	<div id="signup-box" class="signup-box widget-box no-border">
		<div class="widget-body">
			<div class="widget-main">
			<h4 class="header green lighter bigger">
				<i class="ace-icon fa fa-users blue"></i>
				New User Registration
			</h4>
			<div class="space-6"></div>
			<p> Enter your details to begin: </p>

			<?php echo form_open('auth/register'); ?>
			<fieldset>
				<label class="block clearfix">
					<span class="block input-icon input-icon-right">
					<input type="email" name="email" class="form-control" placeholder="Email" required />
						<i class="ace-icon fa fa-envelope"></i>
					</span>
				</label>
				<label class="block clearfix">
					<span class="block input-icon input-icon-right">
					<input type="text" name="full_name" class="form-control" placeholder="Full Name" required />
						<i class="ace-icon fa fa-user"></i>
					</span>
				</label>
				<div class="space-24"></div>
				<div class="clearfix">
				<button type="reset" class="width-30 pull-left btn btn-sm">
					<i class="ace-icon fa fa-refresh"></i>
					<span class="bigger-110">Reset</span>
				</button>

				<button type="submit" class="width-65 pull-right btn btn-sm btn-success">
					<span class="bigger-110">Register</span>
					<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
				</button>
				</div>
			</fieldset>
		</form>
	</div>

				<div class="toolbar center">
					<a href="#" data-target="#login-box" class="back-to-login-link">
						<i class="ace-icon fa fa-arrow-left"></i>
						Back to login
					</a>
				</div>
			</div>
		</div>
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