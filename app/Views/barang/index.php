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
            <a class="nav-link active" href="<?= base_url('barang') ?>">Data Barang</a>
          </li>

        </ul>
      </div>

      <div class="col-md-9 col-lg-10 p-4">


        <div class="card shadow-sm">
          <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
              <h5>Data Barang</h5>
              <a href="<?= base_url('barang/create') ?>" class="btn btn-primary btn-sm">Tambah data</a>
            </div>

            <div class="table-responsive">
              <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                  <?= session()->getFlashdata('success') ?>
                </div>
              <?php endif; ?>



              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  <?php $no = 1;
                  foreach ($barang as $b): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $b['nama_barang'] ?></td>
                      <td>Rp <?= number_format($b['harga']) ?></td>
                      <td><?= $b['stok'] ?></td>
                      <td>
                        <a href="<?= base_url('/barang/edit/') ?><?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('/barang/delete/') ?><?= $b['id'] ?>"
                          class="btn btn-danger btn-sm"
                          onclick="return confirm('Hapus data?')">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>

              </table>
            </div>

          </div>
        </div>

      </div>

    </div>
  </div>

</body>

</html>