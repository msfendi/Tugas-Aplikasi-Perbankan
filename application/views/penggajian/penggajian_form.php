<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Penggajian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Penggajian</li>
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
                    <h3 class="card-title"><? //= $page 
                                            ?> Data</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <form action="<?= site_url('penggajian/processGaji') ?>" method="post">
                                <!-- <div class="form-group">
                                    <label for="nama_divisi">Nama Karyawan *</label>
                                    <input type="hidden" name="id_divisi" value="<? //= $row->id_divisi 
                                                                                    ?>">
                                    <input type="text" name="nama_divisi" id="nama_divisi" class="form-control" value="Joko<? //= $row->nama_divisi 
                                                                                                                            ?>" required>
                                </div> -->
                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Karyawan *</label>
                                    <select name="nama_karyawan" id="nama_karyawan" class="form-control custom-select" required>
                                        <option value="" selected disabled>Pilih Karyawan</option>
                                        <?php foreach ($karyawan->result() as $key => $data) {  ?>
                                            <option value="<?= $data->id_karyawan ?>" <?= $data->id_karyawan == $row->id_karyawan ? "selected" : null ?>> <?= $data->nama_karyawan ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="divisi">Divisi Karyawan *</label>
                                    <select name="divisi" id="divisi" class="form-control custom-select" required>
                                        <option value="" selected disabled>Pilih Divisi</option>
                                        <?php foreach ($divisi->result() as $key => $data) {  ?>
                                            <option value="<?= $data->id_divisi ?>" <?= $data->id_divisi == $row->id_divisi ? "selected" : null ?>> <?= $data->nama_divisi ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bulan">Bulan</label>
                                    <input type="hidden" name="bulan" class="form-control" value="<?= $date ?>">
                                    <input type="text" name="" id="bulan" class="form-control" value="<?= $date ?>" required disabled>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="gajikotor">Gaji Kotor</label>
                                    <input type="text" name="gajikotor" id="gajikotor" class="form-control" value="200000<? //= $row->gaji_bersih
                                                                                                                            ?>" required disabled>
                                </div> -->
                                <div class="form-group">
                                    <label for="gajibersih">Gaji Bersih</label>
                                    <input type="text" name="gajibersih" id="gajibersih" class="form-control" value="100000<?= $row->gaji_bersih ?>" required disabled>
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <button type="submit" name="<?= $page
                                                                ?>" class=" btn btn-success float-right">
                                        <i class="fa fa-paper-plane"></i> Save
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