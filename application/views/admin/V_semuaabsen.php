
<div class="card shadow mb-4 border-bottom-success">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Detail Absensi Pegawai</h6>
        <a href="<?= base_url('Admin/Absensi/excel/' . $this->uri->segment(4)); ?>" class="btn btn-success">Export Excel</a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>TANGGAL</th>
                        <th>NIP PEGAWAI</th>
                        <th>NAMA</th>
                        <th>JAM MASUK</th>
                        <th>JAM KELUAR</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>TANGGAL</th>
                        <th>NIP PEGAWAI</th>
                        <th>NAMA</th>
                        <th>JAM MASUK</th>
                        <th>JAM KELUAR</th>
                        <th>Status</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($absen as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->tgl; ?></td>
                            <td><?= $row->nip_pegawai; ?></td>
                            <td><?= $row->nama_pegawai; ?></td>
                            <td>
                                <?php if ($row->jam_masuk == '06:00:00' && '08:00:00') { ?>
                                    <label class="btn-sm btn-success"> <?= $row->jam_masuk ?></label>
                                <?php } else if ($row->jam_masuk > '08:00:00') { ?>
                                    <label class="btn-sm btn-danger"> <?= $row->jam_masuk ?></label>
                                    <p><small><em>Anda terlambat Absen masuk.</em></small></p>
                                    <?php } else if ($row->jam_masuk < '06:00:00') { ?>
                                        <label class="btn-sm btn-info"> <?= $row->jam_masuk ?></label>
                                        <p><small><em>Anda terlalu cepat Absen masuk.</em></small></p>
                                <?php }    ?>
                            </td>
                            <td>
                            <?php if ($row->jam_keluar == null) { ?>
                                <?php } else if ($row->jam_keluar == '17:00:00' && '20:00:00') { ?>
                                    <label class="btn-sm btn-success"> <?= $row->jam_keluar ?></label>
                                    <?php } else if ($row->jam_keluar < '17:00:00') { ?>
                                    <label class="btn-sm btn-danger"> <?= $row->jam_keluar ?></label>
                                    <p><small><em>Anda Terlalu cepat pulang.</em></small></p>
                                    <?php } else if ($row->jam_keluar >= '20:00:00') { ?>
                                    <label class="btn-sm btn-danger"> <?= $row->jam_keluar ?></label>
                                    <p><small><em>Anda Lembur.</em></small></p>
                               
                                <?php }    ?>
                            </td>
                            <td>
                                <?php echo ($row->status == 'hadir' ? '<label class="badge badge-success">Hadir</label>' : ($row->status == 'izin' ? '<label class="badge badge-warning">Izin</label>' : ($row->status == 'sakit' ? '<label class="badge badge-primary">Sakit</label>' : '<label class="badge badge-danger">menuggu</label>'))) ?>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>