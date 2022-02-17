<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Divisi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Divisi</li>
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
          <h3 class="card-title">Data Divisi</h3>

          <div class="card-tools">
            <a href="<?= base_url('divisi/add') ?>" class="btn btn-primary">
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
                <th>Nama Divisi</th>
                <th>Gaji</th>
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
                  <td style="width:5%;"><?= $no++
                                        ?>.</td>
                  <td><?= $data->nama_divisi
                      ?></td>
                  <td><?= indo_currency($data->gaji)
                      ?></td>
                  <td><?= indo_date($data->created_at)
                      ?></td>
                  <td class="text-center" width="160px">
                    <a href="<?= site_url('index.php/divisi/edit/' . $data->id_divisi)
                              ?>" class="btn btn-success btn-xs">
                      <i class="fa fa-pencil"></i> Update
                    </a>

                    <a href="<?= site_url('index.php/divisi/delete/' . $data->id_divisi)
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