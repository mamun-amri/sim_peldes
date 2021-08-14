<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_pengajuan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Nik</th>
		<th>No Kk</th>
		<th>Jenis Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Status Menikah</th>
		<th>Pekerjaan</th>
		<th>Agama</th>
		<th>No Telp</th>
		<th>Negara</th>
		<th>Alamat</th>
		<th>Rt</th>
		<th>Rw</th>
		<th>Desa</th>
		<th>Kec</th>
		<th>Kab</th>
		<th>Prov</th>
		<th>Kd Post</th>
		<th>Lampiran</th>
		<th>Acc Rt</th>
		<th>Acc Rw</th>
		<th>Acc Kepdes</th>
		
            </tr><?php
            foreach ($pengajuan_data as $pengajuan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengajuan->nama ?></td>
		      <td><?php echo $pengajuan->email ?></td>
		      <td><?php echo $pengajuan->nik ?></td>
		      <td><?php echo $pengajuan->no_kk ?></td>
		      <td><?php echo $pengajuan->jenis_kelamin ?></td>
		      <td><?php echo $pengajuan->tempat_lahir ?></td>
		      <td><?php echo $pengajuan->tanggal_lahir ?></td>
		      <td><?php echo $pengajuan->status_menikah ?></td>
		      <td><?php echo $pengajuan->pekerjaan ?></td>
		      <td><?php echo $pengajuan->agama ?></td>
		      <td><?php echo $pengajuan->no_telp ?></td>
		      <td><?php echo $pengajuan->negara ?></td>
		      <td><?php echo $pengajuan->alamat ?></td>
		      <td><?php echo $pengajuan->rt ?></td>
		      <td><?php echo $pengajuan->rw ?></td>
		      <td><?php echo $pengajuan->desa ?></td>
		      <td><?php echo $pengajuan->kec ?></td>
		      <td><?php echo $pengajuan->kab ?></td>
		      <td><?php echo $pengajuan->prov ?></td>
		      <td><?php echo $pengajuan->kd_post ?></td>
		      <td><?php echo $pengajuan->lampiran ?></td>
		      <td><?php echo $pengajuan->acc_rt ?></td>
		      <td><?php echo $pengajuan->acc_rw ?></td>
		      <td><?php echo $pengajuan->acc_kepdes ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>