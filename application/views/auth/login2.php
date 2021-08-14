

<div class="login-container">
	<div class="center">
		<h1>
			<i class="ace-icon fa fa-building green"></i>
			<span class="red">SISTEM INFROMASI</span>
			<span class="white" id="id-text2">AKADEMIK</span>
		</h1>
		<h4 class="blue" id="id-company-text">© STIT AL-KHAIRIYAH</h4>
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
			</div>

			<div class="toolbar clearfix">
				
			</div>
		</div>
	</div>
	

	

				
			</div>
		</div>
	</div>

	
</div>