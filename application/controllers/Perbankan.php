<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perbankan extends CI_Controller
{
    // function __construct()
    // {
    //     parent::__construct();
    //     cek_belum_login();  // Fungsi untuk melakukan pengecekan apakah sudah login/belum (fungsi_helper.php)
    //     cek_admin();
    //     $this->load->model('divisi_model');
    // }

    public function index()
    {
        //$data['row'] = $this->divisi_model->get();  //get data dari tabel divisi (divisi_model.php)
        $this->load->view('landing_page/index');
    }
}
