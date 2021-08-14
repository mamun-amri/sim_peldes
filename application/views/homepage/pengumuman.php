<div id="content">
	<div class="container">
		<div class="row margin-vert-30">
			<div class="col-md-12">
				<h1>Pengumuman hasil penerimaan peserta didik baru <br> Tahun Pelajaran <?=$this->session->userdata('th_akad')?></h1>
				<form action="<?php echo site_url('Home/pengumuman'); ?>" method="post">
					<p>
						<div class="col-md-5 col-sm-5 col-xs-12"><input type="search" name="cari" placeholder="Cari berdasrkan nama" class="form-control " value="<?=strtoupper($this->session->userdata('keyword'))?>" "> </div>
						<input type="submit" name="q" value="cari" class='btn btn-primary btn-flat btn-sm'>
					</p>
				</form>
				<table class="table table-bordered">
					<tr>
						<td>No</td>
						<td>Nomor Peserta</td>
						<td>Nama</td>
						<td>Asal Sekolah</td>
						<td>Jurusan</td>
					</tr>				
				<?php
				$start = intval($this->uri->segment(3));
				$no= $start + 1;
				$count = count($pengumuman);
				if($count > 0){
		        foreach ($pengumuman as $row) {
		        ?>
		        	<tr>
		        		<td><?=$no?></td>
		        		<td><?=$row->id_pendaftaran?></td>
		        		<td><?=$row->nama?></td>
		        		<td><?=$row->asal_sekolah?></td>
		        		<td><?=$row->jurusan?></td>
		        	</tr>
			 	<?php
			 		$no++;
				}
				}else{
					echo"
						<tr>
		        			<td colspan='5'>Data tidak ditemukan!!!</td>
		        		</tr>
					";
				}
				?>
				</table>
				<?php
					echo "".$this->pagination->create_links()."";
				?>
			</div>
		</div>
	</div>
</div>