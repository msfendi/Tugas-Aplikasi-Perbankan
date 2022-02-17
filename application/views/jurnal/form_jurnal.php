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
    <div class="card card-primary">
      <div class="card-header">
        <i class="fas fa-clock"></i>
        <span><strong><?= $page ?> Jurnal</strong></span>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <form action="<?= base_url('jurnal/process') ?>" method="post">
          <input type="hidden" name="id_karyawan" value="<?= $jurnal['id_karyawan'] ?>">
          <input type="hidden" name="id_jurnal" value="<?= $jurnal['id_jurnal'] ?>">
          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" min="<?= date("Y-m-d") ?>" value="<?= $jurnal['tanggal'] ?>" required>
          </div>
          <div class="form-group">
            <label for="jenis">Jenis</label>
            <select class="form-control" id="jenis" name="jenis">
              <?php
              $jenis = ['Bekerja di kantor', 'Bekerja di rumah', 'Dinas luar kota'];
              if (empty($jurnal['jenis'])) {
                $jurnal['jenis'] = $jenis[0];
              }
              foreach ($jenis as $j) :
              ?>
                <?php if ($j == $jurnal['jenis']) : ?>
                  <option value="<?= $j ?>" selected><?= $j ?></option>
                <?php else : ?>
                  <option value="<?= $j ?>"><?= $j ?></option>
                <?php endif ?>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?= $jurnal['keterangan'] ?></textarea>
          </div>
          <button type="submit" name="<?= $page ?>" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <!-- /.card-body -->

    </div>
  </div>
</section>