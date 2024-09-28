<main role="main" class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <h1>Tambah Kelas</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('home/dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('home/kelas') ?>">Kelas</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h4>Tambah Kelas</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('home/aksi_t_kelas') ?>" method="POST">
                            <div class="form-group row">
                                <label for="inputText" class="col-sm-2 col-form-label">Kelas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kelas" id="inputText" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div> <!-- /. card-body -->
                </div> <!-- /. card -->
            </div> <!-- /. col -->
        </div> <!-- /. row -->
    </section>
</main>
