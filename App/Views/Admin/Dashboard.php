<?php require __DIR__ . '/../Layout/Header'; ?>
<div class="row">
  <div class="col-md-4">
    <div class="card mb-3">
      <div class="card-body">
        <h6>Total Tamu</h6>
        <h3><?= $stat['total_tamu'] ?? 0 ?></h3>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card mb-3">
      <div class="card-body">
        <h6>Total Kegiatan</h6>
        <h3><?= $stat['total_kegiatan'] ?? 0 ?></h3>
      </div>
    </div>
  </div>
</div>

<div class="mt-3">
  <a class="btn btn-outline-primary" href="/kegiatan">Kelola Kegiatan</a>
  <a class="btn btn-outline-secondary" href="/tamu/daftar">Daftar Tamu</a>
  <a class="btn btn-outline-success" href="/laporan/rekap">Laporan Rekap</a>
</div>
<?php require __DIR__ . '/../Layout/Footer'; ?>
