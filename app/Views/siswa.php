<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('home/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('home/siswa') ?>">Siswa</a></div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Data Siswa</h4>
                    </div>
                    <div>
                        <!-- Button to Open the Modal for Adding Siswa -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahSiswaModal">
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
                                    <th scope="col">NIS</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal Lahir</th>
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
                                        <td><?= $wkwk->nama_rombel ?></td>
                                        <td><?= $wkwk->nis ?></td>
                                        <td><?= $wkwk->nama_siswa ?></td>
                                        <td><?= $wkwk->tgl_lahir ?></td>
                                        <td>
                                            <!-- Edit Button triggers Edit Modal -->
                                            <a href="javascript:void(0)"
                                               class="btn btn-primary btn-action mr-1"
                                               data-toggle="modal"
                                               data-target="#editSiswaModal"
                                               onclick="populateEditSiswaModal(<?= $wkwk->id_siswa ?>, '<?= $wkwk->nis ?>', '<?= $wkwk->nama_siswa ?>', '<?= $wkwk->tgl_lahir ?>', '<?= $wkwk->rombel ?>')"
                                               title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="<?= base_url('home/hapus_siswa/'.$wkwk->id_siswa) ?>"
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

<!-- Modal for Adding Siswa -->
<div class="modal fade" id="tambahSiswaModal" tabindex="-1" role="dialog" aria-labelledby="tambahSiswaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahSiswaLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_t_siswa') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nisInput">NIS</label>
                        <input type="text" class="form-control" name="nis" id="nisInput" required>
                    </div>
                    <div class="form-group">
                        <label for="namaSiswaInput">Nama</label>
                        <input type="text" class="form-control" name="nama_siswa" id="namaSiswaInput" required>
                    </div>
                    <div class="form-group">
                        <label for="tglLahirInput">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tglLahirInput" required>
                    </div>
                    <div class="form-group">
                        <label for="rombelInput">Rombel</label>
                        <select class="form-control" name="rombel" id="rombelInput" required>
                            <option value="">Pilih Rombel</option>
                            <!-- Populate this with your Rombel options -->
                            <?php foreach ($rombel as $r) : ?>
                                <option value="<?= $r->id_rombel ?>"><?= $r->nama_rombel ?></option>
                            <?php endforeach; ?>
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

<!-- Modal for Editing Siswa -->
<div class="modal fade" id="editSiswaModal" tabindex="-1" role="dialog" aria-labelledby="editSiswaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSiswaLabel">Edit Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_e_siswa') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_siswa" id="editSiswaId">
                    <div class="form-group">
                        <label for="editNisInput">NIS</label>
                        <input type="text" class="form-control" name="nis" id="editNisInput" required>
                    </div>
                    <div class="form-group">
                        <label for="editNamaSiswaInput">Nama</label>
                        <input type="text" class="form-control" name="nama_siswa" id="editNamaSiswaInput" required>
                    </div>
                    <div class="form-group">
                        <label for="editTglLahirInput">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="editTglLahirInput" required>
                    </div>
                    <div class="form-group">
                        <label for="editRombelInput">Rombel</label>
                        <select class="form-control" name="rombel" id="editRombelInput" required>
                            <option value="">Pilih Rombel</option>
                            <!-- Populate this with your Rombel options -->
                            <?php foreach ($rombel as $r) : ?>
                                <option value="<?= $r->id_rombel ?>"><?= $r->nama_rombel ?></option>
                            <?php endforeach; ?>
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
    function populateEditSiswaModal(id, nis, nama_siswa, tgl_lahir, rombel) {
        $('#editSiswaId').val(id);
        $('#editNisInput').val(nis);
        $('#editNamaSiswaInput').val(nama_siswa);
        $('#editTglLahirInput').val(tgl_lahir);
        $('#editRombelInput').val(rombel);
    }
</script>
