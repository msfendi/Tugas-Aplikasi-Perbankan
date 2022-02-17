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
            <span><strong>Jurnal Harian <?= $nama ?></strong></span>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <div class="col">
                <a class="btn btn-primary float-right" href="<?= base_url('jurnal/tambah') ?>" role="button">Tambah Jurnal</a>
              </div>
            </div>

            <table id="table1" class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tanggal</th>
                  <th>Jenis</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($jurnal as $data) : ?>
                  <tr>
                    <td><?= $data['id_jurnal'] ?></td>
                    <td><?= $data['tanggal'] ?></td>
                    <td><?= $data['jenis'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td>
                      <a class="btn btn-primary" href="<?= base_url('jurnal/edit/') . $data['id_jurnal'] ?>" role="button">Edit</a>
                      <a class="btn btn-danger" href="<?= base_url('jurnal/hapus/') . $data['id_jurnal'] ?>" role="button">Hapus</a>
                    </td>
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