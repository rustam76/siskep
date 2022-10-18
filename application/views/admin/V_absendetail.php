


<div class="card mb-4 shadow border-bottom-success mt-5">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Absensi </h6>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP PEGAWAI</th>
                        <th>NAMA</th>
                        <th>lihat Absen</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>No</th>
                        <th>NIP PEGAWAI</th>
                        <th>NAMA</th>
                        <th>lihat Absen</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($absen as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->nip_pegawai; ?></td>
                            <td><?= $row->nama_pegawai; ?></td>
                            <td>
                            <a href="<?= base_url('admin/Absensi/detailAbsen/' . $row->nip_pegawai) ?>" class="badge badge-danger"><i class="fa fa-eye"></i> Lihat Absensi</a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>