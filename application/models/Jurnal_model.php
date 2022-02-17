<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_model extends CI_Model
{
  public function getDataJurnal($id)
  {
    return $this->db->get_where('jurnal', ['id_karyawan' => $id])->result_array();
  }

  public function getDataJurnalById($id)
  {
    return $this->db->get_where('jurnal', ['id_jurnal' => $id])->result_array();
  }

  public function tambah($post)
  {
    $data = [
      'id_karyawan' => $post['id_karyawan'],
      'tanggal' => $post['tanggal'],
      'jenis' => $post['jenis'],
      'keterangan' => $post['keterangan'],
    ];

    $this->db->insert('jurnal', $data);
  }

  public function edit($post)
  {
    $data = [
      'tanggal' => $post['tanggal'],
      'jenis' => $post['jenis'],
      'keterangan' => $post['keterangan'],
    ];
    $this->db->update('jurnal', $data, ['id_jurnal' => $post['id_jurnal']]);
  }

  public function hapus($id)
  {
    $this->db->delete('jurnal', ['id_jurnal' => $id]);
  }
}
