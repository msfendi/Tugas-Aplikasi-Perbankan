<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Infografis</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Infografis</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
    <!-- Login Operator atau Admin -->
    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) : ?>
    <?php foreach( $karyawan as $kar ) : ?>
      <div class="col-md-3">
        <div class="card card-primary collapsed-card">
          <div class="card-header">
            <h5 class="card-title"><?= $kar['nama_karyawan']; ?></h5>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
              </button>
            </div>
            <!-- /.card-tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted"><?= $kar['nama_divisi'] ?></h6>
            <p class="card-text"><?= $kar['telepon'] ?></p>
            <p class="card-text"><?= $kar['alamat'] ?></p>
            <a href="<?= base_url();?>rekap/grafik/<?= $kar['id_karyawan'];?>" class="btn btn-outline-success float-right">Grafik</a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>