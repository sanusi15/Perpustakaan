<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $data['kategori'] = $this->db->get('tbl_kategori')->result_array();
        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/kategori.php', $data);
        $this->load->view('admin/layouts/footer.php');
    }
   
    public function getKategori()
    {
        $id = $this->input->post('id');
        echo json_encode($this->db->get_where('tbl_kategori', ['id_kategori' => $id])->row_array());
    }
    public function saveKategori()
    {
        $data = [
            'nama_kategori' => $this->input->post('namaKategori'),
        ];
        $this->db->insert('tbl_kategori', $data);
        $this->session->set_flashdata('msg', 'Data berhasil ditambah');
        redirect('kategori');
    }
    public function updtKategori()
    {
        $id = $this->input->post('idKategori');
        $data = [

            'nama_kategori' => $this->input->post('namaKategori'),
        ];
        $this->db->where('id_kategori', $id);
        $this->db->update('tbl_kategori', $data);
        $this->session->set_flashdata('msg', 'Data berhasil diubah');
        redirect('kategori');
    }
    public function destroyKategori()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_kategori', ['id_kategori' => $id]);
        echo json_encode('success');
    }
}
