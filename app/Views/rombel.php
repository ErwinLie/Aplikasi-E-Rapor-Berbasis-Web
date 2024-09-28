<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?=base_url('home/dashboard')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Rombel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?=base_url('home/dashboard')?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?=base_url('home/rombel')?>">Rombel</a></div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Data Rombel</h4>
                    </div>
                    <div>
                        <!-- Trigger Modal Tambah -->
                        <button class="btn btn-success" data-toggle="modal" data-target="#tambahRombelModal">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                    <div class="ml-auto">
                        <form class="form-inline">
                            <input id="searchInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Rombel</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php 
                                    $no = 1;
                                    foreach ($erwin as $wkwk) {
                                ?>                          
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $wkwk->nama_rombel ?></td>
                                        <td><?= $wkwk->nama_kelas ?></td>
                                        <td><?= $wkwk->nama_jurusan ?></td>
                                        <td>
                                            <button onclick="openEditModal('<?= $wkwk->id_rombel ?>', '<?= $wkwk->nama_rombel ?>', '<?= $wkwk->id_kelas ?>', '<?= $wkwk->id_jurusan ?>')" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <a href="<?= base_url('home/hapus_rombel/'.$wkwk->id_rombel) ?>" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action cannot be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')">
                                                <i class="fas fa-trash"></i>
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
    </section>
</div>

<!-- Modal Tambah Rombel -->
<div class="modal fade" id="tambahRombelModal" tabindex="-1" role="dialog" aria-labelledby="tambahRombelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahRombelModalLabel">Tambah Rombel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('home/aksi_t_rombel') ?>" method="POST">
                    <div class="form-group">
                        <label for="Rombel">Rombel</label>
                        <input class="form-control" name="rombel" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas">
                            <option value="">Pilih</option>
                            <?php foreach ($k as $key): ?>
                                <option value="<?= $key->id_kelas ?>"><?= $key->nama_kelas ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan">
                            <option value="">Pilih</option>
                            <?php foreach ($j as $key): ?>
                                <option value="<?= $key->id_jurusan ?>"><?= $key->nama_jurusan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Rombel -->
<div class="modal fade" id="editRombelModal" tabindex="-1" role="dialog" aria-labelledby="editRombelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRombelModalLabel">Edit Rombel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('home/aksi_e_rombel') ?>" method="POST">
                    <input type="hidden" name="id_rombel" id="edit_id_rombel">
                    <div class="form-group">
                        <label for="Rombel">Rombel</label>
                        <input class="form-control" name="rombel" id="edit_rombel" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" name="kelas" id="edit_kelas">
                            <option value="">Pilih</option>
                            <?php foreach ($k as $key): ?>
                                <option value="<?= $key->id_kelas ?>"><?= $key->nama_kelas ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="edit_jurusan">
                            <option value="">Pilih</option>
                            <?php foreach ($j as $key): ?>
                                <option value="<?= $key->id_jurusan ?>"><?= $key->nama_jurusan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function openEditModal(id_rombel, nama_rombel, id_kelas, id_jurusan) {
        $('#edit_id_rombel').val(id_rombel);
        $('#edit_rombel').val(nama_rombel);
        $('#edit_kelas').val(id_kelas);
        $('#edit_jurusan').val(id_jurusan);
        $('#editRombelModal').modal('show');
    }
</script>