<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card shadow mb-5">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">From Upload Surat Masuk</h6>

    </div>
    <div class="card-body">
        <?= form_open_multipart('admin/Disposisi/simpanSurat'); ?>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="">Tanggal</label>
                <input type="date" name="tgl" class="form-control " required>
            </div>
            <div class="form-group col-md-3">
                <label for="">No Surat</label>
                <input type="text" name="no" class="form-control " placeholder="Masukkan No Surat" required>
            </div>
            <div class="form-group col-md-3">
                <label for="">Asal</label>
                <input type="text" name="asal" class="form-control " placeholder="Masukkan Asal Surat" required>
            </div>
            <div class="form-group col-md-3">
                <label for="">Tanggal Surat</label>
                <input type="text" name="tglsurat" class="form-control " placeholder="Masukkan Tanggal Surat" required>
            </div>
            <div class="form-group col-md-12">
                <label for="">Perihal </label>
                <textarea name="isi" id="" class="form-control "></textarea>
            </div>
            <div class="form-group col-md-12">
                <label for="">Upload surat</label>
                <input type="file" name="file" class="form-control " placeholder="Masukkan Nama Pegawai" required>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="reset">Reset</button>
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<div class="card shadow mb-4 border-bottom-success">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Disposisi Surat Masuk</h6>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>Tanggal</th>
                        <th>Periahal</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>
                        <th>Tanggal</th>
                        <th>Periahal</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($surat as $row) :
                    ?>
<?php if ($row->status !== '2') { ?>
                        <tr>
                            <td><?= $no; ?></td>

                            <td><?= $row->no_surat; ?></td>
                            <td><?= $row->tgl; ?></td>
                            <td><?= $row->isi_singkat; ?>
                            </td>
                            <td><?= $row->file; ?></td>
                            <td>
                                <?php if ($row->status == 0 || $row->status == '') { ?>
                                    <label for="" class="badge badge-danger">menuggu dibaca pimpinan</label>
                                <?php } else if ($row->status == '1') { ?>
                                    <label for="" class="badge badge-info">Telah dilihat dan di teruskan</label>
                                <?php } ?>
                            </td>
                            <td><a href="<?= base_url('admin/Disposisi/kirim/' . $row->id_surat) ?>" class="btn-sm btn-success">Disposisi</a></td>
                        </tr>
                        <?php } ?>
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