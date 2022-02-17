<?php
if ($this->session->flashdata('sisa_cuti')) {
  echo '<script>alert("Anda mengambil terlalu banyak cuti!. Sisa cuti: ' . $this->session->flashdata('sisa_cuti') . ' hari")</script>';
}
$this->session->unset_userdata('sisa_cuti');
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Cuti</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Cuti</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <i class="fas fa-clock"></i>
        <span><strong>Form Data Cuti</strong></span>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <p>Sisa Cuti: <?= $sisa_cuti ?> Hari</p>
        <form action="<?= base_url('cuti/process') ?>" method="post">
          <input type="hidden" name="id_karyawan" value="<?= $id_karyawan ?>">
          <input type="hidden" name="id_cuti" value="<?= $cuti['id_cuti'] ?>">
          <div class="form-group">
            <label for="tgl_awal_cuti">Tanggal Awal Cuti</label>
            <input type="date" class="form-control" name="tgl_awal_cuti" id="tgl_awal_cuti" min="<?= date("Y-m-d") ?>" value="<?= $cuti['tgl_awal'] ?>" required>
          </div>
          <div class="form-group">
            <label for="tgl_akhir_cuti">Tanggal Akhir Cuti</label>
            <input type="date" class="form-control" name="tgl_akhir_cuti" id="tgl_akhir_cuti" min="<?= date("Y-m-d") ?>" value="<?= $cuti['tgl_akhir'] ?>" required>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required><?= $cuti['keterangan'] ?></textarea>
          </div>
          <button type="submit" name="<?= $page ?>" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <!-- /.card-body -->

    </div>
  </div>
</section>