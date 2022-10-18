<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card shadow border-bottom-success">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h4 class="card-title">Absen Harian <?php echo $this->session->userdata('username')  ?></h4>
                    <?php if ($absen['keterangan'] == null) { ?>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Ajukan Izin</button>
                    <?php } else if ($absen['status'] == 'menunggu' || $absen['status'] == 'hadir' || $absen['status'] == 'izin' || $absen['status'] == 'sakit') { ?>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#myModal" disabled style="cursor:not-allowed"><i class="fa fa-plus"></i> Ajukan Izin</button>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>ABSEN MASUK</th>
                            <th>ABSEN PULANG</th>
                        </thead>
                        <tbody>

                            <?php $tgl_skrng = date('d-F-Y'); ?>
                            <tr>
                                <td>#</td>
                                <td>
                                    <?= date('d-F-Y'); ?>
                                </td>
                                <td>
                                    <?php if ($absen['keterangan'] == null) { ?>
                                        <a type="button" href="<?= base_url('Absensi/absen'); ?>" class="btn btn-success"> <i class="fa fa-check"></i>Absen Masuk</a>
                                    <?php } else if ($absen['status'] == 'menunggu' || $absen['status'] == 'hadir') { ?>
                                        <button type="button" class="btn btn-success" disabled style="cursor:not-allowed"> <i class="fa fa-check"></i>Absen Masuk</button>
                                    <?php } else if ($absen['status'] == 'izin' || $absen['status'] == 'sakit') { ?>
                                        <label for="" class="badge badge-warning">Hari ini Anda Izin</label>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($absen['keterangan'] == '1') { ?>
                                        <!--  -->
                                        <a type="button" href="<?= base_url('Absensi/pulang/') . $absen['id_absen']; ?>" class="btn btn-primary"> <i class="fas fa-sign-out-alt"></i> Absen Pulang</a>

                                    <?php } else if ($absen['keterangan'] >= '1' || $absen['keterangan'] <= '1') { ?>
                                        <button type="button" class="btn btn-primary" disabled style="cursor:not-allowed"> <i class="fas fa-sign-out-alt"></i> Absen Pulang</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-m">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title text-secondary"><strong>Cuti </strong></h5>
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-justify ">
                    <?php echo form_open('Absensi/Izin'); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <select name="status" id="" class="form-control">
                                    <option value="izin">IZIN</option>
                                    <option value="sakit">SAKIT</option>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                </div>
                </form>
            </div>

        </div>
    </div>