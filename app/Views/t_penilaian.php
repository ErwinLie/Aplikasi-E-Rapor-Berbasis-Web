<main role="main" class="main-content">
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Tambah Penilaian</h3>
            <nav aria-label="breadcrumb">
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">NILAI SISWA SPH</h4>
                        <form action="<?= base_url('home/aksi_t_penilaian') ?>" method="POST">

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

                            <div class="form-group">
                                <label for="inputmapel">Mata Pelajaran</label>
                                <select class="form-control" name="id_mapel" required>
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($mapel as $key): ?>
                                        <option value="<?= $key->id_mapel ?>"><?= $key->nama_mapel ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nilai Tugas</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="nilaitugas"  >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nilai Midblok</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="nilaimid"  >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nilai Finalblok</label>
                                <input type="text" class="form-control" id="exampleInputUsername1" name="nilaifinal"  >
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="button" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <!-- partial -->
</div>
</main>