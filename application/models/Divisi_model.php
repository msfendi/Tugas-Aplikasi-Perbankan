<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi_model extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('divisi');
        if ($id != null) {
            $this->db->where('id_divisi', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'nama_divisi' => $post['nama_divisi'],
            'gaji' => $post['gaji'],
        ];
        $this->db->insert('divisi', $params);
    }

    public function edit($post)
    {
        $params = [
            'nama_divisi' => $post['nama_divisi'],
            'gaji' => $post['gaji'],
        ];
        $this->db->where('id_divisi', $post['id_divisi']);
        $this->db->update('divisi', $params);
    }

    public function delete($id)
    {
        $this->db->where('id_divisi', $id);
        $this->db->delete('divisi');
    }
}
