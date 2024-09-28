<div class="container">
  <section class="section mt-4">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">RAPORT</h5>
            <!-- Form PDF -->
            <form action="" method="get" enctype="multipart/form-data">
              <!-- Input Tanggal Mulai -->
              <div class="form-group">
                                <label for="inputnama">Nama Siswa</label>
                                <select class="form-control" name="id_siswa" required>
                                    <option value="">Pilih Siswa</option>
                                    <?php foreach ($siswa as $key): ?>
                                        <option value="<?= $key->id_siswa ?>">
                                            <?= $key->nama_rombel ?> -- <?= $key->nama_siswa ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
              <!-- Input Tanggal Selesai -->
              <div class="form-group">
                                <label for="inputtahun_ajaran">Tahun Ajaran</label>
                                <select class="form-control" name="id_tahun_ajaran" required>
                                    <option value="">Pilih Tahun Ajaran</option>
                                    <?php foreach ($tahun_ajaran as $key): ?>
                                        <option value="<?= $key->id_tahun_ajaran ?>"><?= $key->tahun_ajaran ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputsemester">Semester</label>
                                <select class="form-control" name="id_semester" required>
                                    <option value="">Pilih Semester</option>
                                    <?php foreach ($semester as $key): ?>
                                        <option value="<?= $key->id_semester ?>"><?= $key->nama_semester ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="inputblok">Blok</label>
                                <select class="form-control" name="id_blok" required>
                                    <option value="">Pilih Blok</option>
                                    <?php foreach ($blok as $key): ?>
                                        <option value="<?= $key->id_blok ?>"><?= $key->nama_blok ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
              <!-- Tombol Submit -->
              <div class="text-center">
                <button type="submit" formaction="<?= base_url('home/aksi_laporan_pdf') ?>" class="btn btn-secondary me-2">PRINT RAPORT</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>