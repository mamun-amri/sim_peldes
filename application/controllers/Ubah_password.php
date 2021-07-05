<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ubah_password extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_login();
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
                'action'        => site_url('ubah_password/update_password'),
                'id_users'      => set_value('id_users', $row->id_users),
                'full_name'     => set_value('full_name', $row->full_name),
        );
        $this->template->load('template','user/ubah_password', $data);
    }
    
    function update_password(){
        $this->load->library('encript');
        
        
        if ($this->input->post('id_users',TRUE) == 1) {
            $post = $this->input->post(NULL, TRUE);               
            $cleanPost = $this->security->xss_clean($post);               
            $hashed = $this->encript->create_hash($cleanPost['password']);                
            $cleanPost['password'] = $hashed;
            unset($cleanPost['passconf']);
            $data = array(
                'id_users'      => $this->input->post('id_users',TRUE),
                'full_name'     => $this->input->post('full_name',TRUE),
                'password'      => $cleanPost['password'],
            );
        }else{
            $data = array(
                'id_users'      => $this->input->post('id_users',TRUE),
                'full_name'     => $this->input->post('full_name',TRUE),
            );
        }
        $this->User_model->update($this->input->post('id_users', TRUE), $data);
        $this->session->set_flashdata('flash_message2', 'Perubahan data berhasil disimpan');
        redirect(site_url('ubah_password'));
    }

}