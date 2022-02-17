<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_lama extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_belum_login();
    $this->load->model(['Presensi_model', 'Karyawan_model']);
    date_default_timezone_set('asia/jakarta');
    $this->id = $this->fungsi->user_login()->id_karyawan;
    $this->waktu_sekarang     = strtotime('now');
    $this->batas_absen_masuk  = strtotime('08:30:00');
    $this->waktu_absen_pulang = strtotime('16:00:00');
    $this->hari_libur         = ['Sat', 'Mon'];
  }

  public function index()
  {
    if (in_array(date('D'), $this->hari_libur)) {
      $this->session->set_userdata('disable_tombol_absen', false);
      $this->session->set_userdata('disable_tombol_izin', false);
    } else {
      // enable tombol untuk absen masuk
      // jika tombol absen disable dan belum absen masuk
      if ($this->session->has_userdata('disable_tombol_absen') && $this->Presensi_model->data_kehadiran_hari_ini($this->id)->num_rows() == 0) {
        $this->session->unset_userdata('disable_tombol_absen');
      }
      // enable tombol untuk absen pulang
      // jika tomvol absen disable dan jika sudah masuk waktu absen pulang dan absen pulang masih kosong
      if ($this->session->has_userdata('disable_tombol_absen') && $this->waktu_sekarang >= $this->waktu_absen_pulang && $this->Presensi_model->data_kehadiran_hari_ini($this->id)->row_array()['jam_pulang'] == '00:00:00') {
        $this->session->unset_userdata('disable_tombol_absen');
      }
      // enable tombol izin
      // jika belum absen masuk
      if ($this->session->has_userdata('disable_tombol_izin') && $this->Presensi_model->data_kehadiran_hari_ini($this->id)->num_rows() == 0) {
        $this->session->unset_userdata('disable_tombol_izin');
      }

      // jika tombol izin belum disable tetapi sudah absen
      if (!$this->session->has_userdata('disable_tombol_izin') && $this->Presensi_model->data_kehadiran_hari_ini($this->id)->num_rows() == 1) {
        $this->session->set_userdata('disable_tombol_izin', false);
      }
    }

    $data['karyawan'] = $this->fungsi->user_login();
    $data['dbabsen']  = $this->Presensi_model->data_kehadiran_hari_ini($this->id)->row_array();
    $data['setting'] = [
      'batas_absen_masuk' => date('H:i:s', $this->batas_absen_masuk),
      'waktu_absen_pulang' => date('H:i:s', $this->waktu_absen_pulang),
      'status_kehadiran' => ['Hadir', 'Izin', 'Sakit']

    ];
    $this->template->load('template', 'presensi/absen', $data);
  }

  public function data_kehadiran($id = null)
  {
    if ($id == null) {
      $id_karyawan = $this->id;
    } else {
      cek_admin();
      $id_karyawan = $id;
    }
    $data['presensi'] = $this->Presensi_model->getAllDataKehadiran($id_karyawan);
    $data['karyawan'] = $this->Karyawan_model->get($id_karyawan)->result_array();
    $this->template->load('template', 'presensi/data_kehadiran', $data);
  }

  public function rekap_kehadiran()
  {
    cek_admin();
    $data['karyawan'] = $this->Karyawan_model->get()->result_array();
    $this->template->load('template', 'presensi/rekap_kehadiran', $data);
  }

  public function izin()
  {
    $data['karyawan'] = $this->fungsi->user_login();
    $this->template->load('template', 'presensi/form_izin', $data);
  }

  public function process()
  {
    // absen
    if (isset($_POST['absen'])) {

      $dbabsen = $this->Presensi_model->data_kehadiran_hari_ini($this->id)->row_array();

      // cek apakah karyawan sudah absen hari ini
      if ($this->Presensi_model->data_kehadiran_hari_ini($this->id)->num_rows() == 0) {
        $ket = ($this->waktu_sekarang > $this->batas_absen_masuk) ? 'Terlambat' : 'Tepat Waktu';
        // lakukan absen
        $this->Presensi_model->tambah_absen($this->id, $ket);

        // jika belum waktunya absen pulang disable tombol absen
        if ($this->waktu_sekarang < $this->waktu_absen_pulang) {
          $this->session->set_userdata('disable_tombol_absen', false);
        }
        $this->session->set_userdata('disable_tombol_izin', false);
      } else if ($this->waktu_sekarang >= $this->waktu_absen_pulang) { // cek apakah sudah waktunya absen pulang
        // cek apakah absen pulang masih kosong
        if ($dbabsen['jam_pulang'] == '00:00:00') {
          $this->Presensi_model->update_absen($this->id);
          $this->session->set_userdata('disable_tombol_absen', false);
        }
      }
    }

    if (isset($_POST['izin'])) {
      redirect('presensi/izin');
    }

    // izin
    $post = $this->input->post(null, true);
    if (isset($_POST['simpanizin'])) {

      // upload
      $config['upload_path']          = './upload/bukti_izin/';
      $config['allowed_types']        = 'jpg|png|jpeg';
      $config['max_size']             = 2000;
      $config['max_width']            = 0;
      $config['max_height']           = 0;
      $config['encrypt_name']         = TRUE;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('lampiran')) {
        $data = $this->upload->display_errors();
        $this->session->set_flashdata('error', $data);
        redirect('presensi/izin');
      } else {
        $data = array('upload_data' => $this->upload->data());
        $this->Presensi_model->tambah_izin($post, $data);
        $this->session->set_userdata('disable_tombol_absen', false);
        $this->session->set_userdata('disable_tombol_izin', false);
      }
    }

    redirect('presensi');
  }

  // hapus
  public function hapus($id)
  {
    cek_admin();
    $data = $this->Presensi_model->getDataKehadiranById($id);
    if (empty($data['lampiran'])) {
      $this->Presensi_model->hapus_absen($id);
    } else {
      $this->Presensi_model->hapus_absen($id);
      unlink('./upload/bukti_izin/' . $data['lampiran']);
    }
    redirect('presensi/data_kehadiran/' . $data['id_karyawan']);
  }
}
