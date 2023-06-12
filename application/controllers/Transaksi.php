<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $data['transaksi'] = $this->AdminModel->getAllTransaksi()->result_array();        

        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/transaksi/index.php', $data);
        $this->load->view('admin/layouts/footer.php');
    }
    public function terlambat()
    {
        // $data['transaksi'] = $this->AdminModel->getAllTransaksi();
        $data['transaksi'] = $this->AdminModel->get_jml_denda()->result_array();        

        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/transaksi/telat', $data);
        $this->load->view('admin/layouts/footer.php');
    }

    public function add()
    {
        $data['buku'] = $this->AdminModel->getBooks();
        $data['siswa'] = $this->AdminModel->getAllSiswa('', '')->result_array();
        $data['kode_pinjam'] = $this->AdminModel->generateCode("TR", "tbl_transaksi", "no_pinjam");
        
        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/transaksi/add2.php', $data);
        $this->load->view('admin/layouts/footer.php');
    }

    public function showDetail($noP)
    {        
        $transaksi = $this->db->get_where('tbl_transaksi', ['no_pinjam' => $noP]);
        $data['dt'] = $transaksi->row_array(); 
        $data['ds'] = $this->AdminModel->getAllSiswa('nisn', $data['dt']['nisn'])->row_array();
        $data['dib'] = $transaksi->result_array();

        $denda = $this->db->get_where('tbl_denda', ['no_pinjam' => $noP]);
        $total_denda = $denda->row();
        
        if ($data['dt']['status'] == 'Di Kembalikan') {
            echo $this->AdminModel->rp($total_denda->denda);
        } else {            
            $tgl1 = $data['dt']['tgl_kembali'];
            $today = date('Y-m-d');
            $selisih = strtotime($today) - strtotime($tgl1); // menghitung selisih waktu dalam detik
            $selisih_minggu = floor($selisih / (60 * 60 * 24 * 7)); // menghitung selisih waktu dalam minggu bulat
            if ($selisih_minggu > 0) {
                $dd = $this->db->get('tbl_biaya_denda')->row();
                $denda = $selisih_minggu * $dd->nominal; // denda per minggu adalah 3000
                $data['denda'] = [
                    'status' => true,
                    'mingguTelat' => $selisih_minggu,
                    'dendaTotal' => $this->AdminModel->rp($denda),
                ];
            } else {
                $data['denda'] = [
                    "status" => false,
                ]; 
            }            
        }
        $this->load->view('admin/layouts/header.php');
        $this->load->view('admin/layouts/sidebar.php');
        $this->load->view('admin/transaksi/detail.php', $data);
        $this->load->view('admin/layouts/footer.php');
    }

    public function prosespinjam()
    {
        $post = $this->input->post();        
        if (!empty($post['tambah'])) {

            $tgl = $post['tgl'];
            $lama_pinjam = $this->db->get('tbl_biaya_denda')->row_array();
            $tglBaru = new DateTime($tgl);            
            $tglBaru->modify("+". intval($lama_pinjam['batas'])." day");
            $tgl2 = $tglBaru->format('Y-m-d');            
            
            $hasil_cart = array_values(unserialize($this->session->userdata('cart')));
            foreach ($hasil_cart as $isi) {
                $data[] = array(
                        'no_pinjam' => htmlentities($post['nopinjam']),
                        'nisn' => htmlentities($post['nisn']),
                        'kode_buku' => $isi['kode_buku'],
                        'tgl_pinjam' => htmlentities($post['tgl']),
                        'lama_pinjam' => $lama_pinjam['batas'],
                        'tgl_kembali'  => $tgl2,
                        'tgl_pengembalian'  => '0',
                        'status' => 'Dipinjam',
                    );
            }
            foreach ($hasil_cart as $isi) {
                $kode_buku = $isi['kode_buku'];
                $stok_baru = $isi['stok'] - 1;
                $this->db->set('stok', $stok_baru);
                $this->db->where('kode_buku', $kode_buku);
                $this->db->update('tbl_buku');
            }
            $total_array = count($data);
            if ($total_array != 0
            ) {
                $this->db->insert_batch('tbl_transaksi', $data);

                $cart = array_values(unserialize($this->session->userdata('cart')));
                for ($i = 0; $i < count($cart); $i++) {
                    unset($cart[$i]);
                    $this->session->unset_userdata($cart[$i]);
                    $this->session->unset_userdata('cart');
                }
            }

            $this->session->set_flashdata('msg', 'Data berhasil ditambah');
            redirect('transaksi');
        }
        
        if ($this->input->get('id')) {            
            $this->AdminModel->delete_table('tbl_transaksi', 'no_pinjam', $this->input->get('id'));
            $this->AdminModel->delete_table('tbl_denda', 'no_pinjam', $this->input->get('id'));            
            echo json_encode('success');
            
        }
        
    }

    public function kembaliBuku()
    {
        $noP = $this->input->post('nop');
        $tr = $this->AdminModel->getAllTransaksiId($noP)->row_array();
        $jml = $this->db->get_where('tbl_transaksi',['no_pinjam' => $noP])->num_rows();

        $tgl1 = $tr['tgl_kembali'];
        $today = date('Y-m-d');        

        $selisih = strtotime($today) - strtotime($tgl1); // menghitung selisih waktu dalam detik
        $selisih_minggu = floor($selisih / (60 * 60 * 24 * 7)); // menghitung selisih waktu dalam minggu bulat
        if ($selisih_minggu > 0) {
            $dd = $this->db->get('tbl_biaya_denda')->row();
            $denda = $selisih_minggu * $dd->nominal; // denda per minggu adalah 3000
            $dendaTotal = $denda;
        } else {
            $dendaTotal = 0;
            $selisih_minggu =0;
        }   

        $data = [
            "no_pinjam" => $tr['no_pinjam'],
            "tgl_pinjam" => $tr['tgl_pinjam'],
            "tgl_kembali" => $tr['tgl_kembali'],
            "nisn" => $tr['nisn']." (".$tr['nama'].")",
            "lama_pinjam" => $tr['lama_pinjam'],
            "tgl_pengembalian" => date('Y-m-d') ." (Sekarang)",
            "lewat_hari" => $selisih_minggu." Minggu",
            "detail_buku" => $jml." Buku",
            "denda" => $this->AdminModel->rp($dendaTotal),
            
        ];
        echo json_encode($data);

    }

    public function prosesKembali($noP)
    {       
        $tr = $this->AdminModel->getAllTransaksiId($noP)->row_array();             
        $bt = $this->db->get_where('tbl_transaksi', ['no_pinjam' => $noP])->result_array();        
        
        $tgl1 = $tr['tgl_kembali'];
        $today = date('Y-m-d');
        $selisih = strtotime($today) - strtotime($tgl1); // menghitung selisih waktu dalam detik
        $selisih_minggu = floor($selisih / (60 * 60 * 24 * 7)); // menghitung selisih waktu dalam minggu bulat
        if ($selisih_minggu > 0) {
            $dd = $this->db->get('tbl_biaya_denda')->row();
            $denda = $selisih_minggu * $dd->nominal; // denda per minggu adalah 3000
            $dendaTotal = $denda;
        } else {
            $dendaTotal = 0;
        }   
        
        $data = array(
            'status' => 'Di Kembalikan',
            'tgl_pengembalian'  => date('Y-m-d'),
        );

        $total_array = count($data);
        if ($total_array != 0) {
            $this->db->where('no_pinjam', $noP);
            $this->db->update('tbl_transaksi', $data);
        }

        $data_denda = array(
            'no_pinjam' => $noP,
            'denda' => $dendaTotal,
            'lama_pinjam' => $tr['lama_pinjam'],
            'tgl_denda' => date('Y-m-d'),
        );

        
        foreach ($bt as $isi) {
            $getBuku = $this->db->get_where('tbl_buku', ['kode_buku' => $isi['kode_buku']])->row_array();            
            $kode_buku = $isi['kode_buku'];
            $stok_baru = $getBuku['stok'] + 1;
            $this->db->set('stok', $stok_baru);
            $this->db->where('kode_buku', $kode_buku);
            $this->db->update('tbl_buku');
        }
        
        $this->db->insert('tbl_denda', $data_denda);
        $this->session->set_flashdata('msg', 'Data berhasil di update');
        redirect('transaksi');
    }

    public function buku()
    {
        $kode_buku = $this->input->post('kode_buku');
        $row = $this->AdminModel->getBook($kode_buku);

        if ($row->num_rows() > 0) {
            $tes = $row->row();
            $item = array(
                'kode_buku'      => $kode_buku,
                'judul'     => $tes->judul,
                'nama_kategori'   => $tes->nama_kategori,
                'stok' => $tes->stok,
            );
            if (!$this->session->has_userdata('cart')) {
                $cart = array($item);
                $this->session->set_userdata('cart', serialize($cart));
            } else {
                $index = $this->exists($kode_buku);
                $cart = array_values(unserialize($this->session->userdata('cart')));
                if ($index == -1) {
                    array_push($cart, $item);
                    $this->session->set_userdata('cart', serialize($cart));
                } else {
                    $this->session->set_userdata('cart', serialize($cart));
                }
            }
        } else {
        }
    }

    public function result()
    {
        $nisn = $this->input->post('kode_anggota');
        $siswa = $this->AdminModel->getAllSiswa('nisn', $nisn)->row();
        error_reporting(0);
        if ($siswa->nama != null) {
            echo '<table class="table table-borderless">
						<tr>
							<td>Nama Siswa</td>
							<td>:</td>
							<td>' . $siswa->nama . '</td>
						</tr>
						<tr>
							<td>Jurusan</td>
							<td>:</td>
							<td>' . $siswa->nama_jurusan . '</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>' . $siswa->gender . '</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<td>' . $siswa->alamat . '</td>
						</tr>
					</table>';
        } else {
            echo 'Anggota Tidak Ditemukan !';
        }
    }

    public function buku_list()
    {
    ?>
        <div class="white-box">
            <div class="row my-2">
                <div class="col-md-12">
                    <h3 class="box-title">List Buku</h3>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="border-top-0 text-center">No</th>
                            <th class="border-top-0 text-center">Judul</th>
                            <th class="border-top-0 text-center">Kategori</th>
                            <th class="border-top-0 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach (array_values(unserialize($this->session->userdata('cart'))) as $items) { ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $items['judul']; ?></td>
                                <td><?= $items['nama_kategori']; ?></td>

                                <td style="width:17%" class="text-center">
                                    <a href="javascript:void(0)" id="delete_buku<?= $no; ?>" data_<?= $no; ?>="<?= $items['kode_buku']; ?>" class="btn btn-danger btn-sm text-white">
                                        <i class="fas fa-times-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            <script>
                                $(document).ready(function() {
                                    $("#delete_buku<?= $no; ?>").click(function(e) {
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo base_url('transaksi/del_cart'); ?>",
                                            data: 'kode_buku=' + $(this).attr("data_<?= $no; ?>"),
                                            beforeSend: function() {},
                                            success: function(html) {
                                                $("#tampil").html(html);
                                            }
                                        });
                                    });
                                });
                            </script>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php foreach (array_values(unserialize($this->session->userdata('cart'))) as $items) { ?>
            <input type="hidden" value="<?= $items['kode_buku']; ?>" name="idbuku[]">
        <?php } ?>
        <div id="tampil"></div>
    <?php
    }

    public function del_cart()
    {
        error_reporting(0);
        $id = $this->input->post('kode_buku');
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
        // redirect('jual/tambah');
        echo '<script>$("#result_buku").load("' . base_url('transaksi/buku_list') . '");</script>';
    }

    private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['kode_buku'] == $id) {
                return $i;
            }
        }
        return -1;
    }
}
