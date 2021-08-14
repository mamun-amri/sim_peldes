<?= $this->session->flashdata('message') ?>
<div class="page-header">
	<h1>Form Tbl_user</h1>
</div>
<div class="row">
	<div class="col-xs-12">
		<form class="form-horizontal" action="<?php echo $action; ?>" enctype="multipart/form-data" method="post">
			<table class='table table-bordered'>
				<tr>
					<td width="200">nama<?php echo form_error('nama') ?></td>
					<td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">email<?php echo form_error('email') ?></td>
					<td><input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">password<?php echo form_error('password') ?></td>
					<td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">id_user_level<?php echo form_error('id_user_level') ?></td>
					<td><?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level, 'DESC') ?>
					</td>
				</tr>
				<tr>
					<td width="200">is_aktif<?php echo form_error('is_aktif') ?></td>
					<td><?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $is_aktif, array('class' => 'form-control')); ?>
					</td>
				</tr>
				<tr>
					<td width="200">nik<?php echo form_error('nik') ?></td>
					<td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nik" value="<?php echo $nik; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">no_kk<?php echo form_error('no_kk') ?></td>
					<td><input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No Kk" value="<?php echo $no_kk; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">jenis_kelamin<?php echo form_error('jenis_kelamin') ?></td>
					<td><?php echo form_dropdown('jenis_kelamin', array('lk' => 'LAKI LAKI', 'pr' => 'PEREMPUAN'), $jenis_kelamin, array('class' => 'form-control')); ?>
					</td>
				</tr>
				<tr>
					<td width="200">tempat_lahir<?php echo form_error('tempat_lahir') ?></td>
					<td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">tanggal_lahir<?php echo form_error('tanggal_lahir') ?></td>
					<td><input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">status_menikah<?php echo form_error('status_menikah') ?></td>
					<td><?php echo form_dropdown('status_menikah', array('belum' => 'BELUM', 'kawin' => 'KAWIN', 'cerai' => 'CERAI'), $status_menikah, array('class' => 'form-control')); ?>
					</td>
				</tr>
				<tr>
					<td width="200">pekerjaan<?php echo form_error('pekerjaan') ?></td>
					<td><input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">agama<?php echo form_error('agama') ?></td>
					<td><input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">no_telp<?php echo form_error('no_telp') ?></td>
					<td><input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">negara<?php echo form_error('negara') ?></td>
					<td><input type="text" class="form-control" name="negara" id="negara" placeholder="Negara" value="<?php echo $negara; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">rt<?php echo form_error('rt') ?></td>
					<td><input type="text" class="form-control" name="rt" id="rt" placeholder="Rt" value="<?php echo $rt; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">rw<?php echo form_error('rw') ?></td>
					<td><input type="text" class="form-control" name="rw" id="rw" placeholder="Rw" value="<?php echo $rw; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">desa<?php echo form_error('desa') ?></td>
					<td><input type="text" class="form-control" name="desa" id="desa" placeholder="Desa" value="<?php echo $desa; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">kec<?php echo form_error('kec') ?></td>
					<td><input type="text" class="form-control" name="kec" id="kec" placeholder="Kec" value="<?php echo $kec; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">kab<?php echo form_error('kab') ?></td>
					<td><input type="text" class="form-control" name="kab" id="kab" placeholder="Kab" value="<?php echo $kab; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">prov<?php echo form_error('prov') ?></td>
					<td><input type="text" class="form-control" name="prov" id="prov" placeholder="Prov" value="<?php echo $prov; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">kd_post<?php echo form_error('kd_post') ?></td>
					<td><input type="text" class="form-control" name="kd_post" id="kd_post" placeholder="Kd Post" value="<?php echo $kd_post; ?>" />
					</td>
				</tr>
				<tr>
					<td width="200">alamat<?php echo form_error('alamat') ?></td>
					<td><textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
					</td>
				</tr>
				<tr>
					<td width='200'>Foto Profile <?php echo form_error('images') ?></td>
					<td> <input type="file" name="images"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="hidden" name="id_users" value="<?php echo $id_users; ?>" /> <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>&nbsp; &nbsp; &nbsp;<a href="<?php echo site_url('user') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>