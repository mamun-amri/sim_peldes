 <div class="page-header">
     <h1>KELOLA USER</h1>
 </div>
 <div class="row">
     <div class="col-xs-12">
         <div style="padding-bottom: 10px;">
             <?php $level = $this->session->userdata('id_user_level');
                switch ($level) {
                    case '1':
                        echo anchor(site_url('user/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"');
                        break;
                    case '9':
                        echo anchor(site_url('user/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"');
                        break;
                    case '10':
                        echo anchor(site_url('user/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"');
                        break;
                    case '11':
                        echo anchor(site_url('user/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"');
                        break;
                }
                ?>
             <!-- <?php echo anchor(site_url('user/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
		<?php echo anchor(site_url('user/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?></div> -->
             <div class='col-md-3 pull-right'>
                 <form action="<?php echo site_url('user/index'); ?>" class="form-inline" method="get">
                     <div class="input-group">
                         <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                         <span class="input-group-btn">
                             <?php
                                if ($q <> '') {
                                ?>
                                 <a href="<?php echo site_url('user'); ?>" class="btn btn-default btn-sm">Reset</a>
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
                     <th>Email</th>
                     <th>Password</th>
                     <th>Images</th>
                     <th>Id User Level</th>
                     <th>RT/RW</th>
                     <th>Is Aktif</th>

                     <th>Action</th>
                 </tr><?php
                        foreach ($user_data as $user) {
                        ?>
                     <tr>
                         <td width="10px"><?php echo ++$start ?></td>
                         <td><?php echo $user->nama ?></td>
                         <td><?php echo $user->email ?></td>
                         <td><?php echo $user->password ?></td>
                         <td><?php echo $user->images ?></td>
                         <td>
                             <?php
                                $row = $this->db->get_where("tbl_user_level", ["id_user_level" => "$user->id_user_level"])->row();
                                echo $row->nama_level;
                                ?>
                         </td>
                         <td><?php echo $user->rt . "-" . $user->rw ?></td>
                         <td><?php echo $user->is_aktif ?></td>
                         <td style="text-align:center" width="200px">
                             <?php
                                echo anchor(site_url('user/read/' . $user->id_users), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-primary btn-xs"');
                                echo '  ';
                                echo anchor(site_url('user/update/' . $user->id_users), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-success btn-xs"');
                                echo '  ';
                                // echo anchor(site_url('user/delete/'.$user->id_users),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-xs" Delete','onclick="return confirm(\'Yakin Hapus Data?\')"'); 
                                $level = $this->session->userdata('id_user_level');
                                if ($level != 12) :
                                ?>
                                 <a href="<?= base_url('user/delete/') . $user->id_users ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                             <?php
                                endif;
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