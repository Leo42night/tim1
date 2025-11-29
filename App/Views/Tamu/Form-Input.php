<?php require __DIR__ . '/../Layout/Header.php'; ?>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="card-title mb-3">Form Buku Tamu</h4>
        
        <form method="POST" action="http://localhost/SIBUTAD/Public/index.php?url=tamu/simpan">
          
          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input name="nama" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Tanggal Kunjungan</label>
            <input type="date" name="tanggal_kunjungan" class="form-control" value="<?= date('Y-m-d') ?>" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email (opsional)</label>

            <input type="email" name="email" class="form-control">
          </div>

          <div class="mb-3">
            <label class="form-label">Kegiatan</label>
            <!-- PENTING: Atribut 'required' ditambahkan di sini -->
            <!-- Ini mencegah browser mengirim form jika user belum memilih kegiatan -->
            <select name="id" class="form-select" required>
              <option value="">— Pilih Kegiatan —</option>
                <?php foreach ($kegiatan as $k): ?>
                  <option value="<?= $k['id'] ?>">
                    <?= htmlspecialchars($k['nama_kegiatan']) ?>
                  </option>
                <?php endforeach; ?>
            </select>

            <div class="form-text text-muted">Wajib memilih salah satu kegiatan.</div>
          </div>

          <button class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>