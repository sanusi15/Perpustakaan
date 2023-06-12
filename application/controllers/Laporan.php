<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/laporan/index.php');
        $this->load->view('admin/layouts/footer.php');
    }

    public function cetak()
    {
        $getData = $this->AdminModel->get_data_by_date_range($this->input->post('tgl1'), $this->input->post('tgl2'));
        $data['count'] = $this->AdminModel->get_count_denda();        
        if($getData->num_rows() > 0){
            $data['result'] = $getData->result_array();
            $data['tgl'] = [
                "1" => $this->input->post('tgl1'),
                "2" => $this->input->post('tgl2'),
            ];
            $this->load->view('admin/laporan/print.php', $data);
        }else{
            $this->session->set_flashdata('msg', 'Tidak ada data');
            redirect('laporan');
        }


    }
    public function destroyRak()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_rak', ['id_rak' => $id]);
        echo json_encode('success');
    }
}
