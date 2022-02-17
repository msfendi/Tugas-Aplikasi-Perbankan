<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('divisi_model');
    // }

    public function index()
    {
        cek_sudah_login(); // Fungsi untuk melakukan pengecekan apakah sudah login/belum (fungsi_helper.php)
        $this->load->view('login');
    }

    public function register()
    {
        cek_sudah_login();
        $this->load->view('register');
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($post['login'])) {  // jika tombol btn login ditekan
            $this->load->model('akun_model');
            $query = $this->akun_model->login($post);  //akan mengirimkan data username dan password ke model (akun_model.php)
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'idakun' => $row->id_akun,
                    'idkaryawan' => $row->id_karyawan,
                    'level' => $row->id_pengguna,
                );
                $this->session->set_userdata($params); //untuk menyimpan session yang sedang login
                echo "<script> alert('Anda Berhasil Login');
                window.location = '" . site_url('presensi') . "';
                </script>";
            } else {
                echo "<script> alert('Login Tidak Berhasil, Pastikan Username/Password Sudah Benar');
                window.location = '" . site_url('auth') . "';
                </script>";
            }
        } else if (isset($post['register'])) {  // jika tombol btn login ditekan
            $this->load->model('akun_model');
            $query = $this->akun_model->cekKaryawan($post['fullname']);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $this->akun_model->add($row, $post);
            } else {
                echo "<script> alert('Nama Karyawan tidak terdaftar.');
                    window.location = '" . site_url('auth/register') . "';
                    </script>";
            }

            if ($this->db->affected_rows() > 0) {
                echo "<script> alert('Anda Telah Berhasil Registrasi, Silahkan Melakukan Login.');
                    window.location = '" . site_url('auth') . "';
                    </script>";
            }
        }
    }

    public function logout()
    {
        $params = array('idkaryawan', 'level');
        $this->session->unset_userdata($params); //untuk menghapus session yang sedang login
        redirect('auth');
    }
}
