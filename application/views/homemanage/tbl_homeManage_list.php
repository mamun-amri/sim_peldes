 
<div class="page-header"><h1>Kelola Data Tbl_homeManage</h1></div>
<div class="row">
	<div class="col-xs-12">
	<div style="padding-bottom: 10px;">
	<?php echo anchor(site_url('homemanage/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
            <div class='col-md-3 pull-right'>
            <form action="<?php echo site_url('homemanage/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('homemanage'); ?>" class="btn btn-default btn-sm">Reset</a>
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
		<th>Aboutus</th>
		<th>Ourvision</th>
		<th>Ourmission</th>
		<th>Linkvideo</th>
		<th>Subuh</th>
		<th>Dzuhur</th>
		<th>Ashar</th>
		<th>Maghrib</th>
		<th>Isya</th>
		<th>Action</th>
            </tr><?php
            foreach ($homemanage_data as $homemanage)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $homemanage->aboutus ?></td>
			<td><?php echo $homemanage->ourvision ?></td>
			<td><?php echo $homemanage->ourmission ?></td>
			<td><?php echo $homemanage->linkvideo ?></td>
			<td><?php echo $homemanage->subuh ?></td>
			<td><?php echo $homemanage->dzuhur ?></td>
			<td><?php echo $homemanage->ashar ?></td>
			<td><?php echo $homemanage->maghrib ?></td>
			<td><?php echo $homemanage->isya ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('homemanage/read/'.$homemanage->hm_id),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-primary btn-xs"'); 
				echo '  '; 
				echo anchor(site_url('homemanage/update/'.$homemanage->hm_id),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-success btn-xs"'); 
				echo '  '; 
				echo anchor(site_url('homemanage/delete/'.$homemanage->hm_id),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-xs" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
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