<?php require __DIR__ . '/../Layout/Header'; ?>
<h4>Daftar Tamu</h4>
<table class="table table-striped">
  <thead>
    <tr>
      <th>#</th><th>Nama</th><th>Tanggal</th><th>Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($tamu as $i => $row): ?>
      <tr>
        <td><?= $i+1 ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['tanggal_kunjungan']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require __DIR__ . '/../Layout/Footer'; ?>
