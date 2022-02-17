<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('karyawan');
        $this->db->join('divisi', 'divisi.id_divisi = karyawan.id_divisi');
        if ($id != null) {
            $this->db->where('id_karyawan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'id_divisi' => $post['divisi_karyawan'],
            'nama_karyawan' => $post['nama_karyawan'],
            'tanggal_lahir' => $post['tanggal_lahir'],
            'alamat' => $post['alamat'],
            'telepon' => $post['telepon'],
        ];
        $this->db->insert('karyawan', $params);
    }

    public function edit($post)
    {
        $params = [
            'id_divisi' => $post['divisi_karyawan'],
            'nama_karyawan' => $post['nama_karyawan'],
            'tanggal_lahir' => $post['tanggal_lahir'],
            'alamat' => $post['alamat'],
            'telepon' => $post['telepon'],
        ];
        $this->db->where('id_karyawan', $post['id_karyawan']);
        $this->db->update('karyawan', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->delete('karyawan');
    }
}
