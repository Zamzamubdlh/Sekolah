<!-- Hal Edit tidak di butuhkan tetapi suatu saat akan di butuhkan -->
<?= $this->extend('partials/main'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-10">
            <div class="card mt-2">
                <font face="Courier New">
                    <div class="card-header text-white bg-dark">
                        Form Ubah Data Guru
                    </div>
                </font>
                <form action="/guru/update/<?= $guru['id']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <font face="Courier New">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $guru['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nip">Foto</label>
                                <h6>Gambar Sebelumnya : <img src="/img/<?= $guru['foto']; ?>" width="100px" class="margin: 10px; " alt="" class="img-thumbnail img-preview" value="<?= $guru['nama']; ?>">
                                </h6>
                                <input type="hidden" name="old_foto" value="<?= $guru['foto']; ?>">
                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                    <label class="custom-file-label" for="foto"><?= $guru['foto']; ?></label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nip">Nip</label>
                                <input type="text" name="nip" class="form-control" id="nip" value="<?= $guru['nip']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="pendidikan">Pendidikan</label>
                                <input type="text" name="pendidikan" class="form-control" id="pendidikan" value="<?= $guru['pendidikan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= $guru['jabatan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" cols="20" rows="5" class="form-control" id="alamat"><?= $guru['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-block">Ubah Data</button>
                            </div>
                    </font>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>