<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(['Jurnal_model', 'Karyawan_model']);
    $this->user = $this->fungsi->user_login();
  }

  public function index()
  {
    $data['jurnal'] = $this->Jurnal_model->getDataJurnal($this->user->id_karyawan);
    $data['nama'] = $this->user->nama_karyawan;
    $this->template->load('template', 'jurnal/data_jurnal', $data);
  }

  public function tambah()
  {
    $data['jurnal'] = [
      'id_jurnal' => null,
      'id_karyawan' => $this->user->id_karyawan,
      'tanggal' => null,
      'jenis' => null,
      'keterangan' => null,
    ];
    $data['page'] = 'Tambah';
    $this->template->load('template', 'jurnal/form_jurnal', $data);
  }

  public function edit($id)
  {
    $data['jurnal'] = $this->Jurnal_model->getDataJurnalById($id)[0];
    if ($data['jurnal']) {
      $data['page'] = 'Edit';
      $this->template->load('template', 'jurnal/form_jurnal', $data);
    } else {
      redirect('jurnal');
    }
  }

  public function hapus($id)
  {
    $this->Jurnal_model->hapus($id);
    redirect('jurnal');
  }

  public function rekap_jurnal()
  {
    cek_admin();
    $data['karyawan'] = $this->Karyawan_model->get()->result_array();
    $this->template->load('template', 'jurnal/rekap_jurnal', $data);
  }

  public function details($id)
  {
    cek_admin();
    $data['jurnal'] = $this->Jurnal_model->getDataJurnal($id);
    $data['karyawan'] = $this->Karyawan_model->get($id)->row_array();
    if ($data['karyawan']) {
      $this->template->load('template', 'jurnal/details', $data);
    } else {
      redirect('jurnal/rekap_jurnal');
    }
  }

  public function process()
  {
    $post = $this->input->post(null, true);
    if (isset($_POST['Tambah'])) {
      $this->Jurnal_model->tambah($post);
      redirect('jurnal');
    }
    if (isset($_POST['Edit'])) {
      $this->Jurnal_model->edit($post);
      redirect('jurnal');
    }
  }
}
