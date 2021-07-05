<div id="content">
  <div class="container">
    <div class="row margin-vert-30">
      <div class="col-md-12">
      <h2>Form Pendaftaran</h2><hr>
      <div class='alert alert-warning alert-dismissable'>
        <i class='fa fa-info'></i>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        Sebelum melakukan pendaftaran harap membaca pedoman pendaftaran terlebih dahulu dengan seksama untuk memahami alur pendafataran dan menghindari terjadinya kesalahan. Silahkan klik link ini untuk membaca <a target="_blank" href="<?=base_url("PANDUAN PENDAFTARAN PPDB ONLINE MAN 1 PANDEGLANG.pdf")?>" >Pedoman Pendaftaran</a>. Atau hubungi kami via Whatsapp di nomor : 0852-1714-5187.
      </div>
      <?php
        if(!empty($this->session->flashdata())){
          echo"<div class='alert alert-danger alert-dismissable'>
              <i class='fa fa-remove'></i>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <b>Failed!</b> ".$this->session->flashdata('flash_message').".
          </div>";
        }                 
      ?>
      <form class="form-horizontal" action="<?=base_url()?>home/pendaftaran" method="post" id="formku">
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Lengkap</label>
          <div class="col-sm-6">
            <input type="text" class="form-control required" name="full_name" id="full_name" placeholder="Nama Lengkap" value="" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alamat</label>
          <div class="col-sm-6">
            <textarea class="form-control required" name="alamat" id="alamat" placeholder="Alamat"></textarea>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jurusan</label>
          <div class="col-sm-6">
            <select name="jurusan" class="form-control required">
                  <option value="">-Pilih Jurusan-</option>
                <?php
                  foreach ($jurusan as $jur) {
                    echo"<option value='$jur->id_jurusan' >$jur->jurusan</option>";
                  }
                ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Jenis Kelamin</label>
          <div class="col-sm-6">
             <select name="kelamin" class="form-control required">
                  <option value="">-Pilih Jenis Kelamin-</option>
                  <option value="1">Laki-Laki</option>
                  <option value="2">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1">NISN</label>
          <div class="col-sm-6">
            <input type="text" class="form-control required" name="nisn" id="nisn" placeholder="NISN" value="" maxlength="15" />
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>
          <div class="col-sm-6">
            <input type="email" class="form-control required" name="email" id="email" placeholder="Email" value="" />
          </div>
        </div>
        <div class="clearfix form-actions">
          <div class="col-md-offset-3 col-md-9">            
              <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> Daftar</button>&nbsp; &nbsp; &nbsp;
              <button type="reset" class="btn btn-danger"><i class="fa fa-sign-out"></i> Batal</button>
          </div>
        </div>
      </form>
      <hr>
      </div>     
    </div>
  </div>                        
</div>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>
    <script>
    $(document).ready(function(){
      $("#formku").validate();
      $("#formku2").validate();
      $.validator.format(8);
    });
    </script> 
    <style type="text/css">
      label.error {
        color: red;
        padding-left: .5em;
      }
    </style>