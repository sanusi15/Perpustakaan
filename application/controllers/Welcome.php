<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$user = $this->session->userdata('user');
		if($user == null){
			redirect('');
		}
		
	}
	public function index()
	{
		$data['user'] = $this->session->userdata('user');
		$data['jmlhDenda'] = $this->AdminModel->get_jml_denda()->num_rows();		
		$data['jBuku'] = $this->db->get('tbl_buku')->num_rows();
		$data['jSiswa'] = $this->db->get('tbl_siswa')->num_rows();
		$data['jTransaksi'] = $this->AdminModel->getAllTransaksi()->num_rows();
		$this->load->view('admin/layouts/header.php');
		$this->load->view('admin/layouts/sidebar.php');
		$this->load->view('admin/index.php', $data);
		$this->load->view('admin/layouts/footer.php');
	}

	public function profile()
	{
		$user = $this->session->userdata('user');		
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $user['username']])->row_array();
		
		$this->load->view('admin/layouts/header.php');
		$this->load->view('admin/layouts/sidebar.php');
		$this->load->view('admin/profile', $data);
		$this->load->view('admin/layouts/footer.php');
	}

	public function getUser()
	{
		echo json_encode($this->session->userdata('user'));
	}

	public function updateProfile()
	{
		$user = $this->session->userdata('user');	
		$id = $user['id_user'];
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');

		$file_name = str_replace('.', '', 'admin');
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['file_name']            = $file_name;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$data = [
				'nama' => $nama,
				'username' => $username,				
			];
			
			$this->db->where('id_user', $id);
			$this->db->update('tbl_user', $data);			
		} else {
			$uploaded_data = $this->upload->data();			
			$data = [
				'nama' => $nama,
				'username' => $username,
				'foto' => $uploaded_data['file_name'],
			];

			$this->db->where('id_user', $id);
			$this->db->update('tbl_user', $data);

		}
		$this->session->unset_userdata('user');
		$user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
		$this->session->set_userdata('user', $user);
		$this->session->set_flashdata('msg', 'Data berhasil diubah');
		redirect('welcome/profile');
	}


	
}
