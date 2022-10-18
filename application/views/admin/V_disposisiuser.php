<div id="flash" data-flash="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="card shadow mb-5">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-dark">From Disposisi Surat</h6>

    </div>
    <div class="card-body">
        <?= form_open_multipart('Disposisi/kirimdisposisi'); ?>
        <div class="row">
            <input type="hidden" name="id" class="form-control " value="<?= $posisi['id_surat'] ?>">
            <div class="form-group col-md-3">
                <label for="">Surat Dari</label>
                <input type="text" class="form-control " value="<?= $posisi['dari'] ?>" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="">Diterima Tgl</label>
                <input type="text" class="form-control " value="<?= $posisi['tgl'] ?>" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="">No. Surat</label>
                <input type="text" class="form-control " value="<?= $posisi['no_surat'] ?>" readonly>
            </div>

            <div class="form-group col-md-3">
                <label for="">Tgl Surat</label>
                <input type="text" class="form-control " value="<?= $posisi['tglsurat'] ?>" readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="">No. Agenda</label>
                <input type="text" name="agenda" class="form-control ">
            </div>
            <div class="form-group col-md-6">
                <label for="">Sifat</label>
                <select class="form-control " name="sifat" required>
                    <option value="">Pilih Sifat</option>
                    <option value="Sangat Segera">Sangat Segera</option>
                    <option value="Segera">Segera</option>
                    <option value="Rahasia">Rahasia</option>
                </select>
            </div>
            <div class="form-group col-md-12">
                <label for="">Perihal</label>
                <textarea name="perihal" class="form-control " id=""></textarea>
            </div>
            <div class="form-group col-md-6">
                <label for="">Tujuan</label>
                <select class="form-control " name="disposisi">
                    <?php if ($this->session->userdata('level') == "admin") { ?>
                        <option value="">Pilih Tujuan Disposisi</option>
                        <?php foreach ($dis as $row) { ?>
                            <?php if ($row->jabatan == 'Kepala Sekolah') { ?>
                                <option value="<?= $row->nip_pegawai ?>"><?= $row->nip_pegawai ?>||<?= $row->nama_pegawai ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } else if ($this->session->userdata('level') == "atasan") { ?>
                        <option value="">Pilih Tujuan Disposisi</option>
                        <?php foreach ($dis as $row) { ?>
                            <?php if ($row->jabatan !== 'Kepala Sekolah') { ?>
                                <option value="<?= $row->nip_pegawai ?>"><?= $row->nip_pegawai ?>||<?= $row->nama_pegawai ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group col-md-6">

                <label for="">Dengan Hormat Harap</label>
                <select class="form-control " name="baca">
                    <?php if ($this->session->userdata('level') == "admin") { ?>
                        <option value="">Pilih</option>
                        <option value="Tanggapan dan Saran">Tanggapan dan Saran</option>
                        <option value="Proses Lebih Lanjut">Proses Lebih Lanjut</option>
                        <option value="Koordinasi/Konfirmasikan">Koordinasi/Konfirmasikan</option>
                    <?php } else if ($this->session->userdata('level') == "atasan") { ?>
                        <option value="">Pilih</option>
                        <option value="Untuk Diproses">Untuk Diproses</option>
                        <option value="Untuk Perhatian">Untuk Perhatian</option>
                        <option value="Bicarakan">Bicarakan</option>
                        <option value="Edarkan/Umumkan">Edarkan/Umumkan</option>
                        <option value="Gandakan/Fotocopy">Gandakan/Fotocopy</option>
                        <option value="Direspon/Tindak Lanjuti">Direspon/Tindak Lanjuti</option>
                        <option value="Teliti/Pelajari">Teliti/Pelajari</option>
                        <option value="Buatkan Surat Balasan">Buatkan Surat Balasan</option>
                        <option value="Agendakan">Agendakan</option>
                        <option value="Mewakili">Mewakili</option>
                        <option value="Surat Ucapan Selamat">Surat Ucapan Selamat</option>
                    <?php } ?>
                </select>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="reset">Reset</button>
                <button class="btn btn-success" type="submit">Kirim</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>