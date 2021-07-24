<div class="container">
    <div class="row mt-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Detail Mahasiswa
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $mahasiswa['nama']; ?></h5>
                    <a href="<?= base_url(); ?>mahasiswa/ubah/<?= $mahasiswa['id']; ?>" class="badge badge-warning float-right">ubah</a>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $mahasiswa['email']; ?></h6>
                    <p class="card-text"><?= $mahasiswa['nim']; ?></p>
                    <p class="card-text"><?= $mahasiswa['jurusan']; ?></p>
                    <a href="<?= base_url() ?>mahasiswa" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>