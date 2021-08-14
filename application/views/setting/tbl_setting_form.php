
<div class="page-header"><h1>Form Tbl_setting</h1></div>
<div class="row">
	<div class="col-xs-12">
<form class="form-horizontal" action="<?php echo $action; ?>" method="post">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Setting <?php echo form_error('nama_setting') ?></label>
		<div class="col-sm-9"><input type="text" class="form-control" name="nama_setting" id="nama_setting" placeholder="Nama Setting" value="<?php echo $nama_setting; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Value <?php echo form_error('value') ?></label>
		<div class="col-sm-9"><input type="text" class="form-control" name="value" id="value" placeholder="Value" value="<?php echo $value; ?>" />
		</div>
	</div>
	 <div class="clearfix form-actions">
		<div class="col-md-offset-3 col-md-9">
			<input type="hidden" name="id_setting" value="<?php echo $id_setting; ?>" /> 
	    	<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;
	    	<a href="<?php echo site_url('setting') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
		</div>
	</div>
</form>
	</div>
</div>