<div class="page-header">
	<h1>Form Tbl_accortolak</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<form class="form-horizontal" action="<?php echo $action; ?>" method="post">
			<table class='table table-bordered'>

				<tr>
					<td width="200">Id Pengajuan<?php echo form_error('id') ?></td>
					<td><input type="text" name="id" readonly value="<?php echo $id; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">penolak<?php echo form_error('penolak') ?></td>
					<td><input type="text" class="form-control" name="penolak" readonly id="penolak" placeholder="Penolak" value="<?php echo $penolak; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">keterangan<?php echo form_error('keterangan') ?></td>
					<td><textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td> <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;<a href="<?php echo site_url('accortolak') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>