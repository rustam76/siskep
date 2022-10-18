<?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>
<h3> Laporan data Absensi Tanggal : <?= date('d F Y'); ?> </h3>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>NIP PEGAWAI</th>
            <th>NAMA</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>tgl</th>
            <th>Kehadiran</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($semua as $row) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['pegawai_nip']; ?></td>
                <td><?= $row['nama_pegawai']; ?></td>
                <td><?= $row['jam_masuk']; ?></td>
                <td><?= $row['jam_keluar']; ?></td>
                <td><?= $row['tgl']; ?></td>
                <td><?= $row['status']; ?></td>
    
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>

</table>