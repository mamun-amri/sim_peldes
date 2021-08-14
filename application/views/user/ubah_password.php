<div class="page-header"><h1>Profil user</h1></div>
<div class="row">
    <div class="col-xs-12">
        <?php
            if(!empty($this->session->flashdata('flash_message1'))){
                echo"<div class='alert alert-danger alert-dismissable'>
                        <i class='fa fa-info-circle'></i>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <b>Failed!</b> ".$this->session->flashdata('flash_message1').".
                </div>";
            }elseif(!empty($this->session->flashdata('flash_message2'))){                    
                echo"<div class='alert alert-success alert-dismissable'>
                        <i class='fa fa-info-circle'></i>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <b>Success!</b> ".$this->session->flashdata('flash_message2').".
                </div>";
            }                           
        ?>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="myform">
            <table class='table table-bordered'>        
                <tr>
                    <td width='200'>ID User <?php echo form_error('id_users') ?></td>
                    <td><input type="text" class="form-control" name="id_users" id="id_users" placeholder="Full Name" value="<?php echo $id_users; ?>" readonly/></td>
                </tr>
                <tr>
                    <td width='200'>Nama <?php echo form_error('full_name') ?></td>
                    <td><input type="text" class="form-control required" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" /></td>
                </tr>
                <tr>
                    <td width='200'>Upload Foto <?php echo form_error('images') ?></td>
                    <td><input type="file" class="form-control" name="images" id="images" /></td>
                </tr>
                <tr>
                    <td width='200' colspan="2">Insert/ Update Password <input type="checkbox" id="update_pass" name="update_pass" value="1"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table class='table table-bordered'>
                            <tr style="display: none;" id="fpass">
                                <td width='200'>Password <?php echo form_error('password') ?></td>
                                <td><input type="password" class="form-control " name="password" id="password" placeholder="Password" value="" size="50" /></td>
                            </tr>
                            <tr style="display: none;" id="fpass2">
                                <td width='200'>Konfirmasi Password <?php echo form_error('password') ?></td>
                                <td><input type="password" class="form-control " name="password_again" id="password_again" placeholder="Password" value="" size="50"/></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="hidden" name="id_users" value="<?php echo $id_users; ?>" /> 
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                        <a href="<?php echo site_url('user') ?>" class="btn btn-sm btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                    </td>
                </tr>
            </table>
        </form> 
    </div>
</div>
<script>
    $('#update_pass').on('click', function(){
        if(document.getElementById("update_pass").checked == true){
            document.getElementById("fpass").style.display = 'block';
            document.getElementById("fpass2").style.display = 'block';
        }else{
            document.getElementById("fpass").style.display = 'none';
            document.getElementById("fpass2").style.display = 'none';
        } 
    });
    // function update_pass(){
    //     if(document.getElementById("update_pass").checked == true){
    //         document.getElementById("fpass").style.display = 'block';
    //         document.getElementById("fpass2").style.display = 'block';
    //     }else{
    //         document.getElementById("fpass").style.display = 'none';
    //         document.getElementById("fpass2").style.display = 'none';
    //     }        
    // };     
    $( "#myform" ).validate({
        rules: {
            password: "required",
            password_again: {
              equalTo: "#password"
            }
        }
    });
</script>