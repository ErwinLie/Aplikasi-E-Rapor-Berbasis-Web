<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tahun Ajaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('home/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('home/tahun_ajaran') ?>">Tahun Ajaran</a></div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Data Tahun Ajaran</h4>
                    </div>
                    <div>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addTahunAjaranModal">
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
                                    <th scope="col">Tahun Ajaran</th>
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
                                        <td><?= $wkwk->tahun_ajaran?></td>
                                        <td>
                                            <!-- Edit Button triggers Edit Modal -->
                                            <a href="javascript:void(0)" 
                                               class="btn btn-primary btn-action mr-1" 
                                               data-toggle="modal" 
                                               data-target="#editTahunAjaranModal" 
                                               onclick="populateEditModal(<?= $wkwk->id_tahun_ajaran ?>, '<?= $wkwk->tahun_ajaran ?>')" 
                                               title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="<?= base_url('home/hapus_tahun_ajaran/'.$wkwk->id_tahun_ajaran) ?>" 
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

<!-- Modal for Adding Tahun Ajaran -->
<div class="modal fade" id="addTahunAjaranModal" tabindex="-1" role="dialog" aria-labelledby="addTahunAjaranModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTahunAjaranModalLabel">Tambah Tahun Ajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_t_tahun_ajaran') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputText">Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" id="inputText" required>
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

<!-- Modal for Editing Tahun Ajaran -->
<div class="modal fade" id="editTahunAjaranModal" tabindex="-1" role="dialog" aria-labelledby="editTahunAjaranModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTahunAjaranModalLabel">Edit Tahun Ajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_e_tahun_ajaran') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_tahun_ajaran" id="editIdTahunAjaran">
                    <div class="form-group">
                        <label for="editTahunAjaranText">Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" id="editTahunAjaranText" required>
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
    function populateEditModal(id, tahun_ajaran) {
        document.getElementById('editIdTahunAjaran').value = id;
        document.getElementById('editTahunAjaranText').value = tahun_ajaran;
    }
</script>
