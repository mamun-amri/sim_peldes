 <div class="page-header">
 	<h1>KELOLA PENGAJUAN WARGA</h1>
 </div>
 <div class="row">
 	<div class="col-xs-12">
 		<div style="padding-bottom: 10px;">
 			<?php echo anchor(site_url('pengajuan/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
 			<!-- <?php echo anchor(site_url('pengajuan/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?> -->
 			<?php
				$level = $this->session->userdata('id_user_level');
				if ($level == 1 or $level == 9) {
					echo anchor(site_url('pengajuan/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"');
				}
				?>
 			<!-- <?php echo anchor(site_url('pengajuan/pdf'), 'PDF', 'class="btn btn-primary btn-sm"'); ?></div> -->
 			<div class='col-md-3 pull-right'>
 				<form action="<?php echo site_url('pengajuan/index'); ?>" class="form-inline" method="get">
 					<div class="input-group">
 						<input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
 						<span class="input-group-btn">
 							<?php
								if ($q <> '') {
								?>
 								<a href="<?php echo site_url('pengajuan'); ?>" class="btn btn-default btn-sm">Reset</a>
 							<?php
								}
								?>
 							<button class="btn btn-primary btn-sm" type="submit">Search</button>
 						</span>
 					</div>
 				</form>
 			</div>

 			<div class="row" style="margin-bottom: 10px">
 				<div class="col-md-4 text-center">
 					<div style="margin-top: 8px" id="message">
 						<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
 					</div>
 				</div>
 				<div class="col-md-1 text-right">
 				</div>
 				<div class="col-md-3 text-right">

 				</div>
 			</div>
 			<table class="table table-bordered table-striped table-hover" style="margin-bottom: 10px">
 				<tr>
 					<th>No</th>
 					<th>Nama</th>
 					<!-- <th>Email</th> -->
 					<th>Nik</th>
 					<!-- <th>No Kk</th>
		<th>Jenis Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th> -->
 					<th>Status Menikah</th>
 					<th>Pekerjaan</th>
 					<th>Agama</th>
 					<th>No Telp</th>
 					<!-- <th>Negara</th> -->
 					<!-- <th>Alamat</th> -->
 					<th>Rt</th>
 					<th>Rw</th>
 					<!-- <th>Desa</th>
		<th>Kec</th>
		<th>Kab</th>
		<th>Prov</th>
		<th>Kd Post</th> -->
 					<th>Pengajuan</th>
 					<th>Lampiran</th>
 					<!-- <th>Acc Rt</th>
		<th>Acc Rw</th>
		<th>Acc Kepdes</th> -->
 					<th>Action</th>
 				</tr><?php
						foreach ($pengajuan_data as $pengajuan) {
						?>
 					<tr>
 						<td width="10px"><?php echo ++$start ?></td>
 						<td><?php echo $pengajuan->nama ?></td>
 						<!-- <td><?php echo $pengajuan->email ?></td> -->
 						<td><?php echo $pengajuan->nik ?></td>
 						<!-- <td><?php echo $pengajuan->no_kk ?></td>
			<td><?php echo $pengajuan->jenis_kelamin ?></td>
			<td><?php echo $pengajuan->tempat_lahir ?></td>
			<td><?php echo $pengajuan->tanggal_lahir ?></td> -->
 						<td><?php echo $pengajuan->status_menikah ?></td>
 						<td><?php echo $pengajuan->pekerjaan ?></td>
 						<td><?php echo $pengajuan->agama ?></td>
 						<td><?php echo $pengajuan->no_telp ?></td>
 						<!-- <td><?php echo $pengajuan->negara ?></td>
			<td><?php echo $pengajuan->alamat ?></td> -->
 						<td><?php echo $pengajuan->rt ?></td>
 						<td><?php echo $pengajuan->rw ?></td>
 						<!-- <td><?php echo $pengajuan->desa ?></td>
			<td><?php echo $pengajuan->kec ?></td>
			<td><?php echo $pengajuan->kab ?></td>
			<td><?php echo $pengajuan->prov ?></td>
			<td><?php echo $pengajuan->kd_post ?></td> -->
 						<td><?php echo $pengajuan->pengajuan ?> </td>
 						<td><?php echo $pengajuan->lampiran ?> <a href="<?= base_url('pengajuan/view/') . $pengajuan->lampiran ?>" target="_blank" class="badge badge-primary badge-xs"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
 						<!-- <td><?php echo $pengajuan->acc_rt ?></td>
			<td><?php echo $pengajuan->acc_rw ?></td>
			<td><?php echo $pengajuan->acc_kepdes ?></td> -->
 						<td style="text-align:center" width="200px">
 							<?php
								echo anchor(site_url('pengajuan/read/' . $pengajuan->id), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-primary btn-xs"');
								echo '  ';
								echo anchor(site_url('pengajuan/update/' . $pengajuan->id), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-success btn-xs"');
								echo '  ';
								// echo anchor(site_url('pengajuan/delete/'.$pengajuan->id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-xs" Delete','onclick="return confirm(\'Yakin Hapus Data?\')"'); 
								?>
 							<a href="<?= base_url('pengajuan/delete/') . $pengajuan->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
 						</td>
 					</tr>
 				<?php
						}
					?>
 			</table>
 			<div class="row">
 				<div class="col-md-6">

 				</div>
 				<div class="col-md-6 text-right">
 					<?php echo $pagination ?>
 				</div>
 			</div>
 		</div>
 	</div>