<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Denda extends CI_Controller
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
        $data['denda'] = $this->db->get('tbl_biaya_denda')->row_array();
        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/denda.php', $data);
        $this->load->view('admin/layouts/footer.php');
    }

    public function update()
    {
        
        $data = [
            'id_biaya_denda' => 1,
            'batas' => $this->input->post('batas'),
            'nominal' => $this->input->post('nominal'),
        ];
        $this->db->replace('tbl_biaya_denda', $data);
        $this->session->set_flashdata('msg', 'Data berhasil ditambah');
        redirect('denda');
    }

}
