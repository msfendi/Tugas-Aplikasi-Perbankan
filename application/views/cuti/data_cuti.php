<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Cuti</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Cuti</li>
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
        <span><strong>Data Cuti</strong></span>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <table id="table1" class="table table-bordered">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Tanggal Awal</th>
              <th>Tanggal Akhir</th>
              <th>Jumlah Hari</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($cuti as $data) : ?>
              <tr>
                <td><?= $data['nama_karyawan'] ?></td>
                <td><?= $data['tgl_awal'] ?></td>
                <td><?= $data['tgl_akhir'] ?></td>
                <td><?= selisih_hari($data['tgl_awal'], $data['tgl_akhir']) ?></td>
                <td><?= $data['keterangan'] ?></td>
                <td><?= $data['status'] ?></td>
                <td>
                  <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) : ?>
                    <a class="btn-sm btn-success" href="<?= base_url('cuti/update_status/') .  $data['id_cuti'] . '/Approved'  ?>" data-toggle="tooltip" data-placement="top" title="Approve"><i class="fas fa-check"></i></a>
                    <a class="btn-sm btn-warning" href="<?= base_url('cuti/update_status/') .  $data['id_cuti'] . '/Rejected' ?>" data-toggle="tooltip" data-placement="top" title="Reject"><i class="fas fa-times"></i></a>
                    <a class="btn-sm btn-danger" href="<?= base_url('cuti/hapus/') . $data['id_cuti'] ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="far fa-trash-alt"></i></a>
                  <?php else : ?>
                    <a class="btn-sm btn-primary" href="<?= base_url('cuti/edit/') . $data['id_cuti'] ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="far fa-edit"></i></a>
                    <a class="btn-sm btn-danger" href="<?= base_url('cuti/hapus/') . $data['id_cuti'] ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="far fa-trash-alt"></i></a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->

    </div>
  </div>
</section>