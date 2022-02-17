<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti_model extends CI_Model
{

  public function tambah_cuti($post)
  {
    $data = [
      'id_karyawan' => $post['id_karyawan'],
      'tgl_awal' => $post['tgl_awal_cuti'],
      'tgl_akhir' => $post['tgl_akhir_cuti'],
      'keterangan' => $post['keterangan'],
      'status' => 'Pending'
    ];

    $this->db->insert('cuti', $data);
  }

  public function update_cuti($post)
  {
    $data = [
      'tgl_awal' => $post['tgl_awal_cuti'],
      'tgl_akhir' => $post['tgl_akhir_cuti'],
      'keterangan' => $post['keterangan'],
    ];
    $this->db->update('cuti', $data, ['id_cuti' => $post['id_cuti']]);
  }

  public function update_status($id, $status)
  {
    $data = [
      'status' => $status
    ];
    $this->db->update('cuti', $data, ['id_cuti' => $id]);
  }

  public function getAllDataCuti()
  {
    return $this->db->from('cuti')->join('karyawan', 'karyawan.id_karyawan = cuti.id_karyawan')->get()->result_array();
  }

  public function getDataCutiByIdKaryawan($id)
  {
    return $this->db->from('cuti')->join('karyawan', 'karyawan.id_karyawan = cuti.id_karyawan')->where(['cuti.id_karyawan' => $id])->get()->result_array();
  }

  public function getDataCutiById($id)
  {
    return $this->db->get_where('cuti', ['id_cuti' => $id])->row_array();
  }

  public function hapus_cuti($id)
  {
    $this->db->delete('cuti', ['id_cuti' => $id]);
  }
}
