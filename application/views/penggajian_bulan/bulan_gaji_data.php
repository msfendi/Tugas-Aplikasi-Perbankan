<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Bulan Gaji</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Penggajian</a></li>
                    <li class="breadcrumb-item active">Bulan</li>
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
                    <h3 class="card-title">Data Bulan Gaji</h3>

                    <div class="card-tools">
                        <a href="<?= base_url('penggajian/addBulan') ?>" class="btn btn-primary">
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
                                <th>Nama Bulan</th>
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
                                    <td><?= $data->bulan
                                        ?></td>
                                    <td class="text-center" width="160px">
                                        <a href="<?= site_url('index.php/penggajian/gajiBulan/' . $data->bulan)
                                                    ?>" class="btn btn-success btn-xs">
                                            <i class="fa fa-pencil"></i> Tambah Gaji
                                        </a>

                                        <a href="<?= site_url('index.php/divisi/delete/' . $data->id_bulan)
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