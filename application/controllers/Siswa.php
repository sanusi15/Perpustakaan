<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user = $this->session->userdata('user');
        if ($user == null) {
            redirect('');
        }
    }

    public function index()
    {
        $data['siswa'] = $this->AdminModel->getAllSiswa('', '')->result_array();        
        $data['jurusan'] = $this->db->get('tbl_jurusan')->result_array();        
        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/siswa.php', $data);
        $this->load->view('admin/layouts/footer.php');
    }

    public function tambah(){
        $data = [
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'id_jurusan' => $this->input->post('jurusan'),
            'gender' => $this->input->post('gender'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->db->insert('tbl_siswa', $data);
        $this->session->set_flashdata('msg', 'Data berhasil ditambah');
        redirect('siswa');
    }

    public function ambil()
    {
        $id = $this->input->post('id');
        echo json_encode($this->AdminModel->getAllSiswa('id_siswa',$id)->row_array());
    }

    public function update()
    {
        $data = [
            'id_siswa' => $this->input->post('idSiswa'),
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'id_jurusan' => $this->input->post('jurusan'),
            'gender' => $this->input->post('gender'),
            'alamat' => $this->input->post('alamat'),
        ];
        $this->db->where('id_siswa', $this->input->post('idSiswa'));
        $this->db->update('tbl_siswa', $data);
        $this->session->set_flashdata('msg', 'Data berhasil diubah');
        redirect('siswa');
    }

    public function destroy()
    {
        $id = $this->input->post('id');
        $this->db->where('id_siswa', $id);
        $this->db->delete('tbl_siswa');
        echo json_encode('success');
    }
}
