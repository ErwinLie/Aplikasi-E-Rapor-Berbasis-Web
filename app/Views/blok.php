<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Blok</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('home/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('home/blok') ?>">Blok</a></div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Data Blok</h4>
                    </div>
                    <div>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahBlokModal">
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
                                    <th scope="col">Blok</th>
                                    <!-- <th scope="col">Tahun Ajaran</th> -->
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <?php 
                                    $no = 1;
                                    foreach($erwin as $wkwk){
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $wkwk->nama_blok ?></td>
                                        <!-- <td><?= $wkwk->tahun_ajaran ?></td> -->
                                        <td>
                                            <!-- Edit Button triggers Edit Modal -->
                                            <a href="javascript:void(0)"
                                               class="btn btn-primary btn-action mr-1"
                                               data-toggle="modal"
                                               data-target="#editBlokModal"
                                               onclick="populateEditBlokModal(<?= $wkwk->id_blok ?>, '<?= $wkwk->nama_blok ?>', '<?= $wkwk->tahun_ajaran ?>')"
                                               title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="<?= base_url('home/hapus_blok/'.$wkwk->id_blok) ?>"
                                               class="btn btn-danger btn-action"
                                               data-toggle="tooltip"
                                               title="Delete"
                                               data-confirm="Are You Sure?|This action cannot be undone. Do you want to continue?"
                                               data-confirm-yes="alert('Deleted')">
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

<!-- Modal for Adding Blok -->
<div class="modal fade" id="tambahBlokModal" tabindex="-1" role="dialog" aria-labelledby="tambahBlokModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBlokModalLabel">Tambah Blok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_t_blok') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputBlok">Blok</label>
                        <input type="text" class="form-control" name="blok" id="inputBlok" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran" id="tahun_ajaran" required>
                            <option value="">Pilih</option>
                            <?php foreach ($t as $key): ?>
                                <option value="<?= $key->id_tahun_ajaran ?>"><?= $key->tahun_ajaran ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Editing Blok -->
<div class="modal fade" id="editBlokModal" tabindex="-1" role="dialog" aria-labelledby="editBlokModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBlokModalLabel">Edit Blok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_e_blok') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_blok" id="editIdBlok">
                    <div class="form-group">
                        <label for="editBlok">Blok</label>
                        <input type="text" class="form-control" name="blok" id="editBlok" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="editTahunAjaran">Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran" id="editTahunAjaran" required>
                            <option value="">Pilih</option>
                            <?php foreach ($t as $key): ?>
                                <option value="<?= $key->id_tahun_ajaran ?>"><?= $key->tahun_ajaran ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function populateEditBlokModal(id, nama_blok, tahun_ajaran) {
        document.getElementById('editIdBlok').value = id;
        document.getElementById('editBlok').value = nama_blok;
        document.getElementById('editTahunAjaran').value = tahun_ajaran;
    }
</script>
