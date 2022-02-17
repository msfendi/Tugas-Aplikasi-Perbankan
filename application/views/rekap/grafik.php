<?php if (empty($_POST['tahun'])) {
    $_POST['tahun'] = date('Y');
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Infografis</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Infografis</li>
                    <li class="breadcrumb-item active"><?= $karyawan['nama_karyawan']; ?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<div class="content">
    <div class="container">
        <form action="" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari Tahun" name="tahun" autocomplete="off">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary collapsed-card">
                    <!-- card-header -->
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div id="grafik">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script Highcharts -->
<script src="<?= base_url(); ?>assets/code/highcharts.js"></script>
<script src="<?= base_url(); ?>assets/code/modules/series-label.js"></script>
<script src="<?= base_url(); ?>assets/code/modules/exporting.js"></script>
<script src="<?= base_url(); ?>assets/code/modules/export-data.js"></script>
<script src="<?= base_url(); ?>assets/code/modules/accessibility.js"></script>
<script type="text/javascript">
    Highcharts.chart('grafik', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Kehadiran <?= $karyawan['nama_karyawan']; ?>'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
            title: {
                text: 'Tahun <?= $_POST['tahun']; ?>',
                style: {
                    fontSize: '20px'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Absensi'
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: ( // theme
                        Highcharts.defaultOptions.title.style &&
                        Highcharts.defaultOptions.title.style.color
                    ) || 'gray'
                }
            }
        },
        legend: {
            align: 'right',
            x: -30,
            verticalAlign: 'top',
            y: 25,
            floating: true,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || 'white',
            borderColor: '#CCC',
            borderWidth: 1,
            shadow: false
        },
        tooltip: {
            headerFormat: '<b>{point.x}</b><br/>',
            pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [{
            name: 'Tepat Waktu',
            data: [
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 1 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 2 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 3 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 4 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 5 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 6 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 7 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 8 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 9 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 10 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 11 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 12 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Tepat Waktu'")->num_rows(); ?>
            ]
        }, {
            name: 'Terlambat',
            data: [
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 1 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 2 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 3 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 4 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 5 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 6 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 7 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 8 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 9 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 10 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 11 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 12 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Terlambat'")->num_rows(); ?>
            ]
        }, {
            name: 'Izin',
            data: [
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 1 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 2 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 3 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 4 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 5 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 6 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 7 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 8 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 9 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 10 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 11 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 12 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Izin'")->num_rows(); ?>
            ]
        }, {
            name: 'Sakit',
            data: [
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 1 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 2 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 3 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 4 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 5 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 6 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 7 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 8 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 9 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 10 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 11 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>,
                <?php echo $this->db->query("select * from kehadiran where YEAR(tgl_kehadiran) = " . $_POST['tahun'] . " AND MONTH(tgl_kehadiran) = 12 AND id_karyawan = " . $karyawan['id_karyawan'] . " AND keterangan='Sakit'")->num_rows(); ?>
            ]
        }]
    });
</script>
<!-- /.Script Highsharts -->