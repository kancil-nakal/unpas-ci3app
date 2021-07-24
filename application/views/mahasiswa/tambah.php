<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" class="form-control" id="nim">
                            <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" name="jurusan" id="jurusan">
                                <option value="" selected>Pilih jurusan...</option>
                                <?php foreach ($jurusan as $j) : ?>
                                    <option value="<?= $j['nama']; ?>"><?= $j['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('jurusan'); ?></small>
                        </div>
                        <button class="btn btn-success float-right mt-3" type="submit" name="tambah">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>