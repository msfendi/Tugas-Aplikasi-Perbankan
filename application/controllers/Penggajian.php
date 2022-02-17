<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggajian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_belum_login();
        cek_admin();
        $this->load->model(['divisi_model', 'karyawan_model', 'penggajian_model']);
    }

    public function index()
    {
        $data['row'] = $this->penggajian_model->getBulan();
        $this->template->load('template', 'penggajian_bulan/bulan_gaji_data', $data);
    }

    public function addBulan()
    {
        $bulan = new stdClass(); //membuat objek baru
        $bulan->id_bulan = null;
        $bulan->nama_bulan = null;
        $data = array(
            'page' => 'add',
            'row' => $bulan
        );
        $this->template->load('template', 'penggajian_bulan/bulan_gaji_form', $data);
    }

    public function processBulan()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->penggajian_model->addBulan($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil ditambah');
        }
        redirect('penggajian');
    }

    public function gajiBulan($date)
    {
        $data = array(
            'row' => $this->penggajian_model->getGajiBulan($date),
            'date' => $date
        );
        $this->template->load('template', 'penggajian/penggajian_data', $data);
    }

    public function addGaji($date)
    {
        $gaji = new stdClass(); //membuat objek baru
        $gaji->id_karyawan = null;
        $gaji->nama_karyawan = null;
        $gaji->id_divisi = null;
        //$gaji->bulan = null;
        $gaji->gaji_bersih = null;
        $karyawan = $this->karyawan_model->get();
        $divisi = $this->divisi_model->get();
        $data = array(
            'page' => 'add',
            'karyawan' => $karyawan,
            'divisi' => $divisi,
            'row' => $gaji,
            'date' => $date
            //'bulan' =>
        );
        $this->template->load('template', 'penggajian/penggajian_form', $data);
    }

    public function processGaji()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->penggajian_model->addGaji($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil ditambah');
        }
        redirect('penggajian');
    }
}
