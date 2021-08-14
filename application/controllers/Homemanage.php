<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Homemanage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Homemanage_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'homemanage/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'homemanage/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'homemanage/index/';
            $config['first_url'] = base_url() . 'homemanage/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Homemanage_model->total_rows($q);
        $homemanage = $this->Homemanage_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'homemanage_data' => $homemanage,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		$data['title'] = "Kelola Data Homemanage";
        $this->template->load('template','homemanage/tbl_homeManage_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Homemanage_model->get_by_id($id);
        if ($row) {
            $data = array(
		'hm_id' => $row->hm_id,
		'aboutus' => $row->aboutus,
		'ourvision' => $row->ourvision,
		'ourmission' => $row->ourmission,
		'linkvideo' => $row->linkvideo,
		'subuh' => $row->subuh,
		'dzuhur' => $row->dzuhur,
		'ashar' => $row->ashar,
		'maghrib' => $row->maghrib,
		'isya' => $row->isya,
	    );
			$data['title'] = "Detail Data Homemanage";
            $this->template->load('template','homemanage/tbl_homeManage_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('homemanage'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('homemanage/create_action'),
	    'hm_id' => set_value('hm_id'),
	    'aboutus' => set_value('aboutus'),
	    'ourvision' => set_value('ourvision'),
	    'ourmission' => set_value('ourmission'),
	    'linkvideo' => set_value('linkvideo'),
	    'subuh' => set_value('subuh'),
	    'dzuhur' => set_value('dzuhur'),
	    'ashar' => set_value('ashar'),
	    'maghrib' => set_value('maghrib'),
	    'isya' => set_value('isya'),
	);
		$data['title'] = "Form Homemanage";
        $this->template->load('template','homemanage/tbl_homeManage_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'aboutus' => $this->input->post('aboutus',TRUE),
		'ourvision' => $this->input->post('ourvision',TRUE),
		'ourmission' => $this->input->post('ourmission',TRUE),
		'linkvideo' => $this->input->post('linkvideo',TRUE),
		'subuh' => $this->input->post('subuh',TRUE),
		'dzuhur' => $this->input->post('dzuhur',TRUE),
		'ashar' => $this->input->post('ashar',TRUE),
		'maghrib' => $this->input->post('maghrib',TRUE),
		'isya' => $this->input->post('isya',TRUE),
	    );

            $this->Homemanage_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('homemanage'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Homemanage_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('homemanage/update_action'),
		'hm_id' => set_value('hm_id', $row->hm_id),
		'aboutus' => set_value('aboutus', $row->aboutus),
		'ourvision' => set_value('ourvision', $row->ourvision),
		'ourmission' => set_value('ourmission', $row->ourmission),
		'linkvideo' => set_value('linkvideo', $row->linkvideo),
		'subuh' => set_value('subuh', $row->subuh),
		'dzuhur' => set_value('dzuhur', $row->dzuhur),
		'ashar' => set_value('ashar', $row->ashar),
		'maghrib' => set_value('maghrib', $row->maghrib),
		'isya' => set_value('isya', $row->isya),
	    );
			$data['title'] = "Form Homemanage";
            $this->template->load('template','homemanage/tbl_homeManage_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('homemanage'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('hm_id', TRUE));
        } else {
            $data = array(
		'aboutus' => $this->input->post('aboutus',TRUE),
		'ourvision' => $this->input->post('ourvision',TRUE),
		'ourmission' => $this->input->post('ourmission',TRUE),
		'linkvideo' => $this->input->post('linkvideo',TRUE),
		'subuh' => $this->input->post('subuh',TRUE),
		'dzuhur' => $this->input->post('dzuhur',TRUE),
		'ashar' => $this->input->post('ashar',TRUE),
		'maghrib' => $this->input->post('maghrib',TRUE),
		'isya' => $this->input->post('isya',TRUE),
	    );

            $this->Homemanage_model->update($this->input->post('hm_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('homemanage'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Homemanage_model->get_by_id($id);

        if ($row) {
            $this->Homemanage_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('homemanage'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('homemanage'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('aboutus', 'aboutus', 'trim|required');
	$this->form_validation->set_rules('ourvision', 'ourvision', 'trim|required');
	$this->form_validation->set_rules('ourmission', 'ourmission', 'trim|required');
	$this->form_validation->set_rules('linkvideo', 'linkvideo', 'trim|required');
	$this->form_validation->set_rules('subuh', 'subuh', 'trim|required');
	$this->form_validation->set_rules('dzuhur', 'dzuhur', 'trim|required');
	$this->form_validation->set_rules('ashar', 'ashar', 'trim|required');
	$this->form_validation->set_rules('maghrib', 'maghrib', 'trim|required');
	$this->form_validation->set_rules('isya', 'isya', 'trim|required');

	$this->form_validation->set_rules('hm_id', 'hm_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Homemanage.php */
/* Location: ./application/controllers/Homemanage.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-11 20:00:18 */
/* http://harviacode.com */