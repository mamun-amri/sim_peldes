<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$user = "";
		$level = $this->session->userdata('id_user_level');
		switch ($level) {
			case '1':
				$user = $this->User_model->get_all();
				break;
			case '9': //lurah
				$this->db->where("id_user_level !=", 1);
				$this->db->where("id_user_level !=", 12);
				$this->db->order_by("id_user_level", 'ASC');
				$user = $this->db->get("tbl_user")->result();
				break;

				// case '10': //rw
				// 	$this->db->where("id_user_level !=", 1);
				// 	$this->db->where("id_user_level !=", 9);
				// 	$this->db->where("rw", $this->session->userdata('rw'));
				// 	$user = $this->db->get("tbl_user")->result();
				// 	break;

			case '11': //rt
				$this->db->where("id_user_level !=", 1);
				$this->db->where("id_user_level !=", 9);
				$this->db->where("id_user_level !=", 10);
				$this->db->where("rw", $this->session->userdata('rw'));
				$this->db->where("rt", $this->session->userdata('rt'));
				$user = $this->db->get("tbl_user")->result();
				break;
			default:
				$this->db->where("nik", $this->session->userdata('nik'));
				$user = $this->db->get("tbl_user")->result();
				break;
		}

		$data = array(
			'user_data' => $user,
		);
		$data['title'] = "Kelola Data User";
		$this->template->load('template', 'user/tbl_user_list', $data);
	}

	public function read($id)
	{
		$row = $this->User_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_users' => $row->id_users,
				'nama' => $row->nama,
				'email' => $row->email,
				'password' => $row->password,
				'images' => $row->images,
				'id_user_level' => $row->id_user_level,
				'is_aktif' => $row->is_aktif,
				'nik' => $row->nik,
				'no_kk' => $row->no_kk,
				'jenis_kelamin' => $row->jenis_kelamin,
				'tempat_lahir' => $row->tempat_lahir,
				'tanggal_lahir' => $row->tanggal_lahir,
				'status_menikah' => $row->status_menikah,
				'pekerjaan' => $row->pekerjaan,
				'agama' => $row->agama,
				'no_telp' => $row->no_telp,
				'negara' => $row->negara,
				'alamat' => $row->alamat,
				'rt' => $row->rt,
				'rw' => $row->rw,
				'desa' => $row->desa,
				'kec' => $row->kec,
				'kab' => $row->kab,
				'prov' => $row->prov,
				'kd_post' => $row->kd_post,
			);
			$data['title'] = "Detail Data User";
			$this->template->load('template', 'user/tbl_user_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function create()
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('user/create_action'),
			'id_users' => set_value('id_users'),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'password' => set_value('password'),
			'images' => set_value('images'),
			'id_user_level' => set_value('id_user_level'),
			'is_aktif' => set_value('is_aktif'),
			'nik' => set_value('nik'),
			'no_kk' => set_value('no_kk'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'tempat_lahir' => set_value('tempat_lahir'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'status_menikah' => set_value('status_menikah'),
			'pekerjaan' => set_value('pekerjaan'),
			'agama' => set_value('agama'),
			'no_telp' => set_value('no_telp'),
			'negara' => set_value('negara'),
			'alamat' => set_value('alamat'),
			'rt' => set_value('rt'),
			'rw' => set_value('rw'),
			'desa' => set_value('desa'),
			'kec' => set_value('kec'),
			'kab' => set_value('kab'),
			'prov' => set_value('prov'),
			'kd_post' => set_value('kd_post'),
		);
		$data['title'] = "Form User";
		$this->template->load('template', 'user/tbl_user_form', $data);
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$row = $this->User_model->get_by_id($this->input->post('nik', TRUE));
			if ($row) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">
				Nik Sudah Terdaftar
				</div>');
				$this->create();
			} else {
				$foto = $this->_upload_foto();
				$this->load->library('encript');
				$post = $this->input->post(NULL, TRUE);
				$cleanPost = $this->security->xss_clean($post); //echo $cleanPost['password'];
				$hashed = $this->encript->create_hash($cleanPost['password']);
				$cleanPost['password'] = $hashed;
				unset($cleanPost['passconf']);

				$data = array(
					'id_users' => $this->input->post('nik', TRUE),
					'nama' => $this->input->post('nama', TRUE),
					'email' => $this->input->post('email', TRUE),
					'password' => $cleanPost['password'],
					'images' => $foto['file_name'],
					'id_user_level' => $this->input->post('id_user_level', TRUE),
					'is_aktif' => $this->input->post('is_aktif', TRUE),
					'nik' => $this->input->post('nik', TRUE),
					'no_kk' => $this->input->post('no_kk', TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
					'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
					'status_menikah' => $this->input->post('status_menikah', TRUE),
					'pekerjaan' => $this->input->post('pekerjaan', TRUE),
					'agama' => $this->input->post('agama', TRUE),
					'no_telp' => $this->input->post('no_telp', TRUE),
					'negara' => $this->input->post('negara', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'rt' => $this->input->post('rt', TRUE),
					'rw' => $this->input->post('rw', TRUE),
					'desa' => $this->input->post('desa', TRUE),
					'kec' => $this->input->post('kec', TRUE),
					'kab' => $this->input->post('kab', TRUE),
					'prov' => $this->input->post('prov', TRUE),
					'kd_post' => $this->input->post('kd_post', TRUE),
				);

				$this->User_model->insert($data);
				$this->session->set_flashdata('message', 'Create Record Success');
				redirect(site_url('user'));
			}
		}
	}

	public function update($id)
	{
		$row = $this->User_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('user/update_action'),
				'id_users' => set_value('id_users', $row->id_users),
				'nama' => set_value('nama', $row->nama),
				'email' => set_value('email', $row->email),
				'password' => set_value('password', $row->password),
				'images' => set_value('images', $row->images),
				'id_user_level' => set_value('id_user_level', $row->id_user_level),
				'is_aktif' => set_value('is_aktif', $row->is_aktif),
				'nik' => set_value('nik', $row->nik),
				'no_kk' => set_value('no_kk', $row->no_kk),
				'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
				'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
				'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
				'status_menikah' => set_value('status_menikah', $row->status_menikah),
				'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
				'agama' => set_value('agama', $row->agama),
				'no_telp' => set_value('no_telp', $row->no_telp),
				'negara' => set_value('negara', $row->negara),
				'alamat' => set_value('alamat', $row->alamat),
				'rt' => set_value('rt', $row->rt),
				'rw' => set_value('rw', $row->rw),
				'desa' => set_value('desa', $row->desa),
				'kec' => set_value('kec', $row->kec),
				'kab' => set_value('kab', $row->kab),
				'prov' => set_value('prov', $row->prov),
				'kd_post' => set_value('kd_post', $row->kd_post),
			);
			$data['title'] = "Form User";
			$this->template->load('template', 'user/tbl_user_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function update_action()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_users', TRUE));
		} else {
			$this->load->library('encript');
			$post = $this->input->post(null, TRUE);
			$cleanPost = $this->security->xss_clean($post); //echo $cleanPost['password'];
			$hashed = $this->encript->create_hash($cleanPost['password']);
			$cleanPost['password'] = $hashed;
			unset($cleanPost['passconf']);
			// var_dump($foto);
			// die;
			$row = $this->User_model->get_by_id($this->input->post('id_users', TRUE));
			$pass = "";
			if ($this->input->post('password') == $row->password) {
				$pass = $row->password;
				// echo "jika sama: " . $pass;
			} else {
				$pass = $cleanPost['password'];
				// echo "jika tidak sama: " . $pass;
			}

			// var_dump($this->input->post('password') == $row->password);
			// var_dump($this->input->post('password') . " " . $row->password);
			// die;
			$foto = $this->_upload_foto();
			if ($foto['file_name'] == '') {
				$data = array(
					'nama' => $this->input->post('nama', TRUE),
					'email' => $this->input->post('email', TRUE),
					'password' => $pass,
					// 'images' =>  $foto['file_name'],
					'id_user_level' => $this->input->post('id_user_level', TRUE),
					'is_aktif' => $this->input->post('is_aktif', TRUE),
					'nik' => $this->input->post('nik', TRUE),
					'no_kk' => $this->input->post('no_kk', TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
					'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
					'status_menikah' => $this->input->post('status_menikah', TRUE),
					'pekerjaan' => $this->input->post('pekerjaan', TRUE),
					'agama' => $this->input->post('agama', TRUE),
					'no_telp' => $this->input->post('no_telp', TRUE),
					'negara' => $this->input->post('negara', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'rt' => $this->input->post('rt', TRUE),
					'rw' => $this->input->post('rw', TRUE),
					'desa' => $this->input->post('desa', TRUE),
					'kec' => $this->input->post('kec', TRUE),
					'kab' => $this->input->post('kab', TRUE),
					'prov' => $this->input->post('prov', TRUE),
					'kd_post' => $this->input->post('kd_post', TRUE),
				);
			} else {

				$data = array(
					'nama' => $this->input->post('nama', TRUE),
					'email' => $this->input->post('email', TRUE),
					'password' => $pass,
					'images' => $foto['file_name'],
					'id_user_level' => $this->input->post('id_user_level', TRUE),
					'is_aktif' => $this->input->post('is_aktif', TRUE),
					'nik' => $this->input->post('nik', TRUE),
					'no_kk' => $this->input->post('no_kk', TRUE),
					'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
					'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
					'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
					'status_menikah' => $this->input->post('status_menikah', TRUE),
					'pekerjaan' => $this->input->post('pekerjaan', TRUE),
					'agama' => $this->input->post('agama', TRUE),
					'no_telp' => $this->input->post('no_telp', TRUE),
					'negara' => $this->input->post('negara', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'rt' => $this->input->post('rt', TRUE),
					'rw' => $this->input->post('rw', TRUE),
					'desa' => $this->input->post('desa', TRUE),
					'kec' => $this->input->post('kec', TRUE),
					'kab' => $this->input->post('kab', TRUE),
					'prov' => $this->input->post('prov', TRUE),
					'kd_post' => $this->input->post('kd_post', TRUE),
				);
			}

			$this->User_model->update($this->input->post('id_users', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('user'));
		}
	}

	public function delete($id)
	{
		$row = $this->User_model->get_by_id($id);

		if ($row) {
			$this->User_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('user'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('user'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		// $this->form_validation->set_rules('password', 'password', 'trim|required');
		//$this->form_validation->set_rules('images', 'images', 'trim|required');
		$this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
		$this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');
		$this->form_validation->set_rules('nik', 'nik', 'trim|required');
		$this->form_validation->set_rules('no_kk', 'no kk', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
		$this->form_validation->set_rules('status_menikah', 'status menikah', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');
		$this->form_validation->set_rules('agama', 'agama', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
		$this->form_validation->set_rules('negara', 'negara', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'rt', 'trim|required');
		$this->form_validation->set_rules('rw', 'rw', 'trim|required');
		$this->form_validation->set_rules('desa', 'desa', 'trim|required');
		$this->form_validation->set_rules('kec', 'kec', 'trim|required');
		$this->form_validation->set_rules('kab', 'kab', 'trim|required');
		$this->form_validation->set_rules('prov', 'prov', 'trim|required');
		$this->form_validation->set_rules('kd_post', 'kd post', 'trim|required');
		$this->form_validation->set_rules('id_users', 'id_users', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	private function _upload_foto()
	{
		$config['upload_path']          = './assets/foto_profil/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = 'foto_profil' . time();
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// $this->upload->initialize($config);
		$this->upload->do_upload('images');
		return $this->upload->data();
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "tbl_user.xls";
		$judul = "tbl_user";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Email");
		xlsWriteLabel($tablehead, $kolomhead++, "Password");
		xlsWriteLabel($tablehead, $kolomhead++, "Images");
		xlsWriteLabel($tablehead, $kolomhead++, "Id User Level");
		xlsWriteLabel($tablehead, $kolomhead++, "Is Aktif");
		xlsWriteLabel($tablehead, $kolomhead++, "Nik");
		xlsWriteLabel($tablehead, $kolomhead++, "No Kk");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
		xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Menikah");
		xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");
		xlsWriteLabel($tablehead, $kolomhead++, "Agama");
		xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
		xlsWriteLabel($tablehead, $kolomhead++, "Negara");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Rt");
		xlsWriteLabel($tablehead, $kolomhead++, "Rw");
		xlsWriteLabel($tablehead, $kolomhead++, "Desa");
		xlsWriteLabel($tablehead, $kolomhead++, "Kec");
		xlsWriteLabel($tablehead, $kolomhead++, "Kab");
		xlsWriteLabel($tablehead, $kolomhead++, "Prov");
		xlsWriteLabel($tablehead, $kolomhead++, "Kd Post");

		foreach ($this->User_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->email);
			xlsWriteLabel($tablebody, $kolombody++, $data->password);
			xlsWriteLabel($tablebody, $kolombody++, $data->images);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_user_level);
			xlsWriteLabel($tablebody, $kolombody++, $data->is_aktif);
			xlsWriteLabel($tablebody, $kolombody++, $data->nik);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_kk);
			xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
			xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
			xlsWriteLabel($tablebody, $kolombody++, $data->status_menikah);
			xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);
			xlsWriteLabel($tablebody, $kolombody++, $data->agama);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_telp);
			xlsWriteLabel($tablebody, $kolombody++, $data->negara);
			xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
			xlsWriteLabel($tablebody, $kolombody++, $data->rt);
			xlsWriteLabel($tablebody, $kolombody++, $data->rw);
			xlsWriteLabel($tablebody, $kolombody++, $data->desa);
			xlsWriteLabel($tablebody, $kolombody++, $data->kec);
			xlsWriteLabel($tablebody, $kolombody++, $data->kab);
			xlsWriteLabel($tablebody, $kolombody++, $data->prov);
			xlsWriteLabel($tablebody, $kolombody++, $data->kd_post);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}

	public function word()
	{
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=tbl_user.doc");

		$data = array(
			'tbl_user_data' => $this->User_model->get_all(),
			'start' => 0
		);

		$this->load->view('user/tbl_user_doc', $data);
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-03 05:31:40 */
/* http://harviacode.com */