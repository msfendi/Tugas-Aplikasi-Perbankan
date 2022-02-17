<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengaturan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pengaturan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <?php if ($this->session->flashdata('simpan_pengaturan')) : ?>
      <div class="flash-data" data-simpanpengaturan="<?= $this->session->flashdata('simpan_pengaturan') ?>"></div>
    <?php
      $this->session->unset_userdata('simpan_pengaturan');
    endif ?>
    <div class="card card-primary">
      <div class="card-header">
        <i class="fas fa-clock"></i>
        <span><strong>Pengaturan</strong></span>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="<?= base_url('pengaturan/update') ?>" method="post">
          <h5>Presensi Kehadiran</h5>
          <hr>
          <div class="form-group">
            <label for="batas_absen_masuk">Batas absen masuk</label>
            <input type="time" class="form-control" id="batas_absen_masuk" name="batas_absen_masuk" value="<?= $pengaturan->batas_absen_masuk ?>" required>
          </div>
          <div class="form-group">
            <label for="waktu_absen_pulang">Waktu absen pulang</label>
            <input type="time" class="form-control" id="waktu_absen_pulang" name="waktu_absen_pulang" value="<?= $pengaturan->waktu_absen_pulang ?>" required>
          </div>
          <br>
          <h5>Cuti</h5>
          <hr>
          <div class="form-group">
            <label for="batas_cuti">Batas pengambilan cuti</label>
            <input type="number" class="form-control" id="batas_cuti" name="batas_cuti" value="<?= $pengaturan->batas_cuti ?>" required>
          </div>
          <button type="submit" class="btn btn-primary" name="simpan_pengaturan">Simpan</button>
        </form>
      </div>
      <!-- /.card-body -->

    </div>
  </div>
</section>