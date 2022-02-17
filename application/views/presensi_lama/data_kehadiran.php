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
    <div class="row">
      <div class="col-md">
        <div class="card card-primary">
          <div class="card-header">
            <span><strong>Data Kehadiran</strong></span>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-borderless mb-3">
              <tr>
                <td><strong>Nama</strong></td>
                <td>: <?= $karyawan[0]['nama_karyawan'] ?></td>
              </tr>
              <tr>
                <td><strong>Divisi</strong></td>
                <td>: <?= $karyawan[0]['nama_divisi'] ?></td>
              </tr>
              <tr>
                <td><strong>Alamat</strong></td>
                <td>: <?= $karyawan[0]['alamat'] ?></td>
              </tr>
            </table>
            <hr>
            <table id="table1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Jam Masuk</th>
                  <th>Jam Pulang</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>Lampiran</th>
                  <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) : ?>
                    <th>Aksi</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($presensi as $data) : ?>
                  <tr>
                    <td><?= $data['tgl_kehadiran'] ?></td>
                    <td><?= $data['jam_masuk'] ?></td>
                    <td><?= $data['jam_pulang'] ?></td>
                    <td><?= $data['status_kehadiran'] ?></td>
                    <td><?= $data['keterangan'] ?></td>

                    <td><?= !empty($data['lampiran']) ? '<a class="btn btn-info" href="' . base_url('upload/bukti_izin/') . $data['lampiran'] . '">Lihat</a>' : '' ?></td>
                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) : ?>
                      <td>
                        <a class="btn btn-danger" href="<?= base_url('presensi/hapus/') . $data['id_kehadiran'] ?>">Hapus</a>
                      </td>
                    <?php endif; ?>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>

    </div>
  </div>
</section>