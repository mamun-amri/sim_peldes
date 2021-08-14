 <div class="page-header">
     <h1>Kelola Data Tbl_accortolak</h1>
 </div>
 <div class="row">
     <div class="col-xs-12">
         <div style="padding-bottom: 10px;">
             <!-- <?php echo anchor(site_url('accortolak/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
             <?php echo anchor(site_url('accortolak/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
             <?php echo anchor(site_url('accortolak/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
             <?php echo anchor(site_url('accortolak/pdf'), 'PDF', 'class="btn btn-primary"'); ?></div> -->
             <div class='col-md-3 pull-right'>
                 <form action="<?php echo site_url('accortolak/index'); ?>" class="form-inline" method="get">
                     <div class="input-group">
                         <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                         <span class="input-group-btn">
                             <?php
                                if ($q <> '') {
                                ?>
                                 <a href="<?php echo site_url('accortolak'); ?>" class="btn btn-default btn-sm">Reset</a>
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
                     <th>Penolak</th>
                     <th>Keterangan</th>
                     <th>Action</th>
                 </tr><?php
                        foreach ($accortolak_data as $accortolak) {
                        ?>
                     <tr>
                         <td width="10px"><?php echo ++$start ?></td>
                         <td><?php echo $accortolak->penolak ?></td>
                         <td><?php echo $accortolak->keterangan ?></td>
                         <td style="text-align:center" width="200px">
                             <?php
                                echo anchor(site_url('accortolak/read/' . $accortolak->id), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-primary btn-xs"');
                                echo '  ';
                                echo anchor(site_url('accortolak/update/' . $accortolak->id), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', 'class="btn btn-success btn-xs"');
                                ?>
                             <a href="<?= base_url('accortolak/delete/') . $accortolak->id ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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