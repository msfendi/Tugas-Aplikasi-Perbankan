<?php

class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('akun_model');
        $idkaryawan = $this->ci->session->userdata('idkaryawan');
        $data_karyawan = $this->ci->akun_model->get($idkaryawan)->row();
        return $data_karyawan;
    }
}
