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
        <h2>Tbl_accortolak List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Penolak</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($accortolak_data as $accortolak)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $accortolak->penolak ?></td>
		      <td><?php echo $accortolak->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>