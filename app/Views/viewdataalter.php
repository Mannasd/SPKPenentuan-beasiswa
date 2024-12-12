<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SPK Penentuan Beasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Alternatif</li>
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
                <h3 class="card-title">Data Alternatif</h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
              <p>
              <button type="button" class="btn btn-success" onclick="window.location='<?php echo site_url('formtambahalter'); ?>'">Tambah Alternatif</button>
              </p>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Alternatif</th>
                    <th>Nama Alternatif</th>
                    <th>Usia (C1)</th>
                    <th>Perilaku (C2)</th>
                    <th>Saudara (C3)</th>
                    <th>Tanggungan (C4)</th>
                    <th>Nilai (C5)</th>
                    <th>Gaji Ortu (C6)</th>


                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                  <?php
                  $no=0;
                  foreach($dataMb as $row):
                    $no++;
                    ?>
                <tr>
                    <th> <?= $no; ?></th>
                    <td><?= $row->kode_alternatif; ?></td>
                    <td><?= $row->nama_alternatif; ?></td>
                    <td><?= $row->C1; ?></td>
                    <td><?= $row->C2; ?></td>
                    <td><?= $row->C3; ?></td>
                    <td><?= $row->C4; ?></td>
                    <td><?= $row->C5; ?></td>
                    <td><?= $row->C6; ?></td>
                    
                    <td>
                    <a href="/home/formupdatealter/<?=$row->id;?>" class="badge badge-primary">Edit</a>  
                    <a href="/home/deletedataalter/<?=$row->id;?>" class="badge badge-danger">hps</a>
                  <form action="/home/deletedataalter/<?=$row->id; ?>" method="post">
                  <?=csrf_field(); ?>
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