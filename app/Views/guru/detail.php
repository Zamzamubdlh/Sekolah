<!-- Hal Detail tidak di butuhkan tetapi suatu saat akan di butuhkan -->
<?= $this->extend('partials/main'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <font face="Courier New">
                <div class="card-header mt-2 text-white bg-dark">
                    Detail Data Guru
                </div>
            </font>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $guru['foto']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <font face="Courier New">
                                <h5 class="card-title"><b><?= $guru['nama']; ?></b></h5>
                                <p class="card-text"><b>Nip : </b> <?= $guru['nip']; ?></p>
                                <p class="card-text"><b>Pendidikan : </b> <?= $guru['pendidikan']; ?></p>
                                <p class="card-text"><b>Aamat : </b> <?= $guru['alamat']; ?></p>
                                <p class="card-text"><small class="text-muted"><b>Jabatan : </b><?= $guru['jabatan']; ?></small></p>

                                <a href="/guru/edit/<?= $guru['id']; ?>" class="btn btn-outline-warning"><i class="fa fa-pen"></i></a>|
                                <form action="/guru/<?= $guru['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-trash"></i></button>
                                </form>
                                <a href="/guru" class="btn btn-outline-secondary">Kembali</a>
                            </font>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>