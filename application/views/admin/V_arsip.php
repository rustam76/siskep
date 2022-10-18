<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>


<div class="card shadow mb-4 border-bottom-success">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Arsip Surat</h6>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tgl</th>
                        <th>Perihal</th>
                        <th>Asal</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>#</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tgl</th>
                        <th>Perihal</th>
                        <th>Asal</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>#</th>

                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($surat as $row) :
                    ?>
                    <?php if ($row->status == '2') { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->no_surat; ?></td>
                            <td><?= $row->tgl; ?></td>
                            <td><?= $row->isi_singkat; ?>
                            </td>
                            <td><?= $row->dari; ?></td>
                            <td><?= $row->file; ?></td>
                            <td>
                                <?php if ($row->status == 0 || $row->status == '') { ?>
                                    <label for="" class="badge badge-danger">menuggu dibaca pimpinan</label>
                                <?php } else if ($row->status == '1') { ?>
                                    <label for="" class="badge badge-info">Telah dilihat dan di teruskan</label>
                                <?php } else if ($row->status == '2') { ?>
                                    <label for="" class="badge badge-success">Telah dikerjakan</label>
                                <?php } ?>
                            </td>
                            <td>
                            <a type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#fromEditArsip<?= $row->id_surat; ?>"> Ubah</a>
                            <a href="<?= base_url('admin/Disposisi/Hapus/' . $row->id_surat) ?>" class="btn-sm btn-danger" id="btn-hapus">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php foreach ($surat as $row) { ?>
    <div class="modal fade " id="fromEditArsip<?= $row->id_surat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Ubah Data Arsip</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open('admin/Disposisi/ubahArsip'); ?>
                    <div class="row">
                        <input type="hidden" name="id" value="<?= $row->id_surat ?>">
                    <div class="form-group col-md-6">
                        <label for="">No. Surat</label>
                        <input type="text" name="no" class="form-control " value="<?= $row->no_surat ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Tanggal</label>
                        <input type="date" name="tgl" class="form-control " value="<?= $row->tgl ?>">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Perihal</label>
                        <input type="text" name="isi" class="form-control " value="<?= $row->isi_singkat ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Asal Surat</label>
                        <input type="text" name="asal" class="form-control " value="<?= $row->dari ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Status</label>
                        <select name="jenis" class="form-control " required>
                            <option value="">Pilih Status</option>
                            <option value="0">Menunggu</option>
                            <option value="1">Dilihat</option>
                            <option value="2">Dikerjakan</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">File</label>
                        <input type="file" name="nama" class="form-control ">
                    </div>
                   
                 
                    
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="reset">Reset</button>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>