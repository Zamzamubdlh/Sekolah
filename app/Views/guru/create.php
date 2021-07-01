<!-- Hal Create tidak di butuhkan tetapi suatu saat akan di butuhkan -->
<?= $this->extend('partials/main'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-10">
            <div class="card mt-3">
                <font face="Courier New">
                    <div class="card-header text-white bg-dark">
                        Tambah Data Guru
                    </div>
                </font>
                <form action="/guru/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <font face="Courier New">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <input type="hidden" name="old_foto">
                                    <label class="custom-file-label" for="foto">Pilih Gambar</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nip">Nip</label>
                                <input type="text" name="nip" class="form-control" id="nip" required>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <input type="text" name="pendidikan" class="form-control" id="pendidikan" required>
                            </div>
                            <div class="form-group">
                                <label for="nip">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="guru pertama">Guru Pertama</option>
                                    <option value="guru muda">Guru Muda</option>
                                    <option value="guru madya">Guru Madya</option>
                                    <option value="guru utama">Guru Utama</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="20" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-block">Simpan</button>
                            </div>
                    </font>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>