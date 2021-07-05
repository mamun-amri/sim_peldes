<div class="page-header">
	<h1>Form Tbl_homeManage</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<form class="form-horizontal" action="<?php echo $action; ?>" method="post">
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Aboutus <?php echo form_error('aboutus') ?></label>
				<div class="col-sm-9"><textarea class="form-control" rows="3" name="aboutus" id="aboutus" placeholder="Aboutus"><?php echo $aboutus; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ourvision <?php echo form_error('ourvision') ?></label>
				<div class="col-sm-9"><textarea class="form-control" rows="3" name="ourvision" id="ourvision" placeholder="Ourvision"><?php echo $ourvision; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ourmission <?php echo form_error('ourmission') ?></label>
				<div class="col-sm-9"><textarea class="form-control" rows="3" name="ourmission" id="ourmission" placeholder="Ourmission"><?php echo $ourmission; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Linkvideo <?php echo form_error('linkvideo') ?></label>
				<div class="col-sm-9"><input type="text" class="form-control" name="linkvideo" id="linkvideo" placeholder="contoh https://www.youtube.com/watch?v=0I8GmbDU7c4" value="<?php echo $linkvideo; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Subuh <?php echo form_error('subuh') ?></label>
				<div class="col-sm-9"><input type="text" class="form-control" name="subuh" id="subuh" placeholder="Subuh" value="<?php echo $subuh; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Dzuhur <?php echo form_error('dzuhur') ?></label>
				<div class="col-sm-9"><input type="text" class="form-control" name="dzuhur" id="dzuhur" placeholder="Dzuhur" value="<?php echo $dzuhur; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ashar <?php echo form_error('ashar') ?></label>
				<div class="col-sm-9"><input type="text" class="form-control" name="ashar" id="ashar" placeholder="Ashar" value="<?php echo $ashar; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Maghrib <?php echo form_error('maghrib') ?></label>
				<div class="col-sm-9"><input type="text" class="form-control" name="maghrib" id="maghrib" placeholder="Maghrib" value="<?php echo $maghrib; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Isya <?php echo form_error('isya') ?></label>
				<div class="col-sm-9"><input type="text" class="form-control" name="isya" id="isya" placeholder="Isya" value="<?php echo $isya; ?>" />
				</div>
			</div>
			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
					<input type="hidden" name="hm_id" value="<?php echo $hm_id; ?>" />
					<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;
					<a href="<?php echo site_url('homemanage') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
				</div>
			</div>
		</form>
	</div>
</div>