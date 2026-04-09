<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="bg-light">

  <div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

      <div class="col-12 col-sm-10 col-sm-8 col-md-5 col-md-4">

        <div class="card shadow-lg border-0 rounded-3">
          <div class="card-body p-4 p-md-5">

            <h3 class="text-center mb-4 fw-bold">Login</h3>

            <!-- ALERT -->
            <?php if (session()->getFlashdata('error')): ?>
              <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
              </div>
            <?php elseif (session()->getFlashdata('success')): ?>
              <div class="alert alert-success">
                <?= session()->getFlashdata('success'); ?>
              </div>
            <?php endif; ?>

            <form method="post" action="<?= base_url('/login/process') ?>">

              <div class="mb-3">
                <input type="text" name="login" class="form-control form-control-md"
                  placeholder="Email / Username" required>
              </div>

              <div class="mb-3 position-relative">
                <input type="password" name="password" id="password"
                  class="form-control form-control-md" placeholder="Password" required>

                <button type="button"
                  onclick="togglePassword('password', this)"
                  class="btn btn-sm btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2">
                  <i class="bi bi-eye"></i>
                </button>
              </div>

              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">
                  Remember Me
                </label>
              </div>

              <button class="btn btn-primary w-100 btn-md">
                Login
              </button>

            </form>

            <p class="text-center mt-4 mb-0">
              Belum punya akun?
              <a href="<?= base_url('/register') ?>">Register</a>
            </p>

          </div>
        </div>

      </div>

    </div>
  </div>

  <!-- LOADING -->
  <div id="loading" class="d-none position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
    <div class="bg-white p-4 rounded shadow text-center">
      <div class="spinner-border text-primary"></div>
      <p class="mt-2 mb-0">Loading...</p>
    </div>
  </div>

  <script>
    document.querySelector("form").addEventListener("submit", function() {
      document.getElementById("loading").classList.remove("d-none");
    });

    function togglePassword(id, btn) {
      const input = document.getElementById(id);

      if (input.type === "password") {
        input.type = "text";
      } else {
        input.type = "password";
      }
    }
  </script>

</body>

</html>