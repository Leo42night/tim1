<?php require __DIR__ . '/../Layout/Header.php'; ?>
<h4>Daftar Tamu</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Tanggal</th>
      <th>Email</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach ($tamu as $i => $column): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= htmlspecialchars($column['nama']) ?></td>
        <td><?= htmlspecialchars($column['tanggal_kunjungan']) ?></td>
        <td><?= htmlspecialchars($column['email']) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php require __DIR__ . '/../Layout/Footer.php'; ?>
