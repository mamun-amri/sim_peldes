<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('Pengajuan_model');
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$pengajuan = "";
		$level = $this->session->userdata('id_user_level');
		switch ($level) {
			case '1':
				$pengajuan = $this->Pengajuan_model->get_all();
				break;
			case '9': //9 lurah
				$pengajuan = $this->Pengajuan_model->get_all();
				break;
				// case '10'://rw
				// 	$this->db->where("rw",$this->session->userdata('rw'));
				// 	$pengajuan = $this->db->get("tbl_pengajuan")->result();
				// 	break;

				// case '11'://rt
				// 	$this->db->where("rw",$this->session->userdata('rw'));
				// 	$this->db->where("rt",$this->session->userdata('rt'));
				// 	$pengajuan = $this->db->get("tbl_pengajuan")->result();
				// 	break;

				// case '9'://lurah
				// 	$pengajuan = $this->Pengajuan_model->get_all();
				// 	break;
			default:
				$pengajuan = $this->Pengajuan_model->get_by_nik($this->session->userdata('nik'));
				break;
		}
		$data = array(
			'pengajuan_data' => $pengajuan
		);
		$data['title'] = "Kelola Data Pengajuan";
		$this->template->load('template', 'pengajuan/tbl_pengajuan_list', $data);
	}

	public function read($id)
	{
		$row = $this->Pengajuan_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id' => $row->id,
				'nama' => $row->nama,
				'email' => $row->email,
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
				'pengajuan' => $row->pengajuan,
				'lampiran' => $row->lampiran,
				'acc_rt' => $row->acc_rt,
				'acc_rw' => $row->acc_rw,
				'acc_kepdes' => $row->acc_kepdes,
			);
			$data['title'] = "Detail Data Pengajuan";
			$this->template->load('template', 'pengajuan/tbl_pengajuan_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pengajuan'));
		}
	}

	public function create()
	{
		$row = $this->User_model->get_by_id($this->session->userdata('nik'));
		if ($row) {
			$data = array(
				'button' => 'Create',
				'action' => site_url('pengajuan/create_action'),
				'id' => set_value('id'),
				'nama' => set_value('nama', $row->nama),
				'email' => set_value('email', $row->email),
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
				'pengajuan' => set_value('pengajuan', $row->pengajuan),
				'lampiran' => set_value('lampiran', $row->lampiran),
				'acc_rt' => set_value('acc_rt'),
				'acc_rw' => set_value('acc_rw'),
				'acc_kepdes' => set_value('acc_kepdes'),
			);
			$data['title'] = "Form Pengajuan";
			$this->template->load('template', 'pengajuan/tbl_pengajuan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Data Record Not Found!');
			redirect(site_url('pengajuan'));
		}
	}

	public function create_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$foto = $this->_upload_foto();
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'email' => $this->input->post('email', TRUE),
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
				'pengajuan' => $this->input->post('pengajuan', TRUE),
				'lampiran' => $foto['file_name'],
				'acc_rt' => '',
				'acc_rw' => '',
				'acc_kepdes' => '',
			);

			$this->Pengajuan_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success 2');
			redirect(site_url('pengajuan'));
		}
	}

	public function update($id)
	{
		$row = $this->Pengajuan_model->get_by_id($id);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('pengajuan/update_action'),
				'id' => set_value('id', $row->id),
				'nama' => set_value('nama', $row->nama),
				'email' => set_value('email', $row->email),
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
				'pengajuan' => set_value('pengajuan', $row->pengajuan),
				'lampiran' => set_value('lampiran', $row->lampiran),
				'acc_rt' => set_value('acc_rt', $row->acc_rt),
				'acc_rw' => set_value('acc_rw', $row->acc_rw),
				'acc_kepdes' => set_value('acc_kepdes', $row->acc_kepdes),
			);
			$data['title'] = "Form Pengajuan";
			$this->template->load('template', 'pengajuan/tbl_pengajuan_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pengajuan'));
		}
	}

	public function update_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id', TRUE));
		} else {
			$foto = $this->_upload_foto();
			// var_dump($foto);
			// die;
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'email' => $this->input->post('email', TRUE),
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
				'pengajuan' => $this->input->post('pengajuan', TRUE),
				'lampiran' => $foto['file_name'],
				'acc_rt' => $this->input->post('acc_rt', TRUE),
				'acc_rw' => $this->input->post('acc_rw', TRUE),
				'acc_kepdes' => $this->input->post('acc_kepdes', TRUE),
			);

			$this->Pengajuan_model->update($this->input->post('id', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('pengajuan'));
		}
	}

	private function _upload_foto()
	{
		$config['upload_path']          = './assets/lampiran/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = 'lampiran' . time();
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$this->load->library('upload', $config);
		// $this->upload->initialize($config);
		$this->upload->do_upload('lampiran');
		return $this->upload->data();
	}

	public function view($id)
	{
		$data['file'] = $id;
		$this->template->load('template', 'pengajuan/view', $data);
	}

	public function delete($id)
	{
		$row = $this->Pengajuan_model->get_by_id($id);

		if ($row) {
			$this->Pengajuan_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('pengajuan'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('pengajuan'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
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
		$this->form_validation->set_rules('pengajuan', 'pengajuan', 'trim|required');
		// $this->form_validation->set_rules('lampiran', 'lampiran', 'trim|required');
		// $this->form_validation->set_rules('acc_rt', 'acc rt', 'trim|required');
		// $this->form_validation->set_rules('acc_rw', 'acc rw', 'trim|required');
		// $this->form_validation->set_rules('acc_kepdes', 'acc kepdes', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "tbl_pengajuan.xls";
		$judul = "tbl_pengajuan";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Pengajuan");
		xlsWriteLabel($tablehead, $kolomhead++, "Lampiran");
		xlsWriteLabel($tablehead, $kolomhead++, "Acc Rt");
		xlsWriteLabel($tablehead, $kolomhead++, "Acc Rw");
		xlsWriteLabel($tablehead, $kolomhead++, "Acc Kepdes");

		foreach ($this->Pengajuan_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->email);
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
			xlsWriteLabel($tablebody, $kolombody++, $data->pengajuan);
			xlsWriteLabel($tablebody, $kolombody++, $data->lampiran);
			xlsWriteLabel($tablebody, $kolombody++, $data->acc_rt);
			xlsWriteLabel($tablebody, $kolombody++, $data->acc_rw);
			xlsWriteLabel($tablebody, $kolombody++, $data->acc_kepdes);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}

	public function word()
	{
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=tbl_pengajuan.doc");

		$data = array(
			'tbl_pengajuan_data' => $this->Pengajuan_model->get_all(),
			'start' => 0
		);

		$this->load->view('pengajuan/tbl_pengajuan_doc', $data);
	}

	function pdf()
	{
		$this->load->library('Pdf');
		$data = array(
			'tbl_pengajuan_data' => $this->Pengajuan_model->get_all(),
			'start' => 0
		);
		$this->load->view('pengajuan/tbl_pengajuan_pdf', $data);
	}
}

/* End of file Pengajuan.php */
/* Location: ./application/controllers/Pengajuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-03 13:49:08 */
/* http://harviacode.com */