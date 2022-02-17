<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_belum_login();
        cek_admin();
        $this->load->model(['divisi_model', 'karyawan_model']);
    }

    public function index()
    {
        $data['row'] = $this->karyawan_model->get();
        $this->template->load('template', 'karyawan/karyawan_data', $data);
    }

    public function add()
    {
        $karyawan = new stdClass();
        $karyawan->id_karyawan = null;
        $karyawan->id_divisi = null;
        $karyawan->nama_karyawan = null;
        $karyawan->tanggal_lahir = null;
        $karyawan->alamat = null;
        $karyawan->telepon = null;
        $divisi = $this->divisi_model->get();

        $data = array(
            'page' => 'add',
            'row' => $karyawan,
            'divisi' => $divisi
        );
        $this->template->load('template', 'karyawan/karyawan_form', $data);
    }

    public function edit($id)
    {
        $query = $this->karyawan_model->get($id);
        $divisi = $this->divisi_model->get();
        if ($query->num_rows() > 0) {
            $karyawan = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $karyawan,
                'divisi' => $divisi
            );
            $this->template->load('template', 'karyawan/karyawan_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan.');
                    window.location = '" . site_url('karyawan') . "';
                    </script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->karyawan_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->karyawan_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil ditambah');
        }
        redirect('karyawan');
    }

    public function delete($id)
    {
        $this->karyawan_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('karyawan');
    }
}
