<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penggajian_model extends CI_Model
{
    public function getBulan($id = null)
    {
        $this->db->from('bulan_gaji');
        if ($id != null) {
            $this->db->where('id_bulan', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function addBulan($post)
    {
        $params = [
            'bulan' => $post['nama_bulan'],
        ];
        $this->db->insert('bulan_gaji', $params);
    }

    public function getGajiBulan($date)
    {
        $this->db->from('penggajian');
        $this->db->join('bulan_gaji', 'bulan_gaji.id_bulan = penggajian.id_bulan');
        $this->db->join('karyawan', 'karyawan.id_karyawan = penggajian.id_karyawan');
        $this->db->join('divisi', 'divisi.id_divisi = penggajian.id_divisi');
        $this->db->where('bulan_gaji.bulan', $date);
        $query = $this->db->get()->result();
        return $query;
    }

    public function terlambat($id, $bulan)
    {
        $this->db->from('kehadiran');
        if ($id != null) {
            $syarat = array('id_karyawan' => $id, 'keterangan' => 'Terlambat', 'MONTH(tgl_kehadiran)' => $bulan);
            $this->db->where($syarat);
        }
        $query = $this->db->get()->num_rows();
        return $query;
    }

    public function gaji($id)
    {
        $this->db->select('gaji');
        $this->db->from('divisi');
        if ($id != null) {
            $this->db->where('id_divisi', $id);
        }
        $query = $this->db->get()->row();
        return $query;
    }

    public function addGaji($post)
    {
        $id_krywn = $post['nama_karyawan'];
        $bulan = bulan($post['bulan']);
        $terlambat = $this->terlambat($id_krywn, $bulan);
        $gajiKotor = (int) $this->gaji($post['divisi']);
        $gajiBersih = hitung_gaji($gajiKotor, $terlambat);
        $params = [
            'id_karyawan' => $post['nama_karyawan'],
            'id_divisi' => $post['divisi'],
            'gaji_bersih' => $gajiBersih,
            'bulan' => $post['bulan'],
        ];
        $this->db->insert('penggajian', $params);
    }
}
