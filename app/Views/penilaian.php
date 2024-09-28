<main role="main" class="main-content">
<div class="main-panel">
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">PENILAIAN</h3>
      <nav aria-label="breadcrumb"></nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">PENILAIAN SISWA</h4>
            <a class="nav-link text-Headings my-2" href="<?=base_url('home/tambah_penilaian')?>">
              <span class="mdi mdi-plus"></span> Tambah 
            </a>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun Ajaran</th>
                    <th>Semester</th>
                    <th>Blok</th>
                    <th>Nama Siswa</th>
                    <th>Nama Mapel</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai Mid Blok</th>
                    <th>Nilai Final Blok</th>
                    <th>Total Nilai</th>
                    <th>Predikat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($yoga as $key) {
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key->tahun_ajaran ?></td>
                    <td><?= $key->nama_semester ?></td>
                    <td><?= $key->nama_blok ?></td>
                    <td><?= $key->nama_siswa ?></td>
                    <td><?= $key->nama_mapel ?></td>
                    <td><?= $key->nilai_tugas ?></td>
                    <td><?= $key->nilai_midblok ?></td>
                    <td><?= $key->nilai_finalblok ?></td>
                    <td><?= $key->total_nilai ?></td>
                    <td><?= $key->predikat ?></td>
                    <td>
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editPaketModal" 
    onclick="editPaket(
        <?= $key->id_penilaian ?>, 
        <?= $key->id_tahun_ajaran ?>, 
        <?= $key->id_semester ?>, 
        <?= $key->id_blok ?>, 
        <?= $key->id_siswa ?>, 
        <?= $key->id_mapel ?>, 
        <?= $key->nilai_tugas ?>, 
        <?= $key->nilai_midblok ?>, 
        <?= $key->nilai_finalblok ?>
    )">
    Edit
</button>


                      <a href="<?= base_url('home/hapus_penilaian/' . $key->id_penilaian) ?>">
                        <button class="btn btn-warning">
                          <i class="now-ui-icons ui-1_check"></i> Hapus
                        </button>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>

<!-- Modal for editing -->
<div class="modal fade" id="editPaketModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Nilai</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="editPaketForm" action="<?= base_url('home/aksi_e_penilaian') ?>" method="post">
        <div class="modal-body">
        <input type="hidden" id="id_penilaian" name="id_penilaian">

          
          <!-- Other fields -->
          <div class="form-group">
            <label for="id_tahun_ajaran">Nama tahun_ajaran</label>
            <select class="form-control" id="id_tahun_ajaran" name="id_tahun_ajaran" required>
              <option value="">Pilih tahun_ajaran</option>
              <?php foreach ($tahun_ajaran as $key): ?>
                <option value="<?= $key->id_tahun_ajaran ?>" <?= isset($current_tahun_ajaran) && $current_tahun_ajaran == $key->id_tahun_ajaran ? 'selected' : '' ?>>
                  <?= $key->tahun_ajaran ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="id_semester">Nama semester</label>
            <select class="form-control" id="id_semester" name="id_semester" required>
              <option value="">Pilih semester</option>
              <?php foreach ($semester as $key): ?>
                <option value="<?= $key->id_semester ?>" <?= isset($current_semester) && $current_semester == $key->id_semester ? 'selected' : '' ?>>
                  <?= $key->nama_semester ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="id_blok">Nama blok</label>
            <select class="form-control" id="id_blok" name="id_blok" required>
              <option value="">Pilih blok</option>
              <?php foreach ($blok as $key): ?>
                <option value="<?= $key->id_blok ?>" <?= isset($current_blok) && $current_blok == $key->id_blok ? 'selected' : '' ?>>
                  <?= $key->nama_blok ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="id_siswa">Nama siswa</label>
            <select class="form-control" id="id_siswa" name="id_siswa" required>
              <option value="">Pilih siswa</option>
              <?php foreach ($siswa as $key): ?>
                <option value="<?= $key->id_siswa ?>" <?= isset($current_siswa) && $current_siswa == $key->id_siswa ? 'selected' : '' ?>>
                  <?= $key->nama_siswa ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="id_mapel">Nama mapel</label>
            <select class="form-control" id="id_mapel" name="id_mapel" required>
              <option value="">Pilih mapel</option>
              <?php foreach ($mapel as $key): ?>
                <option value="<?= $key->id_mapel ?>" <?= isset($current_mapel) && $current_mapel == $key->id_mapel ? 'selected' : '' ?>>
                  <?= $key->nama_mapel ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="form-group">
            <label for="nilai_tugas">Nilai Tugas</label>
            <input type="text" class="form-control" id="nilai_tugas" name="nilai_tugas" required>
          </div>
          <div class="form-group">
            <label for="nilai_midblok">Nilai Midblok</label>
            <input type="text" class="form-control" id="nilai_midblok" name="nilai_midblok" required>
          </div>
          <div class="form-group">
            <label for="nilai_finalblok">Nilai Finalblok</label>
            <input type="text" class="form-control" id="nilai_finalblok" name="nilai_finalblok" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
 function editPaket(id_penilaian, id_tahun_ajaran, id_semester, id_blok, id_siswa, id_mapel, nilai_tugas, nilai_midblok, nilai_finalblok) {
    document.getElementById('id_penilaian').value = id_penilaian;
    document.getElementById('id_tahun_ajaran').value = id_tahun_ajaran;
    document.getElementById('id_semester').value = id_semester;
    document.getElementById('id_blok').value = id_blok; // Set the selected blok
    document.getElementById('id_siswa').value = id_siswa;
    document.getElementById('id_mapel').value = id_mapel;
    document.getElementById('nilai_tugas').value = nilai_tugas;
    document.getElementById('nilai_midblok').value = nilai_midblok;
    document.getElementById('nilai_finalblok').value = nilai_finalblok;
}



</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Optional: Popper.js for Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>