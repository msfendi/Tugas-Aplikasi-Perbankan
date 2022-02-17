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
            <a href="<?= base_url('divisi/add') ?>" class="btn btn-primary btn-flat">
              <i class="fa fa-user-plus"></i> Create
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4 mx-auto">
              <form action="<?= site_url('index.php/divisi/process') ?>" method="post">

                <div class="form-group">
                  <label for="nama_divisi">Nama Divisi *</label>
                  <input type="hidden" name="id_divisi" value="<?= $row->id_divisi ?>">
                  <input type="text" name="nama_divisi" id="nama_divisi" class="form-control" value="<?= $row->nama_divisi ?>" required>
                </div>

                <div class="form-group">
                  <label for="gaji">Gaji *</label>
                  <input type="text" name="gaji" id="gaji" class="form-control" value="<?= $row->gaji ?>" required>
                </div>

                <div class="form-group">
                  <button type="submit" name="<?= $page ?>" class=" btn btn-success btn-flat">
                    <i class="fa fa-paper-plane"></i> Save
                  </button>

                  <button type="reset" class="btn btn-danger btn-flat">Reset</button>
                </div>

              </form>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>