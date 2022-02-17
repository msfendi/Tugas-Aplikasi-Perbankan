<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Jurnal Harian</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Jurnal Harian</li>
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
            <span><strong>Jurnal Harian <?= $karyawan['nama_karyawan'] ?></strong></span>

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
                <td>: <?= $karyawan['nama_karyawan'] ?></td>
              </tr>
              <tr>
                <td><strong>Divisi</strong></td>
                <td>: <?= $karyawan['nama_divisi'] ?></td>
              </tr>
              <tr>
                <td><strong>Alamat</strong></td>
                <td>: <?= $karyawan['alamat'] ?></td>
              </tr>
            </table>

            <table id="table1" class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tanggal</th>
                  <th>Jenis</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($jurnal as $data) : ?>
                  <tr>
                    <td><?= $data['id_jurnal'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['jenis'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                  <?php endforeach; ?>
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