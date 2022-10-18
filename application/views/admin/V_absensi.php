<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            TOTAL ABSEN HARI INI</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalabsenini; ?> Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            TOTAL SAKIT</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalsakit; ?> Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            TOTAL IZIN</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalizin; ?> Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            TOTAL PEGAWAI</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pegawai; ?> Orang</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4 border-bottom-success">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Absensi Hari ini</h6>

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
                    foreach ($absensi as $row) :
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


<!-- modal From Tambah Data Arsip -->
<div class="modal fade " id="fromTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Tambah Data Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

                <?= form_open_multipart('admin/Absensi/simpanData'); ?>
                <div class="form-group">
                    <input type="text" name="nip" class="form-control " placeholder="Masukkan NIP Pegawai" required>
                </div>
                <div class="form-group">
                    <input type="text" name="nama" class="form-control " placeholder="Masukkan Nama Pegawai" required>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="reset">Reset</button>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- end modal From Tambah Data Arsip -->