<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/User.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Aplicacion Web - Kondory Tecnologia</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">
  <link href="../../assets/css/styleCard.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <?php include '../../assets/html/header.php'; ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include '../../assets/html/sidebar-user.php'; ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

      <div class="row">

        <!-- Inicio cards -->
        <div class="col-md-4">
          <div class="card l-bg-cyan">
            <div class="card-statistic-3 p-4">
              <div class="card-icon card-icon-large"><i class="bi bi-mailbox" style="font-size: 3em;"></i></div>
              <div class="mb-4">
                <h4 class="modal-title mb-0">Mensajes</h>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <h2 class="d-flex align-items-center mb-0">
                  <?= $listCountsUser[0]; ?>
                </h2>
              </div>
              <div class="progress mt-1 " data-height="25" style="height: 8px;">
                <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card l-bg-gris-dark">
            <div class="card-statistic-3 p-4">
              <div class="card-icon card-icon-large"><i class="bi bi-journals" style="font-size: 3em;"></i></div>
              <div class="mb-4">
                <h4 class="modal-title mb-0">Blogs</h>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <h2 class="d-flex align-items-center mb-0">
                  <?= $listCountsUser[1]; ?>
                </h2>
              </div>
              <div class="progress mt-1 " data-height="25" style="height: 8px;">
                <div class="progress-bar l-bg-green" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card l-bg-morado-dark">
            <div class="card-statistic-3 p-4">
              <div class="card-icon card-icon-large"><i class="bi bi-person" style="font-size: 3em;"></i></div>
              <div class="mb-4">
                <h4 class="modal-title mb-0">Clientes</h>
              </div>
              <div class="row align-items-center mb-2 d-flex">
                <h2 class="d-flex align-items-center mb-0">
                  <?= $listCountsUser[2]; ?>
                </h2>
              </div>
              <div class="progress mt-1 " data-height="25" style="height: 8px;">
                <div class="progress-bar l-bg-mora" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin cards -->

      </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once '../../assets/html/footer.html'; ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>
    <script src="../../assets/vendor/swal/sweetalert.min.js"></script>
  <?= $response ?>
</body>

</html>