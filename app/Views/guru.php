<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('home/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('home/guru') ?>">Guru</a></div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Data Guru</h4>
                    </div>
                    <div>
                        <!-- Button to Open the Modal for Adding Guru -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahGuruModal">
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
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jenis Kelamin</th>
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
                                        <td><?= $wkwk->nik ?></td>
                                        <td><?= $wkwk->nama_guru ?></td>
                                        <td><?= $wkwk->jk ?></td>
                                        <td>
                                            <!-- Edit Button triggers Edit Modal -->
                                            <a href="javascript:void(0)"
                                               class="btn btn-primary btn-action mr-1"
                                               data-toggle="modal"
                                               data-target="#editGuruModal"
                                               onclick="populateEditGuruModal(<?= $wkwk->id_guru ?>, '<?= $wkwk->nik ?>', '<?= $wkwk->nama_guru ?>', '<?= $wkwk->jk ?>')"
                                               title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="<?= base_url('home/hapus_guru/'.$wkwk->id_guru) ?>"
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

<!-- Modal for Adding Guru -->
<div class="modal fade" id="tambahGuruModal" tabindex="-1" role="dialog" aria-labelledby="tambahGuruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahGuruLabel">Tambah Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_t_guru') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nikInput">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nikInput" required>
                    </div>
                    <div class="form-group">
                        <label for="namaGuruInput">Nama</label>
                        <input type="text" class="form-control" name="nama_guru" id="namaGuruInput" required>
                    </div>
                    <div class="form-group">
                        <label for="jkInput">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="jkInput" required>
                            <option value="">Pilih</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Editing Guru -->
<div class="modal fade" id="editGuruModal" tabindex="-1" role="dialog" aria-labelledby="editGuruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editGuruLabel">Edit Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_e_guru') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_guru" id="editGuruId">
                    <div class="form-group">
                        <label for="editNikInput">NIK</label>
                        <input type="text" class="form-control" name="nik" id="editNikInput" required>
                    </div>
                    <div class="form-group">
                        <label for="editNamaGuruInput">Nama</label>
                        <input type="text" class="form-control" name="nama_guru" id="editNamaGuruInput" required>
                    </div>
                    <div class="form-group">
                        <label for="editJkInput">Jenis Kelamin</label>
                        <select class="form-control" name="jk" id="editJkInput" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
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
    // Populate the edit modal with selected data
    function populateEditGuruModal(id, nik, nama_guru, jk) {
        document.getElementById('editGuruId').value = id;
        document.getElementById('editNikInput').value = nik;
        document.getElementById('editNamaGuruInput').value = nama_guru;
        document.getElementById('editJkInput').value = jk;
    }
</script>
