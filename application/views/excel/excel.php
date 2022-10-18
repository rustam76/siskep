<?php
header("Content-type:application/octet-stream/");

header("Content-Disposition:attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>
<h3> Laporan data Pegawai Tanggal : <?= date('d F Y'); ?> </h3>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>NIP PEGAWAI</th>
            <th>NAMA</th>
            <th>PANGKAT/GOL</th>
            <th>JENNIS KELAMIN</th>
            <th>PENDIDIKAN</th>
            <th>TTL</th>
            <th>ALAMAT</th>
            <th>TGL MUlAI</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($semua as $row) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nip_pegawai']; ?></td>
                <td><?= $row['nama_pegawai']; ?></td>
                <td><?= $row['pangkat']; ?></td>
                <td><?= $row['jenis']; ?></td>
                <td><?= $row['pendidikan']; ?></td>
                <td><?= $row['ttl']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td><?= $row['mulai']; ?></td>
            </tr>
        <?php $no++; endforeach; ?>
    </tbody>

</table>