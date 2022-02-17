<?php

function indo_currency($value)
{
    $result = "Rp." . number_format($value, 2, ',', '.');
    return $result;
}

function indo_date($date)
{
    $d = substr($date, 8, 2);
    $m = substr($date, 5, 2);
    $y = substr($date, 0, 4);
    $h = substr($date, 11, 2);
    $mt = substr($date, 14, 2);
    $s = substr($date, 17, 2);
    return $d . '-' . $m . '-' . $y . ' ' . $h . ':' . $mt . ':' . $s;
}

function bulan($tgl)
{
    $m = substr($tgl, 5, 2);
    return $m;
}

function cek_sudah_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('idkaryawan');  //melakukan pengecekan apakah pada website sedang terdapat session / terdapat set_userdata
    if ($user_session) { //jika ada
        redirect('presensi');
    }
}

function cek_belum_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('idkaryawan');
    if (!$user_session) { //jika tidak
        redirect('auth');
    }
}

function cek_admin()
{
    $ci = &get_instance();
    $level_user = $ci->session->userdata('level');
    if (!($level_user == 2 || $level_user == 1)) { //jika level user 1(operator)/2(admin) akan menjadi bernilai false
        redirect('presensi'); //jika menghasilkan true
    }
}

function longdate_indo($tanggal)
{
    $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $bln = $pecah[1];
    $thn = $pecah[0];
    $bulan = $bulan[$pecah[1] - 1];

    $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
    $hari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];
    $nama_hari = $hari[$nama];

    return $nama_hari . ', ' . $tgl . ' ' . $bulan . ' ' . $thn;
}

function selisih_hari($awal, $akhir)
{
    $tgl_awal  = strtotime($awal);
    $tgl_akhir = strtotime($akhir);

    return ($tgl_akhir - $tgl_awal) / 60 / 60 / 24;
}

function jumlah_cuti()
{
    $ci = &get_instance();
    $ci->load->model('Cuti_model');
    $id_login = $ci->fungsi->user_login()->id_karyawan;
    $data_cuti = $ci->Cuti_model->getDataCutiByIdKaryawan($id_login);
    $jumlah_cuti = 0;
    if ($data_cuti) {
        foreach ($data_cuti as $cuti) {
            if ($cuti['status'] != 'Rejected') {
                $jumlah_cuti += selisih_hari($cuti['tgl_awal'], $cuti['tgl_akhir']);
            }
        }
    }
    return $jumlah_cuti;
}

function hitung_gaji($gaji_pokok, $jumlah_terlambat)
{
    $pinalti = (2 / 100 * $gaji_pokok);
    $total_penalti = $jumlah_terlambat * $pinalti;
    $gaji_bersih = $gaji_pokok - $total_penalti;
    return $gaji_bersih;
}
