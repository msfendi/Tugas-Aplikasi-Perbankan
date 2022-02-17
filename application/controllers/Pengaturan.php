<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaturan_model');
        cek_belum_login();
        cek_admin();
    }

    public function index()
    {
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturan();
        $this->template->load('template', 'pengaturan/index', $data);
    }

    public function update()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['simpan_pengaturan'])) {
            $this->Pengaturan_model->update($post);
            $this->session->set_flashdata('simpan_pengaturan', 'berhasil');
            redirect('pengaturan');
        }
    }
}
