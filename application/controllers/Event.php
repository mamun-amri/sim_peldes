<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Event extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Event_model');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'event/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'event/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'event/index/';
            $config['first_url'] = base_url() . 'event/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Event_model->total_rows($q);
        $event = $this->Event_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'event_data' => $event,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = "Kelola Data Event";
        $this->template->load('template', 'event/tbl_event_list', $data);
    }

    public function read($id)
    {
        $row = $this->Event_model->get_by_id($id);
        if ($row) {
            $data = array(
                'event_id' => $row->event_id,
                'event_judul' => $row->event_judul,
                'event_isi' => $row->event_isi,
                'event_slug' => $row->event_slug,
                'event_tanggal' => $row->event_tanggal,
                'event_lokasi' => $row->event_lokasi,
                'event_foto' => $row->event_foto,
            );
            $data['title'] = "Detail Data Event";
            $this->template->load('template', 'event/tbl_event_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('event'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('event/create_action'),
            'event_id' => set_value('event_id'),
            'event_judul' => set_value('event_judul'),
            'event_isi' => set_value('event_isi'),
            'event_lokasi' => set_value('event_lokasi'),
            'event_foto' => set_value('event_foto'),
        );
        $data['title'] = "Form Event";
        $this->template->load('template', 'event/tbl_event_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path'] = './assets/mosque/images/event/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //enkripsi nama file ketika di upload

            $this->upload->initialize($config);

            if (!empty($_FILES['event_foto']['name'])) {

                if ($this->upload->do_upload('event_foto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/mosque/images/event/' . $gbr['file_name'];
                    $config['create_thumb']     = FALSE;
                    $config['maintain_ratio']   = FALSE;
                    $config['quality']          = '60%';
                    $config['new_image']        = './assets/mosque/images/event/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name']; //ambil nama file yang terupload enkripsi
                    $judul  = $this->input->post('event_judul');
                    $isi    = $this->input->post('event_isi');

                    //Buat slug
                    $string     = preg_replace('[/^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]', '', $judul); //filter karakter unik dan replace dengan kosong ('')
                    $trim       = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
                    $pre_slug   = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
                    $slug       = $pre_slug . '.html'; // tambahkan ektensi .html pada slug

                    $data = array(
                        'event_judul' => $judul,
                        'event_isi' => $isi,
                        'event_slug'    => $slug,
                        'event_lokasi' => $this->input->post('event_lokasi', TRUE),
                        'event_foto' => $gambar,
                    );

                    $this->Event_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success 2');
                    redirect(site_url('event'));
                } else {
                    //redirect ke blog jika gambar gagal upload
                    $this->session->set_flashdata('message', 'failed to upload image');
                    redirect('event/create');
                }
            } else {
                //redirect ke blog jika gambar kosong
                $this->session->set_flashdata('message', 'Image Is Empty');
                redirect('event');
            }
        }
    }

    public function update($id)
    {
        $row = $this->Event_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('event/update_action'),
                'event_id' => set_value('event_id', $row->event_id),
                'event_judul' => set_value('event_judul', $row->event_judul),
                'event_isi' => set_value('event_isi', $row->event_isi),
                'event_lokasi' => set_value('event_lokasi', $row->event_lokasi),
                'event_foto' => set_value('event_foto', $row->event_foto),
            );
            $data['title'] = "Form Event";
            $this->template->load('template', 'event/tbl_event_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('event'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('event_id', TRUE));
        } else {
            $config['upload_path']      = './assets/mosque/images/event/'; //path folder
            $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name']     = TRUE; //enkripsi nama file ketika di upload

            $this->upload->initialize($config);

            $id         = $this->input->post('event_id');
            $judul      = $this->input->post('event_judul');
            $isi        = $this->input->post('event_isi');

            //Buat slug
            $string     = preg_replace('[/^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]', '', $judul); //filter karakter unik dan replace dengan kosong ('')
            $trim       = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
            $pre_slug   = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
            $slug       = $pre_slug . '.html'; // tambahkan ektensi .html pada slug


            if (!empty($_FILES['event_foto']['name'])) {
                if ($this->upload->do_upload('event_foto')) {

                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/mosque/images/event/' . $gbr['file_name'];
                    $config['create_thumb']     = FALSE;
                    $config['maintain_ratio']   = FALSE;
                    $config['quality']          = '60%';
                    $config['new_image']        = './assets/mosque/images/event/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar     = $gbr['file_name']; //ambil nama file yang terupload enkripsi

                    // hapus foto dlu

                    $old_image  = $this->Event_model->get_by_id($id);
                    if ($old_image->event_foto) {
                        unlink(FCPATH . '/assets/mosque/images/event/' . $old_image->event_foto);
                    }
                } else {
                    //redirect ke blog jika gambar gagal upload
                    redirect('event/update');
                }
            } else {
                $img    = $this->Event_model->get_by_id($id);
                $gambar = $img->event_foto;
            }
            $data = array(
                'event_judul' => $judul,
                'event_isi' => $isi,
                'event_slug' => $slug,
                'event_lokasi' => $this->input->post('event_lokasi', TRUE),
                'event_foto' => $gambar,
            );

            $this->Event_model->update($this->input->post('event_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('event'));
        }
    }

    public function delete($id)
    {
        $row = $this->Event_model->get_by_id($id);

        if ($row) {
            $this->Event_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('event'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('event'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('event_judul', 'event judul', 'trim|required');
        $this->form_validation->set_rules('event_isi', 'event isi', 'trim|required');
        $this->form_validation->set_rules('event_lokasi', 'event lokasi', 'trim|required');
        $this->form_validation->set_rules('event_foto', 'event foto', 'trim');

        $this->form_validation->set_rules('event_id', 'event_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function pdf()
    {
        $this->load->library('Pdf');
        $data = array(
            'tbl_event_data' => $this->Event_model->get_all(),
            'start' => 0
        );
        $this->load->view('event/tbl_event_pdf', $data);
    }
}

/* End of file Event.php */
/* Location: ./application/controllers/Event.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-09 09:29:46 */
/* http://harviacode.com */
