<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_model extends CI_Model
{

  public function getPengaturan()
  {
    return $this->db->get_where('pengaturan', ['id' => 1])->row();
  }
  public function update($post)
  {
    $data = [
      'batas_absen_masuk' => $post['batas_absen_masuk'],
      'waktu_absen_pulang' => $post['waktu_absen_pulang'],
      'batas_cuti' => $post['batas_cuti'],
    ];

    $this->db->update('pengaturan', $data, ['id' => 1]);
  }
}
