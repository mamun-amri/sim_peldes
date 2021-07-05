<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Artikel_model');
        $this->load->library(['form_validation', 'upload']);
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->uri->segment(3));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'artikel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'artikel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'artikel/index/';
            $config['first_url'] = base_url() . 'artikel/index/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = FALSE;
        $config['total_rows'] = $this->Artikel_model->total_rows($q);
        $artikel = $this->Artikel_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'artikel_data' => $artikel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = "Kelola Data Artikel";
        $this->template->load('template', 'artikel/tbl_artikel_list', $data);
    }

    public function read($id)
    {
        $row = $this->Artikel_model->get_by_id($id);
        if ($row) {
            $data = array(
                'artikel_id' => $row->artikel_id,
                'artikel_judul' => $row->artikel_judul,
                'artikel_isi' => $row->artikel_isi,
                'artikel_foto' => $row->artikel_foto,
                'artikel_tag' => $row->artikel_tag,
                'artikel_kategori' => $row->artikel_kategori,
                'artikel_tanggal' => $row->artikel_tanggal,
                'artikel_slug' => $row->artikel_slug,
                'artikel_user' => $row->artikel_user,
            );
            $data['title'] = "Detail Data Artikel";
            $this->template->load('template', 'artikel/tbl_artikel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('artikel/create_action'),
            'artikel_id' => set_value('artikel_id'),
            'artikel_judul' => set_value('artikel_judul'),
            'artikel_isi' => set_value('artikel_isi'),
            'artikel_foto' => set_value('artikel_foto'),
            'artikel_tag' => set_value('artikel_tag'),
            'artikel_kategori' => set_value('artikel_kategori'),
        );
        $data['title'] = "Form Artikel";
        $this->template->load('template', 'artikel/tbl_artikel_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $make_id    = $this->Artikel_model->make_id('A', 'artikel_id', 'tbl_artikel');
            $config['upload_path'] = './assets/mosque/images/artikel/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //enkripsi nama file ketika di upload

            $this->upload->initialize($config);

            if (!empty($_FILES['artikel_foto']['name'])) {
                if ($this->upload->do_upload('artikel_foto')) {
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/mosque/images/artikel/' . $gbr['file_name'];
                    $config['create_thumb']     = FALSE;
                    $config['maintain_ratio']   = FALSE;
                    $config['quality']          = '60%';
                    $config['new_image']        = './assets/mosque/images/artikel/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar = $gbr['file_name']; //ambil nama file yang terupload enkripsi
                    $judul  = $this->input->post('artikel_judul');
                    $isi    = $this->input->post('artikel_isi');

                    //Buat slug
                    $string     = preg_replace('[/^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]', '', $judul); //filter karakter unik dan replace dengan kosong ('')
                    $trim       = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
                    $pre_slug   = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
                    $slug       = $pre_slug . '.html'; // tambahkan ektensi .html pada slug

                    $created    = $this->db->get_where('tbl_user', ['id_user_level' => $this->session->userdata('id_user_level')])->row();

                    $data = array(
                        'artikel_id'    => $make_id,
                        'artikel_judul' => $judul,
                        'artikel_isi'   => $isi,
                        'artikel_foto'  => $gambar,
                        'artikel_tag'   => $this->input->post('artikel_tag', TRUE),
                        'artikel_kategori'   => $this->input->post('artikel_kategori', TRUE),
                        'artikel_slug'  => $slug,
                        'artikel_user'  => $created->full_name,
                    );
                    $this->Artikel_model->insert($data);
                    $this->session->set_flashdata('message', 'Create Record Success 2');
                    redirect(site_url('artikel'));
                } else {
                    //redirect ke blog jika gambar gagal upload
                    redirect('artikel/create');
                }
            } else {
                //redirect ke blog jika gambar kosong
                redirect('artikel/create');
            }
        }
    }

    public function update($id)
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('artikel/update_action'),
                'artikel_id'    => set_value('artikel_id', $row->artikel_id),
                'artikel_judul' => set_value('artikel_judul', $row->artikel_judul),
                'artikel_isi'   => set_value('artikel_isi', $row->artikel_isi),
                'artikel_tag'   => set_value('artikel_tag', $row->artikel_tag),
                'artikel_kategori'   => set_value('artikel_kategori', $row->artikel_kategori),
            );
            $data['title'] = "Form Artikel";
            $this->template->load('template', 'artikel/tbl_artikel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('artikel_id', TRUE));
        } else {
            $config['upload_path']      = './assets/mosque/images/artikel/'; //path folder
            $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name']     = TRUE; //enkripsi nama file ketika di upload

            $this->upload->initialize($config);

            $id         = $this->input->post('artikel_id');
            $judul      = $this->input->post('artikel_judul');
            $isi        = $this->input->post('artikel_isi');

            //Buat slug
            $string     = preg_replace('[/^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]', '', $judul); //filter karakter unik dan replace dengan kosong ('')
            $trim       = trim($string); // hilangkan spasi berlebihan dengan fungsi trim
            $pre_slug   = strtolower(str_replace(" ", "-", $trim)); // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
            $slug       = $pre_slug . '.html'; // tambahkan ektensi .html pada slug


            if (!empty($_FILES['artikel_foto']['name'])) {
                if ($this->upload->do_upload('artikel_foto')) {

                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = './assets/mosque/images/artikel/' . $gbr['file_name'];
                    $config['create_thumb']     = FALSE;
                    $config['maintain_ratio']   = FALSE;
                    $config['quality']          = '60%';
                    $config['new_image']        = './assets/mosque/images/artikel/' . $gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $gambar     = $gbr['file_name']; //ambil nama file yang terupload enkripsi

                    // hapus foto dlu

                    $old_image  = $this->Artikel_model->get_by_id($id);
                    if ($old_image->artikel_foto) {
                        unlink(FCPATH . '/assets/mosque/images/artikel/' . $old_image->artikel_foto);
                    }
                } else {
                    //redirect ke blog jika gambar gagal upload
                    redirect('artikel/update');
                }
            } else {
                $img    = $this->Artikel_model->get_by_id($id);
                $gambar = $img->artikel_foto;
            }

            $created    = $this->db->get_where('tbl_user', ['id_user_level' => $this->session->userdata('id_user_level')])->row();

            $data = array(
                'artikel_judul' => $judul,
                'artikel_isi'   => $isi,
                'artikel_foto'  => $gambar,
                'artikel_tag'   => $this->input->post('artikel_tag', TRUE),
                'artikel_kategori'   => $this->input->post('artikel_kategori', TRUE),
                'artikel_slug'  => $slug,
                'artikel_user'  => $created->full_name,
            );
            $this->Artikel_model->update($this->input->post('artikel_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('artikel'));
        }
    }

    public function delete($id)
    {
        $row = $this->Artikel_model->get_by_id($id);

        if ($row) {
            $this->Artikel_model->delete($id);
            if ($row->artikel_foto) {
                unlink(FCPATH . '/assets/mosque/images/artikel/' . $row->artikel_foto);
            }
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('artikel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('artikel'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('artikel_judul', 'artikel judul', 'trim|required');
        $this->form_validation->set_rules('artikel_isi', 'artikel isi', 'trim|required');
        $this->form_validation->set_rules('artikel_foto', 'artikel foto', 'trim');
        $this->form_validation->set_rules('artikel_tag', 'artikel tag', 'trim|required');
        $this->form_validation->set_rules('artikel_kategori', 'artikel kategori', 'trim|required');
        $this->form_validation->set_rules('artikel_id', 'artikel_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function pdf()
    {
        $this->load->library('Pdf');
        $data = array(
            'tbl_artikel_data' => $this->Artikel_model->get_all(),
            'start' => 0
        );
        $this->load->view('artikel/tbl_artikel_pdf', $data);
    }
}

/* End of file Artikel.php */
/* Location: ./application/controllers/Artikel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-09 01:23:04 */
/* http://harviacode.com */
