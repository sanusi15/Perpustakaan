<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    
    public function index()
    {        
        $this->load->view('login/index');
    }

    public function cekLogin()
    {

        $inp1 = $this->input->post('username');
        $inp2 = $this->input->post('password');
        

        $getDb = $this->db->get_where('tbl_user', ['username' => $inp1]);                       
        if($getDb->num_rows() >= 1){
            $user = $getDb->row_array();            
            if($user['password'] == $inp2){
                $data = $user;
                $this->session->set_userdata('user', $data);
                redirect('welcome');
            }else{
                $this->session->set_flashdata('pesan', 'Login Gagal, Password salah!');
                redirect('');
            }
        }else{
            $this->session->set_flashdata('pesan', 'Login Gagal, Harap cek kembali username dan password anda!');
            redirect('');
        }
    }

    public function upPw()
    {
        $pw1 = $this->input->post('pw1');
        $pw2 = $this->input->post('pw2');
        $user = $this->session->userdata('user');

        if($pw1 == $pw2){
            $data = [
                'password' => $pw1,
            ];
            $this->db->where('id_user', $user['id_user']);
            $this->db->update('tbl_user', $data);
            $this->session->set_flashdata('msg', 'Data berhasil di ubah');
            redirect('welcome/profile');
        }else{
            $this->session->set_flashdata('failed', 'Password tidak sesuai');
            redirect('welcome/profile');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('');
    }
    
}
