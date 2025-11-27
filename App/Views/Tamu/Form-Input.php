<?php require __DIR__ . '/../Layout/Header'; ?>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="card-title mb-3">Form Buku Tamu</h4>
        <form method="Post" action="/tamu/simpan">
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
            <label class="form-label">Kegiatan (opsional)</label>
            <select name="idkegiatan" class="form-select">
              <option value="">— Pilih Kegiatan —</option>
              <?php
                // Jika ingin menampilkan daftar kegiatan, bisa fetch di controller lalu pass ke view
                // Contoh placeholder statis
              ?>
            </select>
          </div>
          <button class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require __DIR__ . '/../Layout/Footer'; ?>
