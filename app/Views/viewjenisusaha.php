<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>SPK Penentuan beasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data siswa</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nama Siswa</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">
              <p>
                <a class="btn btn-success"
                a href="<?= base_url('formtambah') ?>">Tambah data siswa </a>
              </p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $no = 0;
                  foreach ($dataMb as $row):
                    $no++;
                    ?>
                    <tr>
                      <th>
                        <?= $no; ?>
                      </th>
                      <td>
                        <?= $row->nama_jenis_usaha; ?>
                      </td>
                      <td>
                        <a href="/home/formEditJenisUsaha/<?= $row->id; ?>" class="badge badge-primary">Edit</a>
                        <a href="/home/hapusJenisUsaha/<?= $row->id; ?>" class="badge badge-danger">hps</a>
                        <form action="/home/hapusJenisUsaha/<?= $row->id; ?>" method="post">
                          <?= csrf_field(); ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                        </form>

                      </td>

                    </tr>

                    <?php
                  endforeach;
                  ?>

                </tbody>

              </table>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

  </section>
  <!-- /.content -->
</div>