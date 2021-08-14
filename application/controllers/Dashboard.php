<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('Pengunjung_model'); 
        $this->load->helper('tgl_indo');
        // $this->load->library('Pdf');
    }
    public function index()
    {
        $this->template->load('template', 'dashboard');
    }
}
