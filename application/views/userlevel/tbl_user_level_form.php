<div class="page-header"><h1>INPUT DATA LEVEL USER</h1></div>
<div class="row">
    <div class="col-xs-12">
        <form action="<?php echo $action; ?>" method="post">            
        <table class='table table-bordered'> 
            <tr>
                <td width='200'>Nama Level <?php echo form_error('nama_level') ?></td>
                <td><input type="text" class="form-control" name="nama_level" id="nama_level" placeholder="Nama Level" value="<?php echo $nama_level; ?>" /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                   <input type="hidden" name="id_user_level" value="<?php echo $id_user_level; ?>" /> 
    	           <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
    	           <a href="<?php echo site_url('userlevel') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                </td>
            </tr>
	   </table>
        </form>
    </div>
</div>