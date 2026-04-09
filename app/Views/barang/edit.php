<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <nav class="navbar navbar-dark bg-primary px-3">
    <span class="navbar-brand mb-0 h1">Sistem Gudang</span>
    <a href="<?= base_url('logout') ?>" class="btn btn-light btn-sm">Logout</a>
  </nav>

  <div class="container-fluid">
    <div class="row">


      <div class="col-md-3 col-lg-2 bg-white border-end min-vh-100 p-3">
        <h5 class="mb-3">Menu</h5>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('barang') ?>">Dashboard</a>
          </li>

        </ul>
      </div>

      <div class="col-md-9 col-lg-10 p-4">
        <div class="card shadow-sm">
          <div class="card-body">

            <h3>Edit Barang</h3>

            <form method="post" action="<?= base_url('barang/update/') ?><?= $barang['id'] ?>">

              <div class="mb-3">
                <input type="text" name="nama_barang" class="form-control"
                  value="<?= $barang['nama_barang'] ?>">
              </div>

              <div class="mb-3">
                <input type="number" name="harga" class="form-control"
                  value="<?= $barang['harga'] ?>">
              </div>

              <div class="mb-3">
                <input type="number" name="stok" class="form-control"
                  value="<?= $barang['stok'] ?>">
              </div>

              <button class="btn btn-primary">Update</button>
              <a href="/barang" class="btn btn-secondary">Kembali</a>

            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

</body>

</html>