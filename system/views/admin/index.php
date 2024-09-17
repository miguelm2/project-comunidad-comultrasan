<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/image/favicon_0.ico">
  <title>Comunidad Comultrasan</title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="/system/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/system/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="/system/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <!-- Start Slider -->
  <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_admin.php'; ?>
  <!-- End Slider -->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg mt-2">
    <iframe src="<?= $url . '/index' ?>" frameborder="0" style="width: 100%; height: 100%;" class="vh-100"></iframe>
  </main>
  <div id="preloader">
    <img src="/assets/image/favicon_0.ico" alt="Cargando...">
  </div>
  <form method="POST">
    <div class="modal fade" id="basicModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Salir del sistema</h5>
            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Esta seguro que desea salir del sistema?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons opacity-10">close</i> Cerrar</button>
            <button type="submiT" name="logout" class="btn btn-danger"><i class="material-icons opacity-10">logout</i> Salir del sistema</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!--   Core JS Files   -->
  <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/system/assets/js/core/popper.min.js"></script>
  <script src="/system/assets/js/core/bootstrap.min.js"></script>
  <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="/system/assets/js/plugins/chartjs.min.js"></script>

  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>