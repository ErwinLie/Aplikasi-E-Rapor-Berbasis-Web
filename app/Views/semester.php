<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Semester</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('home/dashboard') ?>">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="<?= base_url('home/semester') ?>">Semester</a></div>
            </div>
        </div>
        <div class="col-lg-7 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h4>Data Semester</h4>
                    </div>
                    <div>
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSemesterModal">
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
                                    <th scope="col">Semester</th>
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
                                        <td><?= $wkwk->nama_semester ?></td>
                                        <td>
                                            <!-- Edit Button triggers Edit Modal -->
                                            <a href="javascript:void(0)"
                                               class="btn btn-primary btn-action mr-1"
                                               data-toggle="modal"
                                               data-target="#editSemesterModal"
                                               onclick="populateEditModal(<?= $wkwk->id_semester ?>, '<?= $wkwk->nama_semester ?>')"
                                               title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- Delete Button -->
                                            <a href="<?= base_url('home/hapus_semester/'.$wkwk->id_semester) ?>"
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

<!-- Modal for Adding Semester -->
<div class="modal fade" id="addSemesterModal" tabindex="-1" role="dialog" aria-labelledby="addSemesterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSemesterModalLabel">Tambah Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_t_semester') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputText">Semester</label>
                        <input type="text" class="form-control" name="semester" id="inputText" required>
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

<!-- Modal for Editing Semester -->
<div class="modal fade" id="editSemesterModal" tabindex="-1" role="dialog" aria-labelledby="editSemesterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSemesterModalLabel">Edit Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('home/aksi_e_semester') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_semester" id="editIdSemester">
                    <div class="form-group">
                        <label for="editSemesterText">Semester</label>
                        <input type="text" class="form-control" name="semester" id="editSemesterText" required>
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
    function populateEditModal(id, nama_semester) {
        document.getElementById('editIdSemester').value = id;
        document.getElementById('editSemesterText').value = nama_semester;
    }
</script>
