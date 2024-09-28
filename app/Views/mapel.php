<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?=base_url('home/dashboard')?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1> Mapel </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?=base_url('home/dashboard')?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?=base_url('home/mapel')?>">Mapel</a></div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Data Mapel</h4>
                    </div>
                    <div>
                        <!-- Button to trigger modal tambah -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahMapelModal">
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
                                    <th scope="col">Mapel</th>
                                    <th scope="col">KKM</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"> 
                                <?php 
                                    $no=1;
                                    foreach($erwin as $wkwk){
                                ?>                          
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $wkwk->nama_mapel?></td>
                                        <td><?= $wkwk->kkm?></td>
                                        <td>
                                            <a href="javascript:void(0)" 
                                                onclick="populateEditModal('<?= $wkwk->id_mapel ?>', '<?= $wkwk->nama_mapel ?>', '<?= $wkwk->kkm ?>')" 
                                                class="btn btn-primary btn-action mr-1" 
                                                data-toggle="tooltip" 
                                                title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="<?= base_url('home/hapus_mapel/'.$wkwk->id_mapel) ?>" 
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

<!-- Modal for Tambah Mapel -->
<div class="modal fade" id="tambahMapelModal" tabindex="-1" role="dialog" aria-labelledby="tambahMapelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahMapelModalLabel">Tambah Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('home/aksi_t_mapel') ?>" method="POST">
                    <div class="form-group">
                        <label for="mapel">Mapel</label>
                        <input type="text" class="form-control" name="mapel" id="mapel" required>
                    </div>
                    <div class="form-group">
                        <label for="kkm">KKM</label>
                        <input type="text" class="form-control" name="kkm" id="kkm" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Edit Mapel -->
<div class="modal fade" id="editMapelModal" tabindex="-1" role="dialog" aria-labelledby="editMapelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMapelModalLabel">Edit Mapel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('home/aksi_e_mapel') ?>" method="POST">
                    <input type="hidden" name="id_mapel" id="editIdMapel">
                    <div class="form-group">
                        <label for="editMapel">Mapel</label>
                        <input type="text" class="form-control" name="mapel" id="editMapel" required>
                    </div>
                    <div class="form-group">
                        <label for="editKkm">KKM</label>
                        <input type="text" class="form-control" name="kkm" id="editKkm" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to populate the edit modal -->
<script>
    function populateEditModal(id_mapel, nama_mapel, kkm) {
        $('#editIdMapel').val(id_mapel);
        $('#editMapel').val(nama_mapel);
        $('#editKkm').val(kkm);
        $('#editMapelModal').modal('show');
    }
</script>
