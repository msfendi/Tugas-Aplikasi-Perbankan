<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_model extends CI_Model {
    // memanggil semua karyawan dari database 
    public function getAllKaryawan()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('divisi', 'divisi.id_divisi = karyawan.id_divisi');
        return $this->db->get()->result_array();
    }

    // memanggil semua karyawan berdasarkan id 
    public function getKaryawanById($id_karyawan)
    { 
        return $this->db->get_where('karyawan', ['id_karyawan' => $id_karyawan])->row_array();
    }
}