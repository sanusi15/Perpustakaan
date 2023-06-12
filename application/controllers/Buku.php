<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
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
        $data['buku'] = $this->AdminModel->getBooks();        
        $data['kategori'] = $this->db->get('tbl_kategori')->result_array();
        $data['rak'] = $this->db->get('tbl_rak')->result_array();


        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/buku.php', $data);
        $this->load->view('admin/layouts/footer.php');
    }
   
    public function getBuku()
    {
        $id = $this->input->post('id');
        $buku = $this->AdminModel->getBook($id);
        echo json_encode($buku->row_array());
    }
    public function saveBuku()
    {
        $file_name = str_replace('.', '', 'buku');
        $config['upload_path']          = './assets/img/buku';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $file_name;
        $this->load->library('upload', $config);

        $kode_buku = $this->AdminModel->generateCode("BK", "tbl_buku", "kode_buku");
        if (!$this->upload->do_upload('gambar')) {
            $data['error'] = $this->upload->display_errors();
        } else {
            $uploaded_data = $this->upload->data();
            $data = [
                'judul' => $this->input->post('judul'),
                'kode_buku' => $kode_buku,
                'id_kategori' => $this->input->post('kategori'),
                'id_rak' => $this->input->post('rak'),
                'pengarang' => $this->input->post('pengarang'),
                'penerbit' => $this->input->post('penerbit'),
                'isbn' => $this->input->post('isbn'),
                'stok' => $this->input->post('stok'),
                'gambar' => $uploaded_data['file_name'],
            ];
            
            $this->db->insert('tbl_buku', $data);
            $this->session->set_flashdata('msg', 'Data berhasil ditambah');
            redirect('buku');
            
        }
    

       
    }
    public function updtBuku()
    {
        $file_name = str_replace('.', '', 'buku');
        $config['upload_path']          = './assets/img/buku';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = $file_name;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('gambar')){
            $data = [
                'judul' => $this->input->post('judul'),
                'id_kategori' => $this->input->post('kategori'),
                'id_rak' => $this->input->post('rak'),
                'pengarang' => $this->input->post('pengarang'),
                'penerbit' => $this->input->post('penerbit'),
                'isbn' => $this->input->post('isbn'),
                'stok' => $this->input->post('stok'),
            ];
            $id = $this->input->post('id');
            $this->db->where('id_buku', $id);
            $this->db->update('tbl_buku', $data);
            $this->session->set_flashdata('msg', 'Data berhasil diubah');
            redirect('buku');
        }else{
            $uploaded_data = $this->upload->data();
            $data = [
                'judul' => $this->input->post('judul'),
                'id_kategori' => $this->input->post('kategori'),
                'id_rak' => $this->input->post('rak'),
                'pengarang' => $this->input->post('pengarang'),
                'penerbit' => $this->input->post('penerbit'),
                'isbn' => $this->input->post('isbn'),
                'stok' => $this->input->post('stok'),
                'gambar' => $uploaded_data['file_name'],
            ];
            $id = $this->input->post('id');
            $this->db->where('id_buku', $id);
            $this->db->update('tbl_buku', $data);
            $this->session->set_flashdata('msg', 'Data berhasil diubah');
            redirect('buku');
        }
       
    }
    public function destroyBuku()
    {
        $id = $this->input->post('id');
        $this->db->delete('tbl_buku', ['kode_buku' => $id]);
        echo json_encode('success');
    }
}
