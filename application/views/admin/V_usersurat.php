<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>


<div class="card shadow mb-4 border-bottom-success">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Disposisi</h6>

    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Surat</th>
                        <th>Perihal</th>
                        <th>Status</th>
                        <th>File</th>
                        <th>#</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Surat</th>
                        <th>Perihal</th>
                        <th>Status</th>
                        <th>File</th>
                        <th>#</th>

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
                            <td>
                                <p>No. Surat :<?= $row->no_surat; ?></p>
                                <p>Tanggal Terima : <?= $row->tgl; ?></p>
                                <p>Tanggal Surat : <?= $row->tglsurat; ?></p>
                                <p>Asal Surat : <?= $row->dari; ?></p>
                            </td>
                            <td>
                                <p>No. Agenda : <?= $row->ket; ?></p>
                                <p>Perihal : <?= $row->hal; ?></p>
                            </td>
                            <td>
                                <p>Sifat : <?= $row->sifat; ?></p>
                            <p> Baca : <?= $row->baca; ?></p>
                            </td>
                            <td>
                                <?= $row->file; ?>
                              <br><br>
                                <?php if ($row->status == 0 || $row->status == '') { ?>
                                    <label for="" class="badge badge-danger">menuggu dibaca pimpinan</label>
                                <?php } else if ($row->status == '1') { ?>
                                    <label for="" class="badge badge-info">Telah dilihat dan di teruskan</label>
                                <?php } ?>
                            </td>
                            </td>
                            <td>
                            <?php if ($this->session->userdata('level') == "atasan") { ?>
                                <a href="<?= base_url('Disposisi/Cekpimpinan/' . $row->id_surat) ?>" class="btn-sm btn-primary">Cek lihat</a>
                            <br><br>
                            <a href="<?= base_url('Disposisi/kirim/' . $row->id_surat) ?>" class="btn-sm btn-success">Disposisi</a>
                            <?php } else if ($this->session->userdata('level') == "pegawai") { ?>
                            <?php if ($row->status == '1') { ?>
                                <a href="<?= base_url('Disposisi/Cek/' . $row->id_surat) ?>" class="btn-sm btn-primary">dikerjakan</a>
                            <?php } ?>
                            <?php } ?>
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

<!-- <?php foreach ($surat as $row) : ?>
    <div class="modal fade " id="fromEditArsip<?= $row->id_surat; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">

                <div class="card-body ">

                    <div class="card-body ">
                        <?= form_open('Disposisi/updateStatus'); ?>
                        <div class="form-group">
                            <input type="text" name="id" class="form-control " value="<?= $row->id_surat ?>">
                        </div>
                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-check-input" type="radio" name="lihat" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Dilihat
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="radio" name="lihat" id="flexRadioDefault2" >
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Dikerjakan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <button class="btn btn-primary" type="submit">CeK</button>
                        </div>
                        <?= form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?> -->