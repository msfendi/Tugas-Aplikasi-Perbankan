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
    <div class="card card-primary">
      <div class="card-header">
        <i class="fas fa-clock"></i>
        <span><strong>Keterangan</strong></span>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">

        <form method="post" action="<?= base_url('presensi/process') ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" value="<?= $karyawan->nama_karyawan ?>" disabled>
          </div>
          <div class="form-group">
            <label for="divisi">Divisi</label>
            <input type="text" class="form-control" id="divisi" value="<?= $karyawan->nama_divisi ?>" disabled>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <select class="form-control" id="keterangan" name="keterangan">
              <option value="Sakit">Sakit</option>
              <option value="Izin">Izin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="lampiran">Lampiran</label>
            <?php
            if ($this->session->flashdata('error')) {
              echo $this->session->flashdata('error');
            }
            unset($_SESSION['error']);;
            ?>
            <input type="file" name="lampiran" class="form-control-file" id="lampiran">
            <p class="text-muted font-italic"><small>* Gambar format jpg atau png</small></p>
          </div>
          <button type="submit" class="btn btn-primary" name="simpanizin">Simpan</button>
          <a class="btn btn-secondary" href="<?= base_url('presensi') ?>">Kembali</a>
        </form>
      </div>
      <!-- /.card-body -->

      <!-- /.card -->
    </div>
  </div>
</section>