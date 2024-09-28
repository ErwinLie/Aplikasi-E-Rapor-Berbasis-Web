<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAPORT SISWA</title>
    <style>
        .report-header {
            text-align: left; /* Align left for uniform structure */
            margin: 20px 0;
        }
        .report-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center; /* Center the title */
        }
        .student-info {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .student-info div {
            width: 48%; /* Ensure proper spacing */
        }

        /* Table styling with full border */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border: 2px solid black; /* Outer border for the table */
        }
        th, td {
            border: 2px solid black; /* Full border for table cells */
            padding: 12px; /* Increased padding for more space */
            text-align: left;
        }

        /* Adjust letter-spacing and line height */
        th, td {
            letter-spacing: 1px; /* Add space between letters */
            line-height: 1.8; /* Increase row height */
        }
    </style>
</head>
<body>

<div class="report-header">
    <div class="report-title">RAPORT SISWA SEKOLAH PERMATA HARAPAN</div>

    <div class="student-info">
        <div>Nama: <?= esc($tb_penilaian[0]->nama_siswa) ?></div>
        <div>NIS: <?= esc($tb_penilaian[0]->nis) ?></div>
        <div>Rombel: <?= esc($tb_penilaian[0]->nama_rombel) ?></div>
        <div>Semester: <?= esc($tb_penilaian[0]->nama_semester) ?></div>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th>No</th> <!-- Added column for numbering -->
            <th>Mata Pelajaran</th>
            <th>Nilai Tugas</th>
            <th>Nilai Midblok</th>
            <th>Nilai Finalblok</th>
            <th>Predikat</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($tb_penilaian as $key): ?>
        <tr>
            <td><?= esc($no++) ?></td> <!-- Displaying the row number -->
            <td><?= esc($key->nama_mapel) ?></td>
            <td><?= esc($key->nilai_tugas) ?></td>
            <td><?= esc($key->nilai_midblok) ?></td>
            <td><?= esc($key->nilai_finalblok) ?></td>
            <td><?= esc($key->predikat) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>