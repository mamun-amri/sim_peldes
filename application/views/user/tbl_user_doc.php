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
        <h2>Tbl_user List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Password</th>
		<th>Images</th>
		<th>Id User Level</th>
		<th>Is Aktif</th>
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
		
            </tr><?php
            foreach ($user_data as $user)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $user->nama ?></td>
		      <td><?php echo $user->email ?></td>
		      <td><?php echo $user->password ?></td>
		      <td><?php echo $user->images ?></td>
		      <td><?php echo $user->id_user_level ?></td>
		      <td><?php echo $user->is_aktif ?></td>
		      <td><?php echo $user->nik ?></td>
		      <td><?php echo $user->no_kk ?></td>
		      <td><?php echo $user->jenis_kelamin ?></td>
		      <td><?php echo $user->tempat_lahir ?></td>
		      <td><?php echo $user->tanggal_lahir ?></td>
		      <td><?php echo $user->status_menikah ?></td>
		      <td><?php echo $user->pekerjaan ?></td>
		      <td><?php echo $user->agama ?></td>
		      <td><?php echo $user->no_telp ?></td>
		      <td><?php echo $user->negara ?></td>
		      <td><?php echo $user->alamat ?></td>
		      <td><?php echo $user->rt ?></td>
		      <td><?php echo $user->rw ?></td>
		      <td><?php echo $user->desa ?></td>
		      <td><?php echo $user->kec ?></td>
		      <td><?php echo $user->kab ?></td>
		      <td><?php echo $user->prov ?></td>
		      <td><?php echo $user->kd_post ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>