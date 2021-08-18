<?php
class Auth extends CI_Controller
{
    public $status;
    public $aturan;

    function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth_model', TRUE);
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status');
        $this->aturan = $this->config->item('aturan');
    }

    function index()
    {
        $this->form_validation->set_rules('id_user', 'ID User', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('login', 'auth/login');
        } else {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);
            $userInfo = $this->auth_model->checkLogin($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('flash_message', 'Username atau password salah');
                redirect(site_url() . 'auth/');
            }
            foreach ($userInfo as $key => $val) {
                $this->session->set_userdata($key, $val);
            }

            $sess_data['status_login']        = 'login';
            $this->session->set_userdata($sess_data);
            $this->session->set_flashdata('welcome', 'welcome');
            // redirect(site_url() . 'Dashboard');
            redirect(site_url() . 'User');
        }
    }

    public function form_login()
    {
        $this->load->view('auth/login2');
    }

    public function register()
    {
        $this->form_validation->set_rules('full_name', 'full_name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/index');
        } else {
            if ($this->auth_model->isDuplicate($this->input->post('email'))) {
                $this->session->set_flashdata('flash_message', 'Email pengguna sudah ada');
                redirect(site_url() . 'auth/index');
            } else {
                $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                $id = $this->auth_model->insertUser($clean);
                $token = $this->auth_model->insertToken($id);
                $qstring = $this->base64url_encode($token);
                $url = site_url() . 'auth/complete/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>';

                $message = '';
                $message .= '' . $link;
                echo $message; //send this in email

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => '',   //email google
                    'smtp_pass' => '',   //passsword google
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1'
                );
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from(($this->input->post('email', TRUE)), ($this->input->post('nama_depan', TRUE)));
                $this->email->to($this->input->post('email', TRUE));
                $this->email->cc('');   //email sesuaikan
                $this->email->subject('proses pendaftaran');
                $this->email->message('Untuk melanjutkan pendaftaran klik link ini   .' . $message);
                if (!$this->email->send()) {
                    $this->session->set_flashdata('flash_message', 'Terjadi kesalahan saat mengirim email');
                    redirect(site_url() . 'auth/register_success');
                } else {
                    $this->session->set_flashdata('flash_message', 'Email Berhasil dikirim');
                    return
                        redirect(site_url() . 'auth/register_success'); //redirect();
                }
                exit;
            };
        }
    }
    function register_success($token)
    {
        $data = array('token' => $token,);
        $this->load->view('auth/register_success', $data);
    }

    protected function _islocal()
    {
        return strpos($_SERVER['HTTP_HOST'], 'local');
    }

    public function complete()
    {
        $token = base64_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);
        $user_info = $this->auth_model->isTokenValid($cleanToken); //either false or array();          

        if (!$user_info) {
            $this->session->set_flashdata('flash_message', 'Token tidak valid atau kedaluwarsa');
            redirect(site_url() . 'auth/');
        }
        $data = array(
            'full_name' => $user_info->full_name,
            'email' => $user_info->email,
            'user_id' => $user_info->id_users,
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/complete', $data);
        } else {
            $this->load->library('encript');
            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = $this->encript->create_hash($cleanPost['password']);
            $cleanPost['password'] = $hashed;
            unset($cleanPost['passconf']);
            // $userInfo = $this->auth_model->updateUserInfo($cleanPost);

            // if (!$userInfo) {
            //     $this->session->set_flashdata('flash_message', 'Ada masalah saat membuat sandi, silahkan ulang proses pembuatan sandi.');
            //     redirect(site_url() . 'auth/');
            // }

            // unset($userInfo->password);

            // foreach ($userInfo as $key => $val) {
            //     $this->session->set_userdata($key, $val);
            // }
            // $tahun = $this->db->get_where('akademik_tahun_akademik', array('status' => 1))->result();
            // foreach ($tahun as $row) {
            //     $this->session->set_userdata('tahun', $row->tahun);
            //     $this->session->set_userdata('th_akad', $row->tahun_semester);
            // }
            $sess_data['status_login']        = 'login';
            $this->session->set_userdata($sess_data);
            $this->session->set_flashdata('welcome', 'welcome');
            redirect(site_url() . 'dashboard');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }

    public function forgot()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $email = $this->input->post('email');
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->auth_model->getUserInfoByEmail($clean);

            if (!$userInfo) {
                $this->session->set_flashdata('flash_message', 'Kami tidak dapat menemukan alamat email Anda');
                redirect(site_url() . 'auth/');
            }

            if ($userInfo->status != $this->status[1]) { //if status is not approved
                $this->session->set_flashdata('flash_message', 'Akun Anda tidak dalam status yang disetujui');
                redirect(site_url() . 'auth/');
            }

            //build token               
            $token = $this->auth_model->insertToken($userInfo->id_users);
            $qstring = $this->base64url_encode($token);
            $url = site_url() . 'auth/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>';

            $message = '';

            $message .= ' ' . $link;

            echo $message; //send this through mail

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => '',   //email google
                'smtp_pass' => '',   //passsword google
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from(($this->input->post('email', TRUE)), ($this->input->post('full_name', TRUE)));
            $this->email->to($this->input->post('email', TRUE));
            $this->email->cc('');   //sesuaikan
            $this->email->subject('reset password');
            $this->email->message('untuk melanjutkan reset klik link ini   .' . $message);
            if (!$this->email->send()) {
                $this->session->set_flashdata('flash_message', 'Terjadi kesalahan saat mengirim email');
                redirect(site_url() . 'auth/');
            } else {
                $this->session->set_flashdata('flash_message', 'Email Berhasil dikirim');
                return
                    redirect(site_url() . 'auth/send_email_success'); //redirect();
            }
            exit;
        }
    }
    function send_email_success()
    {
        $this->load->view('auth/send_email_success');
    }
    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->auth_model->isTokenValid($cleanToken); //either false or array();              

        if (!$user_info) {
            $this->session->set_flashdata('flash_message', 'Token tidak valid atau kedaluwarsa');
            redirect(site_url() . 'auth/');
        }
        $data = array(
            'id_users' => $user_info->id_users,
            'full_name' => $user_info->full_name,
            'email' => $user_info->email,
            'token' => $this->base64url_encode($token)
        );

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/reset_password', $data);
        } else {
            $this->load->library('encript');
            $post = $this->input->post(NULL, TRUE);
            $cleanPost = $this->security->xss_clean($post);
            $hashed = $this->encript->create_hash($cleanPost['password']);
            $cleanPost['password'] = $hashed;
            $cleanPost['user_id'] = $user_info->id_users;
            unset($cleanPost['passconf']);
            if (!$this->auth_model->updatePassword($cleanPost)) {
                $this->session->set_flashdata('flash_message', 'Terjadi masalah saat memperbarui kata sandi Anda');
            } else {
                $this->session->set_flashdata('flash_message2', 'Kata sandi Anda telah diperbarui. Anda sekarang dapat masuk');
            }
            redirect(site_url() . 'auth/');
        }
    }
    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
