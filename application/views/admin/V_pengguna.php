<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card shadow mb-4 border-bottom-success">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">Data User</h6>

        <a class="btn btn-success" data-toggle="modal" data-target="#fromTambah">Tambah Data <i class="fa fa-plus" style="margin-left: 10px;"></i></a>

    </div>

    <div class="card-body">

        <div class="table-responsive mt-4">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP Pegawai</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP Pegawai</th>
                        <th>Jabatan</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($user as $row) :
                    ?>
                    <?php if($row->level !== 'admin') { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row->username; ?></td>
                            <td><?= $row->nip_pegawai; ?></td>
                            <td><?= $row->level; ?></td>
                            <td><?= $row->alamat; ?></td>
                            <td>
                                <img src="<?= base_url('assets/img/') . $row->foto ?>" width="50px" alt="">
                            </td>
                            <td>
                                <a type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#fromEditArsip<?= $row->id_user; ?>"> Ubah</a>
                                <a href="<?= base_url('admin/User/Hapus/' . $row->id_user) ?>" class="btn-sm btn-danger" id="btn-hapus"> Hapus</a>

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
<!-- modal From Tambah Data Arsip -->
<div class="modal fade " id="fromTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">From Tambah Data Pengguna</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body ">

                <?= form_open_multipart('admin/User/simpan'); ?>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">NIP Pegawai</label>
                        <input type="text" name="nip" class="form-control " placeholder="Masukkan NIP Pegawai" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control " placeholder="Masukkan Username" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control " placeholder="Masukkan Password" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control " placeholder="Masukkan Alamat" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Level</label>
                        <select name="level" id="" class="form-control ">
                            <option value="">Pilih Level</option>
                            <option value="pegawai">Pegawai/Guru</option>
                            <option value="atasan">Kepala Sekolah</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Foto</label>
                        <input type="file" name="foto" class="form-control " required>
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
<!-- end modal From Tambah Data -->

<!-- modal From Edit Data  -->
<?php foreach ($user as $row) { ?>
    <div class="modal fade " id="fromEditArsip<?= $row->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">From Ubah Pengguna</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card-body ">
                    <?= form_open_multipart('admin/User/Ubah'); ?>
                    <div class="row">
                        <input type="text" name="id" value="<?= $row->id_user ?>">
                        <div class="form-group col-md-12">
                            <label for="">NIP Pegawai</label>
                            <input type="text" name="nip" class="form-control " value="<?= $row->nip_pegawai ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control " value="<?= $row->username ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control " value="<?= $row->password ?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" class="form-control " value="<?= $row->alamat ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Level</label>
                            <select name="level" id="" class="form-control " required>
                                <option value="">Pilih Level</option>
                                <option value="pegawai">Pegawai/Guru</option>
                                <option value="atasan">Kepala Sekolah</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control " required>
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