<main role="main" class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <h1>Tambah Rombel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('home/dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('home/rombel') ?>">Rombel</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h4>Tambah Rombel</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('home/aksi_t_rombel') ?>" method="POST">
                            <div class="form-group">
                                <label for="Rombel">Rombel</label>
                                    <input class="form-control" name="rombel" id="inputText" required>
                                </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option value="">Pilih</option>
                                    <?php foreach ($k as $key): ?>
                                        <option value="<?= $key->id_kelas ?>"><?= $key->nama_kelas ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                    <select class="form-control" name="jurusan" id="jurusan">
                                        <option value="">Pilih</option>
                                    <?php foreach ($j as $key): ?>
                                        <option value="<?= $key->id_jurusan ?>"><?= $key->nama_jurusan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div> <!-- /. card-body -->
                </div> <!-- /. card -->
            </div> <!-- /. col -->
        </div> <!-- /. row -->
    </section>
</main>
