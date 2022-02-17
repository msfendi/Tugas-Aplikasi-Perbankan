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
              <form action="<?= site_url('karyawan/process') ?>" method="post">

                <div class="form-group">
                  <label for="nama_karyawan">Nama Karyawan *</label>
                  <input type="hidden" name="id_karyawan" value="<?= $row->id_karyawan ?>">
                  <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" value="<?= $row->nama_karyawan ?>" required>
                </div>

                <div class="form-group">
                  <label for="divisi_karyawan">Divisi *</label>
                  <select name="divisi_karyawan" id="divisi_karyawan" class="form-control" required>
                    <option value="">Pilih</option>
                    <?php foreach ($divisi->result() as $key => $data) { ?>
                      <option value="<?= $data->id_divisi ?>" <?= $data->id_divisi == $row->id_divisi ? "selected" : null ?>> <?= $data->nama_divisi ?></option>
                    <?php
                    } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir *</label>
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="<?= $row->tanggal_lahir ?>" required>
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat *</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $row->alamat ?>" required>
                </div>

                <div class="form-group">
                  <label for="telepon">Telepon *</label>
                  <input type="number" name="telepon" id="telepon" class="form-control" value="<?= $row->telepon ?>" required>
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