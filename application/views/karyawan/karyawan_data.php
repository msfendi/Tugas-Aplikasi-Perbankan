<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Karyawan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Karyawan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h2 class="card-title">Data Karyawan</h2>
          <div class="card-tools">
            <a href="<?= base_url('karyawan/add') ?>" class="btn btn-primary">
              <i class="fa fa-user-plus"></i> Create
            </a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped" id="table1">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Karyawan</th>
                <th>Divisi</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Dibuat Pada</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $no = 1;
              foreach ($row->result() as $key => $data) {
              ?>

                <tr>
                  <td style="width:5%;"><?= $no++ ?>.</td>
                  <td><?= $data->nama_karyawan ?></td>
                  <td><?= $data->nama_divisi ?></td>
                  <td><?= indo_date($data->tanggal_lahir) ?></td>
                  <td><?= $data->alamat ?></td>
                  <td><?= $data->telepon ?></td>
                  <td><?= indo_date($data->created_at) ?></td>
                  <td class="text-center" width="160px">
                    <a href="<?= base_url('karyawan/edit/' . $data->id_karyawan)
                              ?>" class="btn btn-success btn-xs">
                      <i class="fa fa-pencil"></i> Update
                    </a>

                    <a href="<?= base_url('karyawan/delete/' . $data->id_karyawan)
                              ?>" onclick="return confirm('Apakah anda ingin menghapus data tersebut? ')" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash"></i> Delete
                    </a>
                  </td>
                </tr>

              <?php
              }
              ?>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>