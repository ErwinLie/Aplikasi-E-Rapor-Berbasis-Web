<main role="main" class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('home/dashboard') ?>" class="btn btn-icon">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <h1>Jadwal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('home/dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('home/jadwal') ?>">Jadwal</a>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Tampil Jadwal</strong>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="rombel">Rombel</label>
                        <select class="form-control" name="rombel" id="rombel">
                            <option value="">Pilih</option>
                            <?php foreach ($r as $key): ?>
                                <option value="<?= $key->id_rombel ?>"><?= $key->nama_rombel ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="blok">Blok</label>
                        <select class="form-control" name="blok" id="blok">
                            <option value="">Pilih</option>
                            <?php foreach ($b as $key): ?>
                                <option value="<?= $key->id_blok ?>"><?= $key->nama_blok ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                            <option value="">Pilih</option>
                            <?php foreach ($t as $key): ?>
                                <option value="<?= $key->id_tahun_ajaran ?>"><?= $key->tahun_ajaran ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button class="btn btn-danger" id="hapusJadwal">Hapus Jadwal</button>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="card shadow mb-4">
                            <table class="table align-items-center table-flush" id="table">
                                <thead>
                                    <tr>
                                        <th class="font-14">Sesi</th>
                                        <th class="font-14">Nama Guru</th>
                                        <th class="font-14">Mata Pelajaran</th>
                                        <th class="font-14">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="jadwalBody">
                                    <!-- Data jadwal akan dimuat di sini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div> <!-- /.col -->
    </div> <!-- /.row -->
</main>

<!-- Modal Edit Jadwal -->
<div class="modal fade" id="modalEditJadwal" tabindex="-1" role="dialog" aria-labelledby="modalEditJadwalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditJadwalLabel">Edit Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="" action="<?= base_url('home/edit_jadwal') ?>" method="POST">
                    <!-- Hidden inputs for sesi and id_jadwal -->
                    <input type="hidden" id="editSesi" name="sesi">
                    <input type="hidden" id="editjadwal" name="id_jadwal" value="<?= $jadwal->id_jadwal ?>">

                    <!-- Guru Selection -->
                    <div class="form-group">
                        <label for="editNamaGuru">Nama Guru</label>
                        <select class="form-control" id="editNamaGuru" name="nama_guru">
                            <?php foreach ($guru as $g): ?>
                                <option value="<?= $g->id_guru ?>" <?= ($g->id_guru == $jadwal->id_guru) ? 'selected' : '' ?>><?= $g->nama_guru ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Mapel Selection -->
                    <div class="form-group">
                        <label for="editNamaMapel">Mata Pelajaran</label>
                        <select class="form-control" id="editNamaMapel" name="nama_mapel">
                            <?php foreach ($mapel as $m): ?>
                                <option value="<?= $m->id_mapel ?>" <?= ($m->id_mapel == $jadwal->id_mapel) ? 'selected' : '' ?>><?= $m->nama_mapel ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="">Edit Jadwal</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function fetchJadwal() {
        var rombel = $('#rombel').val();
        var blok = $('#blok').val();
        var tahun_ajaran = $('#tahun_ajaran').val();

        if (rombel && blok && tahun_ajaran) {
            $.ajax({
                url: "<?= base_url('home/get_jadwal') ?>",
                method: "POST",
                data: {
                    rombel: rombel,
                    blok: blok,
                    tahun_ajaran: tahun_ajaran
                },
                dataType: 'json',
                success: function(data) {   
                    $('#jadwalBody').empty();
                    if (data.length > 0) {
                        $.each(data, function(index, jadwal) {
                            var row = '<tr>' +
                                '<td>' + jadwal.sesi + '</td>' +
                                '<td>' + jadwal.nama_guru + '</td>' +
                                '<td>' + jadwal.nama_mapel + '</td>' +
                                '<td>' +
                                '<button class="btn btn-sm btn-warning editJadwalBtn" data-sesi="' + jadwal.sesi + '" data-id-guru="' + jadwal.id_guru + '" data-id-mapel="' + jadwal.id_mapel + '" data-id-jadwal="' + jadwal.id_jadwal +'">Edit</button>' +
                                '</td>' +
                                '</tr>';
                            $('#jadwalBody').append(row);
                        });
                    } else {
                        $('#jadwalBody').append('<tr><td colspan="4" class="text-center">Jadwal tidak ditemukan.</td></tr>');
                    }
                },
                error: function() {
                    alert('Gagal mengambil data jadwal.');
                }
            });
        } else {
            $('#jadwalBody').empty();
            $('#jadwalBody').append('<tr><td colspan="4" class="text-center">Pilih Rombel, Blok, dan Tahun Ajaran.</td></tr>');
        }
    }

    $('#hapusJadwal').on('click', function() {
        var rombel = $('#rombel').val();
        var blok = $('#blok').val();
        var tahun_ajaran = $('#tahun_ajaran').val();

        if (rombel && blok && tahun_ajaran) {
            if (confirm('Apakah Anda yakin ingin menghapus jadwal untuk Rombel, Blok, dan Tahun Ajaran yang dipilih?')) {
                $.ajax({
                    url: "<?= base_url('home/hapus_jadwal') ?>",
                    method: "POST",
                    data: {
                        rombel: rombel,
                        blok: blok,
                        tahun_ajaran: tahun_ajaran
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert('Jadwal berhasil dihapus');
                            fetchJadwal();
                        } else {
                            alert('Gagal menghapus jadwal');
                        }
                    },
                    error: function() {
                        alert('Gagal menghapus jadwal.');
                    }
                });
            }
        } else {
            alert('Silakan pilih Rombel, Blok, dan Tahun Ajaran.');
        }
    });

    $('#rombel, #blok, #tahun_ajaran').on('change', fetchJadwal);

    $(document).on('click', '.editJadwalBtn', function() {
        var sesi = $(this).data('sesi');
        var id_guru = $(this).data('id-guru');
        var id_mapel = $(this).data('id-mapel');
        var id_jadwal = $(this).data('id-jadwal');
        $('#editSesi').val(sesi);
        $('#editNamaGuru').val(id_guru);
        $('#editNamaMapel').val(id_mapel);
        $('#editjadwal').val(id_jadwal);
        $('#modalEditJadwal').modal('show');
    });

    $('#btnUpdateJadwal').on('click', function() {
        var formData = $('#formEditJadwal').serialize();

        $.ajax({
            url: "<?= base_url('home/edit_jadwal') ?>",
            method: "POST",
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    alert('Jadwal berhasil diperbarui');
                    $('#modalEditJadwal').modal('hide');
                    fetchJadwal();
                } else {
                    alert('Gagal memperbarui jadwal');
                }
            },
            error: function() {
                alert('Gagal memperbarui jadwal.');
            }
        });
    });
</script>
