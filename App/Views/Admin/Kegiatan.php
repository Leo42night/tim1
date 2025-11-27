<?php require __DIR__ . '/../Layout/Header.php'; ?>
<h4>Manajemen Kegiatan</h4>

<div class="row">
  <!-- FORM INPUT -->
  <div class="col-md-6">
    <div class="card p-3 mb-3">
      <form method="post" action="index.php?url=kegiatan/simpan">
        <div class="mb-2">
          <label>Nama Kegiatan</label>
          <input name="nama_kegiatan" class="form-control" required>
        </div>
        <div class="mb-2">
          <label>Tanggal Kegiatan</label>
          <input type="date" name="tanggal_kegiatan" class="form-control" required>
        </div>
        <div class="mb-2">
          <label>Lokasi (opsional)</label>
          <input name="lokasi" class="form-control">
        </div>
        <button class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>

  <!-- TABEL DATA -->
  <div class="col-md-6">
    <table class="table table-bordered">
      <thead><tr><th>#</th><th>Nama</th><th>Tanggal Kegiatan</th><th>Aksi</th></tr></thead>
      <tbody>
        <?php if(empty($kegiatan)): ?>
            <tr><td colspan="4" class="text-center">Belum ada data.</td></tr>
        <?php else: ?>
            <?php foreach($kegiatan as $i => $k): ?>
              <tr>
                <td><?= $i+1 ?></td>
                <td><?= htmlspecialchars($k['nama_kegiatan']) ?></td>
                <td><?= date('d-m-Y', strtotime($k['tanggal_kegiatan'])) ?></td>
                <td>
                  <a class="btn btn-sm btn-danger" 
                     href="index.php?url=kegiatan/hapus/<?= $k['id'] ?>" 
                     onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach;?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>