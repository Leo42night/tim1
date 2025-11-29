<?php require __DIR__ . '/../Layout/Header.php'; ?>

<div class="row justify-content-center mt-4">
    <div class="col-md-6">
        
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="m-0">Edit Kegiatan</h5>
            </div>

            <div class="card-body">
                <form action="/kegiatan/update" method="POST">

                    <input type="hidden" name="id" value="<?= $kegiatan['id']; ?>">

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Kegiatan</label>
                        <input type="text" 
                               name="nama_kegiatan" 
                               class="form-control"
                               required
                               value="<?= htmlspecialchars($kegiatan['nama_kegiatan']); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tanggal Kegiatan</label>
                        <input type="date" 
                               name="tanggal_kegiatan"
                               class="form-control"
                               required
                               value="<?= $kegiatan['tanggal_kegiatan']; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Lokasi</label>
                        <input type="text" 
                               name="lokasi"
                               class="form-control"
                               value="<?= htmlspecialchars($kegiatan['lokasi']); ?>">
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="/kegiatan" class="btn btn-secondary">
                            Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>
