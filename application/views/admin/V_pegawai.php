<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card shadow mb-4 border-bottom-success">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data Pegawai</h6>

        <a class="btn btn-success" data-toggle="modal" data-target="#fromTambah">Tambah Data <i class="fa fa-plus" style="margin-left: 10px;"></i></a>

    </div>

    <div class="card-body">
    
        <!-- <a href="<?= base_url('exportimport/mpdf'); ?>" class="btn btn-danger">Export Pdf</a> -->
        <a href="<?= base_url('Admin/Pegawai/excel'); ?>" class="btn btn-success">Export Excel</a>
      
        <div class="table-responsive mt-4">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP PEGAWAI</th>
                        <th>NAMA</th>
                        <th>PANGKAT/GOL</th>
                        <th>JABATAN</th>
                        <th>JENNIS KELAMIN</th>
                        <th>PENDIDIKAN</th>
                        <th>TTL</th>
                        <th>ALAMAT</th>
                        <th>TGL MUlAI</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIP PEGAWAI</th>
                        <th>NAMA</th>
                        <th>PANGKAT/GOL</th>
                        <th>JABATAN</th>
                        <th>JENNIS KELAMIN</th>
                        <th>PENDIDIKAN</th>
                        <th>TTL</th>
                        <th>ALAMAT</th>
                        <th>TGL MUlAI</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pegawai as $row) :
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->nip_pegawai; ?></td>
                            <td><?= $row->nama_pegawai; ?></td>
                            <td><?= $row->pangkat; ?></td>
                            <td><?= $row->jabatan; ?></td>
                            <td><?= $row->jenis; ?></td>
                            <td><?= $row->pendidikan; ?></td>
                            <td><?= $row->ttl; ?></td>
                            <td><?= $row->alamat; ?></td>
                            <td><?= $row->mulai; ?></td>
                            <td>
                                <a type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#fromEditArsip<?= $row->id_pegawai; ?>"> Ubah</a>
                                <br><br>
                                <a href="<?= base_url('admin/Pegawai/Hapus/' . $row->id_pegawai) ?>" class="btn-sm btn-danger" id="btn-hapus"> Hapus</a>

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

                <?= form_open('admin/Pegawai/simpanData'); ?>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">NIP Pegawai</label>
                        <input type="text" name="nip" class="form-control " placeholder="Masukkan NIP Pegawai" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control " placeholder="Masukkan Nama Pegawai" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Jeni Kelamin</label>
                        <select name="jenis" class="form-control " required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Pangkat/Golongan</label>
                        <select name="pangkat" class="form-control " required>
                        <option value="">Pilih Pangkat</option>
                        <option value="Gol/Ia">Gol/Ia</option>
                        <option value="Gol/Ib">Gol/Ib</option>
                        <option value="Gol/Ic">Gol/Ic</option>
                        <option value="Gol/Id">Gol/Id</option>
                        <option value="Gol/IIa">Gol/IIa</option>
                        <option value="Gol/IIb">Gol/IIb</option>
                        <option value="Gol/IIc">Gol/IIc</option>
                        <option value="Gol/IId">Gol/IId</option>
                        <option value="Gol/IIIa">Gol/IIIa</option>
                        <option value="Gol/IIIb">Gol/IIIb</option>
                        <option value="Gol/IIIc">Gol/IIIc</option>
                        <option value="Gol/IIId">Gol/IIId</option>
                        <option value="Gol/IVa">Gol/IVa</option>
                        <option value="Gol/IVb">Gol/IVb</option>
                        <option value="Gol/IVc">Gol/IVc</option>
                        <option value="Gol/IVd">Gol/IVd</option>
                        <option value="Honorer">Honorer</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Jabatan</label>
                        <select name="jabatan" class="form-control " required>
                                <option value="">Pilih Jabatan</option>
                                <option value="Staf">Staf</option>
                                <option value="Pegawai/Guru">Pegawai/Guru</option>
                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Pendidikan</label>
                        <select name="pendidikan" class="form-control " required>
                                <option value="">Pilih Pendidikan</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="-">LAINYA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Tempat Tanggal Lahir</label>
                        <input type="text" name="ttl" class="form-control " placeholder="Masukkan TTL" required>
                    <small>*contoh : Mokupa, 19-januari-1999</small>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control " required></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Masuk Kerja</label>
                        <input type="date" name="mulai" class="form-control "  required>
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
<!-- end modal From Tambah Data Arsip -->

<!-- modal From Edit Data Arsip -->
<?php foreach ($pegawai as $row) { ?>
    <div class="modal fade " id="fromEditArsip<?= $row->id_pegawai; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Ubah Data Arsip</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">

                    <?= form_open('admin/Pegawai/ubahData'); ?>
                    <div class="row">
                        <input type="text" name="id" value="<?= $row->id_pegawai ?>">
                    <div class="form-group col-md-12">
                        <label for="">NIP Pegawai</label>
                        <input type="text" name="nip" class="form-control " value="<?= $row->nip_pegawai ?>" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control " value="<?= $row->nama_pegawai ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Jeni Kelamin</label>
                        <select name="jenis" class="form-control " required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                 
                    <div class="form-group col-md-6">
                        <label for="">Jabatan</label>
                        <select name="jabatan" class="form-control ">
                                <option value="<?= $row->jabatan ?>"><?= $row->jabatan ?></option>
                                <option value="Staf">Staf</option>
                                <option value="Pegawai/Guru">Pegawai/Guru</option>
                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Pendidikan</label>
                        <select name="pendidikan" class="form-control " required>
                                <option value="<?= $row->pendidikan ?>"><?= $row->pendidikan ?></option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="-">LAINYA</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Pangkat/Golongan</label>
                        <select name="pangkat" class="form-control " required>
                        <option value="<?= $row->pangkat ?>"><?= $row->pangkat ?></option>
                        <option value="Gol/Ia">Gol/Ia</option>
                        <option value="Gol/Ib">Gol/Ib</option>
                        <option value="Gol/Ic">Gol/Ic</option>
                        <option value="Gol/Id">Gol/Id</option>
                        <option value="Gol/IIa">Gol/IIa</option>
                        <option value="Gol/IIb">Gol/IIb</option>
                        <option value="Gol/IIc">Gol/IIc</option>
                        <option value="Gol/IId">Gol/IId</option>
                        <option value="Gol/IIIa">Gol/IIIa</option>
                        <option value="Gol/IIIb">Gol/IIIb</option>
                        <option value="Gol/IIIc">Gol/IIIc</option>
                        <option value="Gol/IIId">Gol/IIId</option>
                        <option value="Gol/IVa">Gol/IVa</option>
                        <option value="Gol/IVb">Gol/IVb</option>
                        <option value="Gol/IVc">Gol/IVc</option>
                        <option value="Gol/IVd">Gol/IVd</option>
                        <option value="Honorer">Honorer</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Tempat Tanggal Lahir</label>
                        <input type="text" name="ttl" class="form-control " value="<?= $row->ttl ?>">
                    <small>*contoh : Mokupa, 19-januari-1999</small>
                    </div>
                    
                    <div class="form-group col-md-12">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control " required><?= $row->alamat ?></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Masuk Kerja</label>
                        <input type="text" name="mulai" class="form-control "  value="<?= $row->mulai ?>" readonly>
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
<!-- end modal From Tambah Data Arsip -->