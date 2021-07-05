<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Slide extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Slide_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'slide/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'slide/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'slide/index/';
            $config['first_url'] = base_url() . 'slide/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Slide_model->total_rows($q);
        $slide = $this->Slide_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'slide_data' => $slide,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = "Kelola Data Slide";
        $this->template->load('template', 'slide/tbl_slide_list', $data);
    }

    public function read($id)
    {
        $row = $this->Slide_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'slide_text' => $row->slide_text,
                'slide_foto' => $row->slide_foto,
            );
            $data['title'] = "Detail Data Slide";
            $this->template->load('template', 'slide/tbl_slide_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slide'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('slide/create_action'),
            'id' => set_value('id'),
            'slide_text' => set_value('slide_text'),
            'slide_foto' => set_value('slide_foto'),
        );
        $data['title'] = "Form Slide";
        $this->template->load('template', 'slide/tbl_slide_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path'] = './assets/mosque/images/slider'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!empty($_FILES['slide_foto']['name'])) {
                if ($this->upload->do_upload('slide_foto')) {
                    $foto = $this->upload->data();

                    $data = array(
                        'slide_foto' => $foto['file_name'],
                        'slide_text' => $this->input->post('slide_text', TRUE),
                    );

                    $this->Slide_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success 2');
                    redirect(site_url('slide'));
                } else {
                    $this->upload->display_errors();
                }
            }
        }
    }

    public function update($id)
    {
        $row = $this->Slide_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('slide/update_action'),
                'id' => set_value('id', $row->id),
                'slide_text' => set_value('slide_text', $row->slide_text),
                'slide_foto' => set_value('slide_foto', $row->slide_foto),
            );
            $data['title'] = "Form Slide";
            $this->template->load('template', 'slide/tbl_slide_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slide'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $config['upload_path'] = './assets/mosque/images/slider'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

            $this->load->library('upload');
            $this->upload->initialize($config);

            $id     = $this->input->post('id');

            if (!empty($_FILES['slide_foto']['name'])) {
                if ($this->upload->do_upload('slide_foto')) {
                    $foto = $this->upload->data();
                    $gambar = $foto['file_name'];
                    $old_image  = $this->Slide_model->get_by_id($id);
                    if ($old_image->slide_foto) {
                        unlink(FCPATH . '/assets/mosque/images/slider/' . $old_image->slide_foto);
                    }
                } else {
                    //redirect ke blog jika gambar gagal upload
                    redirect('slide/update');
                }
            } else {
                $img    = $this->Slide_model->get_by_id($id);
                $gambar = $img->slide_foto;
            }
            $data = array(
                'slide_text' => $this->input->post('slide_text', TRUE),
                'slide_foto' => $gambar,
            );

            $this->Slide_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('slide'));
        }
    }

    public function delete($id)
    {
        $row = $this->Slide_model->get_by_id($id);

        if ($row) {
            $this->Slide_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('slide'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('slide'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('slide_text', 'slide text', 'trim|required');
        $this->form_validation->set_rules('slide_foto', 'slide foto', 'trim');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Slide.php */
/* Location: ./application/controllers/Slide.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-10 05:01:56 */
/* http://harviacode.com */
