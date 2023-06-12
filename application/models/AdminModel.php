<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    
    public function generateCode($prefix, $table, $field)
    {
        $row = $this->db->query("SELECT MAX($field) as max_code FROM $table WHERE $field LIKE '$prefix%'")->row_array();
        $maxCode = $row['max_code'];
        $num = intval(substr($maxCode, strlen($prefix)));
        $num++;
        $newCode = $prefix . sprintf('%03s', $num);
        return $newCode;
    }

    public function getBooks()
    {
        $this->db->select('*');
        $this->db->from('tbl_buku');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori');
        $this->db->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak');
        $this->db->order_by('id_buku', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
        
    }
    public function getBook($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_buku');
        $this->db->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori');
        $this->db->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak');
        $this->db->where('kode_buku', $id);
        $query = $this->db->get();
        return $query;        
    }

    public function getAllSiswa($where,$id)
    {
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_jurusan', 'tbl_siswa.id_jurusan = tbl_jurusan.id_jurusan', 'inner');
        if($where != ''){
            $this->db->where($where, $id);
        }        
        $query = $this->db->get();
        return $query;
    }

    public function getAllTransaksi()
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->group_by('no_pinjam');
        $this->db->join('tbl_buku', 'tbl_transaksi.kode_buku = tbl_buku.kode_buku', 'inner');
        $this->db->join('tbl_siswa', 'tbl_transaksi.nisn = tbl_siswa.nisn', 'inner');
        $query = $this->db->get();
        return $query;
    }
    public function getAllTransaksiId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_transaksi');
        $this->db->group_by('no_pinjam');
        $this->db->join('tbl_buku', 'tbl_transaksi.kode_buku = tbl_buku.kode_buku', 'inner');
        $this->db->join('tbl_siswa', 'tbl_transaksi.nisn = tbl_siswa.nisn', 'inner');
        $this->db->where('no_pinjam', $id);
        $query = $this->db->get();
        return $query;
    }

    function delete_table($table_name, $where, $id)
    {
        $this->db->where($where, $id);
        $hapus = $this->db->delete($table_name);
        return $hapus;
    }

    function rp($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.') . ',-';
        return $hasil_rupiah;
    }

    function get_tableid_edit($table_name, $where, $id)
    {
        $this->db->where($where, $id);
        $edit = $this->db->get($table_name);
        return $edit->row();
    }

    public function get_data_by_date_range($tgl1, $tgl2)
    {
        $this->db->select('*');
        $this->db->from('tbl_denda');
        $this->db->where('tgl_denda >=', $tgl1);
        $this->db->where('tgl_denda <=', $tgl2);
        $this->db->where('denda !=', 0);
        $query = $this->db->get();
        return $query;
    }

    public function get_count_denda()
    {
        $query = $this->db->query("SELECT SUM(denda) as totaldenda FROM tbl_denda");
        return $query->row()->totaldenda;
    }

    public function get_jml_denda()
    {
        $this->db->select('*');
        $this->db->group_by('no_pinjam');
        $this->db->join('tbl_buku', 'tbl_transaksi.kode_buku = tbl_buku.kode_buku', 'inner');
        $this->db->join('tbl_siswa', 'tbl_transaksi.nisn = tbl_siswa.nisn', 'inner');
        $this->db->where('tgl_kembali <', date('Y-m-d'));        
        $this->db->where('status','Dipinjam');
        $this->db->from('tbl_transaksi');
        $query = $this->db->get();
        return $query;
    }

}
