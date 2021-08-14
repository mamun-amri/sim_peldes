<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Accortolak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Accortolak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'accortolak/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'accortolak/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'accortolak/index/';
            $config['first_url'] = base_url() . 'accortolak/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Accortolak_model->total_rows($q);
        $accortolak = $this->Accortolak_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'accortolak_data' => $accortolak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = "Kelola Data Accortolak";
        $this->template->load('template', 'accortolak/tbl_accortolak_list', $data);
    }

    public function read($id)
    {
        $row = $this->Accortolak_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'penolak' => $row->penolak,
                'keterangan' => $row->keterangan,
            );
            $data['title'] = "Detail Data Accortolak";
            $this->template->load('template', 'accortolak/tbl_accortolak_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Record Not Found</div>');
            redirect(site_url('accortolak'));
        }
    }

    public function create($id)
    {
        $penolak = "";
        $siapa = $this->session->userdata('id_user_level');
        switch ($siapa) {
            case '9':
                $penolak = "Kepala Desa";
                break;
            case '10':
                $penolak = "RW";
                break;
            case '11':
                $penolak = "RT";
                break;
            default:
                $penolak = "admin nyoba";
                break;
        }
        $data = array(
            'button' => 'Create',
            'action' => site_url('accortolak/create_action'),
            'id' => set_value('id', $id),
            'penolak' => set_value('penolak', $penolak),
            'keterangan' => set_value('keterangan'),
        );
        $data['title'] = "Form Accortolak";
        $this->template->load('template', 'accortolak/tbl_accortolak_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('id', TRUE));
        } else {
            $data = array(
                'penolak' => $this->input->post('penolak', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Accortolak_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Record Not Found</div>');
            redirect(site_url('accortolak'));
        }
    }

    public function update($id)
    {
        $row = $this->Accortolak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('accortolak/update_action'),
                'id' => set_value('id', $row->id),
                'penolak' => set_value('penolak', $row->penolak),
                'keterangan' => set_value('keterangan', $row->keterangan),
            );
            $data['title'] = "Form Accortolak";
            $this->template->load('template', 'accortolak/tbl_accortolak_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning role="alert">Record Not Found</div>');
            redirect(site_url('accortolak'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'penolak' => $this->input->post('penolak', TRUE),
                'keterangan' => $this->input->post('keterangan', TRUE),
            );

            $this->Accortolak_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Update Success</div>');
            redirect(site_url('accortolak'));
        }
    }

    public function delete($id)
    {
        $row = $this->Accortolak_model->get_by_id($id);

        if ($row) {
            $this->Accortolak_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">Delete Record Success</div>');
            redirect(site_url('accortolak'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning role="alert">Record Not Found</div>');
            redirect(site_url('accortolak'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('penolak', 'penolak', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_accortolak.xls";
        $judul = "tbl_accortolak";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Penolak");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

        foreach ($this->Accortolak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->penolak);
            xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_accortolak.doc");

        $data = array(
            'tbl_accortolak_data' => $this->Accortolak_model->get_all(),
            'start' => 0
        );

        $this->load->view('accortolak/tbl_accortolak_doc', $data);
    }

    function pdf()
    {
        $this->load->library('Pdf');
        $data = array(
            'tbl_accortolak_data' => $this->Accortolak_model->get_all(),
            'start' => 0
        );
        $this->load->view('accortolak/tbl_accortolak_pdf', $data);
    }
}

/* End of file Accortolak.php */
/* Location: ./application/controllers/Accortolak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-05 10:16:56 */
/* http://harviacode.com */