<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title><?= $title ?? 'Buku Tamu' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Buku Tamu</a>
    
    <?php if(isset($_SESSION['admin'])): ?>
      <div class="ms-auto">

        <a class="btn btn-outline-light btn-sm" href="index.php?url=admin/dashboard">Dashboard</a>
        
  
        <a class="btn btn-light btn-sm" href="index.php?url=admin/logout">Logout</a>
      </div>
    <?php endif;?>
  </div>
</nav>
<div class="container my-4">