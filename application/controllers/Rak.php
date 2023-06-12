<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak extends CI_Controller
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
        $data['rak'] = $this->db->get('tbl_rak')->result_array();
        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/rak.php', $data);
        $this->load->view('admin/layouts/footer.php');
    }
   
    public function saveRak()
    {        
        $data = [
            'nama_rak' => $this->input->post('namaRak'),
        ];
        $this->db->insert('tbl_rak', $data);
        $this->session->set_flashdata('msg', 'Data berhasil ditambah');
        redirect('rak');
    }   
    public function destroyRak()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_rak', ['id_rak' => $id]);
        echo json_encode('success');
    }
}
