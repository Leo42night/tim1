<?php require __DIR__ . '/../Layout/Header'; ?>
<h4>Manajemen Kegiatan</h4>

<div class="row">
  <div class="col-md-6">
    <div class="card p-3 mb-3">
      <form method="post" action="/kegiatan/simpan">
        <div class="mb-2">
          <label>Nama Kegiatan</label>
          <input name="namakegiatan" class="form-control" required>
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

  <div class="col-md-6">
    <table class="table table-bordered">
      <thead><tr><th>#</th><th>Nama</th><th>Tanggal</th><th>Aksi</th></tr></thead>
      <tbody>
        <?php foreach($kegiatan as $i => $k): ?>
          <tr>
            <td><?= $i+1 ?></td>
            <td><?= htmlspecialchars($k['judul'] ?? $k['namakegiatan'] ?? '') ?></td>
            <td><?= htmlspecialchars($k['tanggal'] ?? $k['tanggal_kegiatan'] ?? '') ?></td>
            <td>
              <a class="btn btn-sm btn-danger" href="/kegiatan/hapus/<?= $k['idkegiatan'] ?? $k['id'] ?? '' ?>" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>

<?php require __DIR__ . '/../Layout/Footer'; ?>
