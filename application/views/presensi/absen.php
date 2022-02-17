<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Presensi Karyawan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Presensi</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <?php if ($this->session->flashdata('presensi')) : ?>
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('presensi') ?>"></div>
    <?php
      $this->session->unset_userdata('presensi');
    endif ?>
    <div class="card card-primary">
      <div class="card-header">
        <i class="fas fa-clock"></i>
        <span><strong>Presensi</strong></span>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">

        <div class="row">
          <div class="col-md table-responsive">
            <div class="mb-3 text-center">
              <h3 id="timestamp"></h3>
              <h3><?= longdate_indo(date('Y-m-d')) ?></h3>
              <hr>
            </div>
            <table class="table table-borderless mx-auto w-auto">
              <tr>
                <td><strong>Nama</strong></td>
                <td>: <?= $karyawan->nama_karyawan ?></td>
              </tr>
              <tr>
                <td><strong>Waktu Datang</strong></td>
                <td>: <?= empty($dbabsen['jam_masuk']) ? '00:00:00' : $dbabsen['jam_masuk'] ?></td>
              </tr>
              <tr>
                <td><strong>Waktu Pulang</strong></td>
                <td>: <?= empty($dbabsen['jam_pulang']) ? '00:00:00' : $dbabsen['jam_pulang'] ?></td>
              </tr>
              <tr>
                <td><strong>Status Kehadiran</strong></td>
                <td>: <?= empty($dbabsen['status_kehadiran']) ? 'Belum Hadir' : $dbabsen['status_kehadiran'] ?></td>
              </tr>
              <tr>
                <td><strong>Keterangan</strong></td>
                <td>: <?= empty($dbabsen['keterangan']) ? '' : $dbabsen['keterangan'] ?></td>
              </tr>
            </table>
            <div class="text-center">
              <form action="<?= base_url('presensi/process') ?>" method="post">
                <button class="btn btn-primary" type="submit" name="absen" <?= $this->session->has_userdata('disable_tombol_absen') ? 'disabled' : '' ?>>Absen</button>
                <a class="btn btn-warning <?= $this->session->has_userdata('disable_tombol_izin') ? 'disabled' : '' ?>" href="<?= base_url('presensi/izin') ?>" role="button">Izin</a>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <div class="row text-muted text-center">
          <div class="col-md-6">
            <span>Batas Absen Masuk: <?= $setting['batas_absen_masuk'] ?></span>
          </div>
          <div class="col-md-6">
            <span>Waktu Absen Pulang: <?= $setting['waktu_absen_pulang'] ?></span>
          </div>
        </div>
        <!-- /.card -->
      </div>

    </div>
  </div>
</section>