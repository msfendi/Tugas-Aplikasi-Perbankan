<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Presensi_model extends CI_Model
{

  public function tambah_absen($id, $ket)
  {
    $data = [
      'id_karyawan' => $id,
      'tgl_kehadiran' => date("Y-m-d"),
      'jam_masuk' => date("H:i:sa"),
      'jam_pulang' => '00:00:00',
      'status_kehadiran' => 'Hadir',
      'keterangan' => $ket
    ];

    $this->db->insert('kehadiran', $data);
  }

  public function data_kehadiran_hari_ini($id)
  {
    return $this->db->get_where('kehadiran', ['id_karyawan' => $id, 'tgl_kehadiran' => date("Y-m-d")]);
  }


  public function update_absen($id)
  {
    $data = [
      'jam_pulang' => date("H:i:sa")
    ];
    $this->db->update('kehadiran', $data, ['id_karyawan' => $id, 'tgl_kehadiran' => date("Y-m-d")]);
  }

  public function getAllDataKehadiran($id)
  {
    return $this->db->get_where('kehadiran', ['id_karyawan' => $id])->result_array();
  }

  public function tambah_izin($post, $data)
  {
    $data = [
      'id_karyawan' => $this->fungsi->user_login()->id_karyawan,
      'tgl_kehadiran' => date("Y-m-d"),
      'jam_masuk' => date("H:i:sa"),
      'jam_pulang' => date("H:i:sa"),
      'status_kehadiran' => 'Tidak Hadir',
      'keterangan' => $post['keterangan'],
      'lampiran' => $data['upload_data']['file_name']
    ];

    $this->db->insert('kehadiran', $data);
  }

  public function getDataKehadiranById($id)
  {
    return $this->db->get_where('kehadiran', ['id_kehadiran' => $id])->row_array();
  }

  public function hapus_absen($id)
  {
    $this->db->delete('kehadiran', ['id_kehadiran' => $id]);
  }
}
