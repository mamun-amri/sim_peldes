<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Contact_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'contact/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'contact/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'contact/index/';
            $config['first_url'] = base_url() . 'contact/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Contact_model->total_rows($q);
        $contact = $this->Contact_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'contact_data' => $contact,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = "Kelola Data Contact";
        $this->template->load('template', 'contact/tbl_contact_list', $data);
    }

    public function read($id)
    {
        $row = $this->Contact_model->get_by_id($id);
        if ($row) {
            $data = array(
                'contact_id' => $row->contact_id,
                'contact_firstName' => $row->contact_firstName,
                'contact_lastName' => $row->contact_lastName,
                'contact_email' => $row->contact_email,
                'contact_subject' => $row->contact_subject,
                'contact_message' => $row->contact_message,
            );
            $data['title'] = "Detail Data Contact";
            $this->template->load('template', 'contact/tbl_contact_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('contact'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('contact/create_action'),
            'contact_id' => set_value('contact_id'),
            'contact_firstName' => set_value('contact_firstName'),
            'contact_lastName' => set_value('contact_lastName'),
            'contact_email' => set_value('contact_email'),
            'contact_subject' => set_value('contact_subject'),
            'contact_message' => set_value('contact_message'),
        );
        $data['title'] = "Form Contact";
        $this->template->load('template', 'contact/tbl_contact_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'contact_firstName' => $this->input->post('contact_firstName', TRUE),
                'contact_lastName' => $this->input->post('contact_lastName', TRUE),
                'contact_email' => $this->input->post('contact_email', TRUE),
                'contact_subject' => $this->input->post('contact_subject', TRUE),
                'contact_message' => $this->input->post('contact_message', TRUE),
            );

            $this->Contact_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">create record success!</div>');
            redirect(site_url('contact'));
        }
    }

    public function update($id)
    {
        $row = $this->Contact_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('contact/update_action'),
                'contact_id' => set_value('contact_id', $row->contact_id),
                'contact_firstName' => set_value('contact_firstName', $row->contact_firstName),
                'contact_lastName' => set_value('contact_lastName', $row->contact_lastName),
                'contact_email' => set_value('contact_email', $row->contact_email),
                'contact_subject' => set_value('contact_subject', $row->contact_subject),
                'contact_message' => set_value('contact_message', $row->contact_message),
            );
            $data['title'] = "Form Contact";
            $this->template->load('template', 'contact/tbl_contact_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Record Not Found</div>');
            redirect(site_url('contact'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('contact_id', TRUE));
        } else {
            $data = array(
                'contact_firstName' => $this->input->post('contact_firstName', TRUE),
                'contact_lastName' => $this->input->post('contact_lastName', TRUE),
                'contact_email' => $this->input->post('contact_email', TRUE),
                'contact_subject' => $this->input->post('contact_subject', TRUE),
                'contact_message' => $this->input->post('contact_message', TRUE),
            );

            $this->Contact_model->update($this->input->post('contact_id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Update Record Success</div>');
            redirect(site_url('contact'));
        }
    }

    public function delete($id)
    {
        $row = $this->Contact_model->get_by_id($id);

        if ($row) {
            $this->Contact_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Delete Record Success</div>');
            redirect(site_url('contact'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Record Not Found</div>');
            redirect(site_url('contact'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('contact_firstName', 'contact firstname', 'trim|required');
        $this->form_validation->set_rules('contact_lastName', 'contact lastname', 'trim|required');
        $this->form_validation->set_rules('contact_email', 'contact email', 'trim|required');
        $this->form_validation->set_rules('contact_subject', 'contact subject', 'trim|required');
        $this->form_validation->set_rules('contact_message', 'contact message', 'trim|required');

        $this->form_validation->set_rules('contact_id', 'contact_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function pdf()
    {
        $this->load->library('Pdf');
        $data = array(
            'tbl_contact_data' => $this->Contact_model->get_all(),
            'start' => 0
        );
        $this->load->view('contact/tbl_contact_pdf', $data);
    }
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-10 17:39:46 */
/* http://harviacode.com */
