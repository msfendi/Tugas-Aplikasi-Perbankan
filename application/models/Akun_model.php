<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_model extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('karyawan');
        $this->db->join('divisi', 'karyawan.id_divisi = divisi.id_divisi');
        if ($id != null) {
            $this->db->where('id_karyawan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getAkun($id)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('id_akun', $id);
        $query = $this->db->get();
        return $query;
    }

    public function cekKaryawan($nama)
    {
        $this->db->select('id_karyawan, nama_karyawan');
        $this->db->from('karyawan');
        $this->db->where('nama_karyawan', $nama);
        $query = $this->db->get();
        return $query;
    }

    public function add($row, $post)
    {
        $params = [
            'id_karyawan' => $row->id_karyawan,
            'id_pengguna' => 3,
            'username' => $post['username'],
            'password' => sha1($post['password'])
        ];
        $this->db->insert('akun', $params);
    }

    public function edit($post)
    {
        $params = [
            'username' => $post['username'],
            'password' => sha1($post['password']),
        ];
        $this->db->where('id_akun', $post['id_akun']);
        $this->db->update('akun', $params);
    }
}
