<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_profil extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('User_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }

    public function index()
    {
        $id = $this->session->userdata('id_users');
        $row = $this->User_model->get_by_id($id);
        $data = array(
                'button'        => 'Update',
                'action'        => site_url('User_profil/update_password'),
                'id_users'      => set_value('id_users', $row->id_users),
                'full_name'     => set_value('full_name', $row->full_name),
        );
        $this->template->load('template','user/ubah_password', $data);
    }
    
    function update_password(){
        $this->load->library('encript');
        $row = $this->User_model->get_by_id($id);

        $valid_ext  = array('jpg','jpeg','png','gif');
        $filesize  = $_FILES['images']['size']/1024;
        $type_foto = strtolower(end(explode('.', $_FILES['images']['name'])));

        if($_FILES['images']['name'] !=""){
                @unlink('./assets/foto_profil/'.'foto_'.$this->input->post('id_users').'.png');
                @unlink('./assets/foto_profil/'.'foto_'.$this->input->post('id_users').'.jpg');
                @unlink('./assets/foto_profil/'.'foto_'.$this->input->post('id_users').'.jpeg');
                @unlink('./assets/foto_profil/'.'foto_'.$this->input->post('id_users').'.gif');
                $foto = $this->upload_foto('foto_'.$this->input->post('id_users'));
                $data_foto = $foto['file_name'];
                $this->session->set_userdata('images',$data_foto);

                if(in_array($type_foto, $valid_ext)){
                  if($foto['file_size'] <= 500){
                    if($foto['file_name']==''){                  
                    }else{
                      $this->resizeImage($foto['file_name']);
                    }
                  }
                }
            }else{
                $data_foto = $row->images;                 
            }

        if ($this->input->post('update_pass',TRUE) == 1) {
            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);               
            $hashed = $this->encript->create_hash($cleanPost['password']);                
            $cleanPost['password'] = $hashed;
            unset($cleanPost['passconf']);
            $data = array(
                'id_users'      => $this->input->post('id_users',TRUE),
                'full_name'     => $this->input->post('full_name',TRUE),
                'images'        => $data_foto,
                'password'      => $cleanPost['password'],
            );
        }else{
            $data = array(
                'id_users'      => $this->input->post('id_users',TRUE),
                'full_name'     => $this->input->post('full_name',TRUE),
                'images'        => $data_foto,
            );
        }
        $this->User_model->update($this->input->post('id_users', TRUE), $data);
        $this->session->set_flashdata('flash_message2', 'Perubahan data berhasil disimpan');
        redirect(site_url('User_profil'));
    }

    function upload_foto($name){
        $config['upload_path']          = './assets/foto_profil';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $name;
        // $this->upload->initialize($config);
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }

    public function resizeImage($filename){
      $source_path = './assets/foto_profil/' . $filename;
      $target_path = './assets/foto_profil/thumbnail/';
      $config_manip = array(
          'image_library' => 'gd2',
          'source_image' => $source_path,
          'new_image' => $target_path,
          'maintain_ratio' => TRUE,
          'create_thumb' => TRUE,
          'thumb_marker' => '_thumb',
          'width' => 150,
          'height' => 150
      );

      $this->load->library('image_lib', $config_manip);
      if (!$this->image_lib->resize()) {
          echo $this->image_lib->display_errors();
      }

      $this->image_lib->clear();
   }


}