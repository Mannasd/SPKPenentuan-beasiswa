<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Kriteria</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tambah Kriteria</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Tambah Kriteria</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form Tambah Kriteria</h3>
                </div>
                <!-- form start -->
                <form action="<?= base_url('createdatakriteria') ?>" method="POST">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="kode_kriteria">Kode Kriteria</label>
                      <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria"
                        placeholder="Masukkan Kode Kriteria" required>
                    </div>
                    <div class="form-group">
                      <label for="nama_kriteria">Nama Kriteria</label>
                      <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria"
                        placeholder="Masukkan Nama Kriteria" required>
                    </div>
                    <div class="form-group">
                      <label for="nilai_kriteria">Nilai Kriteria</label>
                      <input type="number" step="0.01" class="form-control" id="nilai_kriteria" name="nilai_kriteria"
                        placeholder="Masukkan Nilai Kriteria" required>
                    </div>
                    <div class="form-group">
                      <label for="tipe_kriteria">Tipe Kriteria</label>
                      <select class="form-control" id="tipe_kriteria" name="tipe_kriteria" required>
                        <option value="">Pilih Tipe Kriteria</option>
                        <option value="Benefit">Benefit</option>
                        <option value="Cost">Cost</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div>
      </section>
      <!-- /.content -->
    </div>

    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url('plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('dist/js/adminlte.min.js') ?>"></script>
</body>

</html>
