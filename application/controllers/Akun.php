<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_belum_login();  // Fungsi untuk melakukan pengecekan apakah sudah login/belum (fungsi_helper.php)
        $ci = &get_instance();
        $this->id = $ci->session->userdata('idakun');
        $this->load->model('akun_model');
    }

    public function index()
    {
        // $data['row'] = $this->divisi_model->get();  //get data dari tabel divisi (divisi_model.php)
        // $this->template->load('template', 'divisi/divisi_data', $data);
    }

    public function setting()
    {
        $query = $this->akun_model->getAkun($this->id);
        if ($query->num_rows() > 0) {
            $akun = $query->row();
            $ci = &get_instance();
            $data = array(
                'id_akun' => $akun->id_akun,
                'nama' => $this->fungsi->user_login()->nama_karyawan,
                'username' => $akun->username,
            );
            $this->template->load('template', 'akun/setting_akun', $data);
        }
    }

    public function edit()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['edit'])) {
            $this->akun_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil diubah');
        }
        redirect('akun/setting');
    }
}
