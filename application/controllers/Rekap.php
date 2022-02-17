<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Rekap_model']);
    }

    public function index()
    {
        $data['karyawan'] = $this->Rekap_model->getAllKaryawan();
        $this->template->load('template', 'rekap/index', $data);
    }

    public function grafik($id_karyawan)
    {
        $data['karyawan'] = $this->Rekap_model->getKaryawanById($id_karyawan);
        $this->template->load('template', 'rekap/grafik', $data);
    }
}
