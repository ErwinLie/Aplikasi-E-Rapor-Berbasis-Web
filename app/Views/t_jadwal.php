<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <h1>Tambah Jadwal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('home/dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('home/t_jadwal') ?>">Tambah Jadwal</a>
                </div>
            </div>
        </div>

        <!-- Schedule Form Section -->
        <div class="col-lg-12 col-md-12 col-12 col-sm-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Jadwal</h4>
                </div>
                <div class="card-body">
                    <form class="form-sample" action="<?= base_url('home/aksi_t_jadwal') ?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="blok">Blok</label>
                                <select class="form-control" name="blok" id="blok">
                                    <option value="">Pilih Blok</option>
                                    <?php foreach ($b as $key): ?>
                                        <option value="<?= $key->id_blok ?>"><?= $key->nama_blok ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="rombel">Rombel</label>
                                <select class="form-control" name="rombel" id="rombel">
                                    <option value="">Pilih Rombel</option>
                                    <?php foreach ($r as $key): ?>
                                        <option value="<?= $key->id_rombel ?>"><?= $key->nama_rombel ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tahunAjaran">Tahun Ajaran</label>
                                <select class="form-control" name="tahun_ajaran" id="tahunAjaran">
                                    <option value="">Pilih Tahun Ajaran</option>
                                    <?php foreach ($t as $key): ?>
                                        <option value="<?= $key->id_tahun_ajaran ?>"><?= $key->tahun_ajaran ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Session fields aligned horizontally -->
                        <div class="row vertical-align">
                            <div class="col-md-12">
                                <!-- Repeat for each session (1 to 5) -->
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <div class="form-group row">
                                        <label class="col-sm-1 col-form-label">Sesi <?= $i ?></label>
                                        <div class="col-sm-5">
                                            <select class="form-control" name="guru<?= $i ?>" required>
                                                <option value="">Pilih Guru Sesi <?= $i ?></option>
                                                <?php foreach ($g as $guru): ?>
                                                    <option value="<?= $guru->id_guru ?>"><?= $guru->nama_guru ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-5">
                                            <select class="form-control" name="mapel<?= $i ?>" required>
                                                <option value="">Pilih Mapel Sesi <?= $i ?></option>
                                                <?php foreach ($m as $mapel): ?>
                                                    <option value="<?= $mapel->id_mapel ?>"><?= $mapel->nama_mapel ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
