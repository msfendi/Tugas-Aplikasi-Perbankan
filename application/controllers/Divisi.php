<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_belum_login();  // Fungsi untuk melakukan pengecekan apakah sudah login/belum (fungsi_helper.php)
        cek_admin();
        $this->load->model('divisi_model');
    }

    public function index()
    {
        $data['row'] = $this->divisi_model->get();  //get data dari tabel divisi (divisi_model.php)
        $this->template->load('template', 'divisi/divisi_data', $data);
    }

    public function add()
    {
        $divisi = new stdClass(); //membuat objek baru
        $divisi->id_divisi = null;
        $divisi->nama_divisi = null;
        $divisi->gaji = null;
        $data = array(
            'page' => 'add',
            'row' => $divisi
        );
        $this->template->load('template', 'divisi/divisi_form', $data);
    }

    public function edit($id)
    {
        $query = $this->divisi_model->get($id);
        if ($query->num_rows() > 0) {
            $divisi = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $divisi
            );
            $this->template->load('template', 'divisi/divisi_form', $data);
        } else {
            echo "<script> alert('Data tidak ditemukan.');
                    window.location = '" . site_url('divisi') . "';
                    </script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->divisi_model->add($post);
        } else if (isset($_POST['edit'])) {
            $this->divisi_model->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil ditambah');
        }
        redirect('divisi');
    }

    public function delete($id)
    {
        $this->divisi_model->delete($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        }
        redirect('divisi');
    }
}
