<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Setting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Setting</a></li>
                    <li class="breadcrumb-item active">Akun</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="<?= site_url('akun/edit') ?>" method="post">
                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan *</label>
                                    <input type="hidden" name="id_akun" value="<?= $id_akun; ?>">
                                    <input type="text" name="" id="nama_karyawan" class="form-control" value="<?= $nama ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username *</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $username; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input type="password" name="password" id="password" class="form-control" value="" required>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-danger">Batal</button>
                                    <button type="submit" name="edit" class=" btn btn-success float-right">
                                        <i class="fa fa-paper-plane"></i> Save Change
                                    </button>
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
<!-- /.content -->