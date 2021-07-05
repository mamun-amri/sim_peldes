<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    // perpage untuk pagination
    public $perPage = 2;

    function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'pagination']);
        $this->load->helper('tgl_indo');
        $this->load->model(['artikel_model', 'homemanage_model', 'Event_model', 'Slide_model', 'Contact_model']);
    }

    public function index()
    {
        $data['slide'] = $this->Slide_model->get_all();
        $data['home']  = $this->homemanage_model->get_all();
        $this->template->load('homepage', 'homepage', $data);
    }

    public function blog()
    {
        // ambil data keyword
        if (isset($_POST['submit'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        // pagination config
        $config['base_url']         = 'http://localhost/pro_masjid/artikels/blog';
        $config['total_rows']       = $this->artikel_model->total_rows($data['keyword']);
        $config['per_page']         = $this->perPage;

        $this->pagination->initialize($config);
        $data['start']      = $this->uri->segment(3);

        $data['artikel']    = $this->artikel_model->get_limit_data($config['per_page'], $data['start'], $data['keyword']);
        //load view blog
        $data['totalRows']  = $config['total_rows'];
        $data['title']      = 'Artikels';
        $data['link']       = base_url('artikels/blog');
        $data['tag']        = $this->artikel_model->get_tag();
        $data['kategori']   = $this->artikel_model->get_kategori();
        $data['archive']    = $this->artikel_model->get_archive();

        $this->template->load('content', 'homepage/blog', $data);
    }

    public function category()
    {
        // ambil data keyword
        if ($this->uri->segment(2)) {
            $data['keyword'] = $this->uri->segment(2);
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        // pagination config
        $config['base_url']         = 'http://localhost/pro_masjid/category/' . $data['keyword'];
        $config['total_rows']       = $this->artikel_model->total_rows($data['keyword']);
        $config['per_page']         = $this->perPage;

        $this->pagination->initialize($config);
        $data['start']      = $this->uri->segment(3);

        $data['artikel']    = $this->artikel_model->get_limit_data($config['per_page'], $data['start'], $data['keyword']);
        //load view blog
        $data['totalRows']  = $config['total_rows'];
        $data['keyword']    = $data['keyword'];
        //load view blog
        $data['title']      = 'Kategori ';

        $data['tag']        = $this->artikel_model->get_tag();
        $data['kategori']   = $this->artikel_model->get_kategori();
        $data['archive']    = $this->artikel_model->get_archive();

        $this->template->load('content', 'homepage/blog', $data);
    }

    public function tag()
    {
        // ambil data keyword
        if ($this->uri->segment(2)) {
            $data['keyword'] = $this->uri->segment(2);
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        // pagination config
        $config['base_url']         = 'http://localhost/pro_masjid/tag/' . $data['keyword'];
        $config['total_rows']       = $this->artikel_model->total_rows($data['keyword']);
        $config['per_page']         = $this->perPage;

        $this->pagination->initialize($config);
        $data['start']      = $this->uri->segment(3);

        $data['artikel']    = $this->artikel_model->get_limit_data($config['per_page'], $data['start'], $data['keyword']);
        //load view blog
        $data['totalRows']  = $config['total_rows'];
        $data['keyword']    = $data['keyword'];

        //load view blog
        $data['tag']        = $this->artikel_model->get_tag();
        $data['kategori']   = $this->artikel_model->get_kategori();
        $data['archive']    = $this->artikel_model->get_archive();
        $data['title']      = 'Tag';
        $data['keyword']    = $data['keyword'];

        $this->template->load('content', 'homepage/blog', $data);
    }

    public function archive()
    {
        // ambil data keyword
        if ($this->uri->segment(2)) {
            $data['keyword'] = $this->uri->segment(2);
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        // pagination config
        $config['base_url']         = 'http://localhost/pro_masjid/archive/' . $data['keyword'];
        $config['total_rows']       = $this->artikel_model->total_rows($data['keyword']);
        $config['per_page']         = $this->perPage;

        $this->pagination->initialize($config);
        $data['start']      = $this->uri->segment(3);

        $data['artikel']    = $this->artikel_model->get_limit_data($config['per_page'], $data['start'], $data['keyword']);
        //load view blog
        $data['totalRows']  = $config['total_rows'];
        $data['keyword']    = $data['keyword'];
        //load view blog
        $data['tag']        = $this->artikel_model->get_tag();
        $data['kategori']   = $this->artikel_model->get_kategori();
        $data['archive']    = $this->artikel_model->get_archive();
        $x                  = date_create($data['artikel']->artikel_tanggal);
        $date               = date_format($x, 'M Y');
        $data['title']      = 'Archive';
        $data['keyword']    = $date;

        $this->template->load('content', 'homepage/blog', $data);
    }

    public function artikel($slug = null)
    {
        $data['artikel_detail']     = $this->artikel_model->get_by_slug($slug);
        $data['artikel']            = $this->artikel_model->get_all();
        $data['tag']        = $this->artikel_model->get_tag();
        $data['kategori']   = $this->artikel_model->get_kategori();
        $data['archive']    = $this->artikel_model->get_archive();
        $data['link']       = base_url('artikels/blog');
        $data['title']      = 'Detail Artikel';

        if (empty($data['artikel'])) {
            show_404();
        }
        $this->template->load('content', 'homepage/artikel-detail', $data);
    }

    public function events()
    {

        // ambil data keyword
        if (isset($_POST['submit'])) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }
        // pagination config
        $config['base_url']         = 'http://localhost/pro_masjid/events';
        $config['total_rows']       = $this->Event_model->total_rows($data['keyword']);
        $config['per_page']         = $this->perPage;

        $this->pagination->initialize($config);
        $data['start']      = $this->uri->segment(2);

        $data['event']      = $this->Event_model->get_limit_data($config['per_page'], $data['start'], $data['keyword']);
        //load view blog
        $data['totalRows']  = $config['total_rows'];
        $data['keyword']    = $data['keyword'];
        //load view blog
        $data['title']      = 'Events';

        $this->template->load('content', 'homepage/event', $data);
    }

    public function event($slug = null)
    {
        $data['event']      = $this->Event_model->get_by_slug($slug);
        $data['tag']        = $this->artikel_model->get_tag();
        $data['kategori']   = $this->artikel_model->get_kategori();
        $data['archive']    = $this->artikel_model->get_archive();
        $data['link']       = base_url('blog/events');

        if (empty($data['event'])) {
            show_404();
        }
        $this->template->load('content', 'homepage/event-detail', $data);
    }

    public function contact()
    {
        $data = array(
            'button' => 'Create',
            'action'            => site_url('home/create_action'),
            'contact_id'        => set_value('contact_id'),
            'contact_firstName' => set_value('contact_firstName'),
            'contact_lastName'  => set_value('contact_lastName'),
            'contact_email'     => set_value('contact_email'),
            'contact_subject'   => set_value('contact_subject'),
            'contact_message'   => set_value('contact_message'),
        );
        $data['title'] = "Contact Us";
        $data['link']  = base_url('contactus');
        $this->template->load('content', 'homepage/contact', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->contact();
        } else {
            $data = array(
                'contact_firstName' => $this->input->post('contact_firstName', TRUE),
                'contact_lastName'  => $this->input->post('contact_lastName', TRUE),
                'contact_email'     => $this->input->post('contact_email', TRUE),
                'contact_subject'   => $this->input->post('contact_subject', TRUE),
                'contact_message'   => $this->input->post('contact_message', TRUE),
            );

            $this->Contact_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Terimasih telah menghubungi kami, kami akan segara mengghubi kembali</div>');
            redirect(site_url('contactus'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('contact_firstName', 'contact firstname', 'trim|required');
        $this->form_validation->set_rules('contact_lastName', 'contact lastname', 'trim|required');
        $this->form_validation->set_rules('contact_email', 'contact email', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact_subject', 'contact subject', 'trim|required');
        $this->form_validation->set_rules('contact_message', 'contact message', 'trim|required');

        $this->form_validation->set_rules('contact_id', 'contact_id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}
