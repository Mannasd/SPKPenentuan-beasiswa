<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Hasil Perhitungan Untuk Menentukan Beasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Perankingan Beasiswa</li>
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
          <!-- Hasil Preferensi -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Hasil Perhitungan Perankingan</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Alternatif</th>
                    <th>Nilai V</th>
                    <th>Beasiswa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Urutkan preferensi berdasarkan V_ipa secara descending
                  usort($preferensi, function ($a, $b) {
                    return $b['V_ipa'] <=> $a['V_ipa'];
                  });

                  $no = 1;
                  foreach ($preferensi as $index => $row) {
                    // Berikan nilai "Diterima" untuk 2 nilai terbesar pada kolom Beasiswa
                    $beasiswa = $index < 2 ? 'Diterima' : 'Tidak Diterima';

                    echo "<tr>
                <td>{$no}</td>
                <td>{$row['nama_alternatif']}</td>
                <td>{$row['V_ipa']}</td>
                <td>{$beasiswa}</td>
            </tr>";
                    $no++;
                  }
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