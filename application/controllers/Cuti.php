<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_belum_login();
        $this->load->model(['Cuti_model', 'Karyawan_model', 'Pengaturan_model']);
        $this->id         = $this->fungsi->user_login()->id_karyawan;
        $this->batas_cuti = $this->Pengaturan_model->getPengaturan()->batas_cuti;
    }

    public function index()
    {
        $data['id_karyawan'] = $this->id;
        $data['cuti'] = [
            'id_cuti' => null,
            'tgl_awal' => null,
            'tgl_akhir' => null,
            'keterangan' => null
        ];
        $data['sisa_cuti'] = $this->batas_cuti - jumlah_cuti();
        $data['page'] = 'simpan_cuti';
        $this->template->load('template', 'cuti/index', $data);
    }

    public function data_cuti($id = null)
    {
        if ($id == null) {
            $id_karyawan = $this->id; // id user yang login
        } else {
            cek_admin();
            $id_karyawan = $id;
        }
        if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) && $id == null) {
            $data['cuti'] = $this->Cuti_model->getAllDataCuti();
        } else {
            $data['cuti'] = $this->Cuti_model->getDataCutiByIdKaryawan($id_karyawan);
        }

        $this->template->load('template', 'cuti/data_cuti', $data);
    }

    public function rekap_cuti()
    {
        cek_admin();
        $data['karyawan'] = $this->Karyawan_model->get()->result_array();
        $this->template->load('template', 'cuti/rekap_cuti', $data);
    }

    public function hapus($id)
    {
        $data = $this->Cuti_model->hapus_cuti($id);
        redirect('cuti/data_cuti/' . $data['id_karyawan']);
    }

    public function edit($id)
    {
        $data['id_karyawan'] = $this->id;
        $data['page'] = 'edit_cuti';
        $data['sisa_cuti'] = $this->batas_cuti - jumlah_cuti();
        $data['cuti'] = $this->Cuti_model->getDataCutiById($id);
        if ($data['cuti']) {
            $this->template->load('template', 'cuti/index', $data);
        } else {
            redirect('cuti/data_cuti');
        }
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['simpan_cuti'])) {
            if (jumlah_cuti() + selisih_hari($post['tgl_awal_cuti'], $post['tgl_akhir_cuti']) <= $this->batas_cuti) {
                $this->Cuti_model->tambah_cuti($post);
                redirect('cuti/data_cuti');
            } else {
                $this->session->set_flashdata('sisa_cuti', $this->batas_cuti - jumlah_cuti());
                redirect('cuti');
            }
        }

        if (isset($_POST['edit_cuti'])) {
            if (selisih_hari($post['tgl_awal_cuti'], $post['tgl_akhir_cuti']) + ($this->batas_cuti - jumlah_cuti()) <= $this->batas_cuti) {
                $this->Cuti_model->update_cuti($post);
                redirect('cuti/data_cuti');
            } else {
                $this->session->set_flashdata('sisa_cuti', $this->batas_cuti - jumlah_cuti());
                redirect('cuti/edit/' . $post['id_cuti']);
            }
            redirect('cuti/data_cuti');
        }
    }

    public function update_status($id_cuti, $status)
    {
        cek_admin();
        $this->Cuti_model->update_status($id_cuti, $status);
        redirect('cuti/data_cuti');
    }
}
