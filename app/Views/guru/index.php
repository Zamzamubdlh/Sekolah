<?= $this->extend('partials/main'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-10 mt-2">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header text-white bg-dark">
                    <font face="Courier New">Data Guru</font>
                    <!-- Button trigger modal -->
                    <font face="Courier New">
                        <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#exampleModal">
                            Tambah Data
                        </button>
                        <!-- Modal -->
                    </font>
                </div>
                <font face="Courier New">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="example1">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Pendidikan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($guru as $g) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $g['nama']; ?></td>
                                            <td><img src="/img/<?= $g['foto']; ?>" alt="" class="foto" width="70px"></td>
                                            <td><?= $g['pendidikan']; ?></td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <!-- Buutton Tambah&edit-->
                                                <button type="submit" class="btn btn-outline-warning edit" id="edit" data-id="<?= $g['id'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <!-- Buutton Detail-->
                                                <button type="button" class="btn btn-outline-success detail" data-toggle="modal" data-target="#modalEdit" data-id=<?= $g['id'] ?>>
                                                    <i class="fa fa-list"></i>
                                                </button>
                                                <!-- Buutton Delete-->
                                                <form action="/guru/<?= $g['id']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-trash"></i></button>
                                                </form>
                                                <!-- Modal -->
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </font>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<font face="Courier New">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Guru</h5>
                    <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/guru/save" id="formGuru" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <div id="old_foto"></div>
                            <div id="file_name"></div>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Change</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->

    <!-- Modal Data Edit -->


    <!-- Akhir Modal -->

    <!-- Modal Detail -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditLabel">Detail Data Guru</h5>
                    <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4 fotoDetail">

                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div id="detail_body">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</font>
<!-- Akhir Modal -->
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $('.edit').click(function() {
        $('#exampleModalLabel').html('Form Edit Data Guru');
        var id = $(this).data('id');
        // alert(id);
        $.ajax({
            url: 'guru/edit' + '/' + id,
            method: 'get',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $.each(data, function(key, value) {
                    // alert(key);
                    $('#formGuru').attr('action', '/guru/update/' + id);
                    $('#id').val(value.id);
                    $('#nama').val(value.nama);
                    var foto = value.foto;
                    // alert(foto);
                    $('#nip').val(value.nip);
                    var old_foto = "<h6>Gambar Sebelumnya : <img src='/img/" + foto + "' width='100px;' class='margin: 10px;' alt=''> </h6>";
                    var file_name = "<h6>Nama File : <strong>" + foto + "</strong></h6>";
                    $('#file_name').html(file_name);
                    $('#old_foto').html(old_foto);
                    $('#pendidikan').val(value.pendidikan);
                    $('#jabatan').val(value.jabatan);
                    $('#alamat').val(value.alamat);
                    $('#exampleModal').modal('show');
                });
            }
        });

    })
    $('.detail').click(function() {
        var id = $(this).data('id');
        // alert(id);
        $.ajax({
            url: 'guru/edit' + '/' + id,
            method: 'get',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                $.each(data, function(key, value) {
                    // alert(key);
                    var detail_card = "<h5 class='card-title'><b>" + value.nama + "</b></h5>";
                    detail_card += "<p class='card-text'><b>Nip : </b> " + value.nip + "</p>";
                    detail_card += "<p class='card-text'><b>pendidikan : </b> " + value.pendidikan + "</p>";
                    detail_card += "<p class='card-text'><b>alamat : </b> " + value.alamat + "</p>";
                    detail_card += "<p class='card-text'><small class='text-muted'><b>Jabatan : </b>" + value.jabatan + "</small></p>";
                    detail_card += "<p class='card-text'><b>Nip : </b> " + value.nip + "</p>";
                    var foto = "<img src='/img/" + value.foto + "' class='card-img' alt='...'>";
                    $('#detail_body').html(detail_card);
                    $('.fotoDetail').html(foto);
                    $('#modalEdit').modal('show');

                });
            }
        });

    })
</script>
<?= $this->endSection(); ?>