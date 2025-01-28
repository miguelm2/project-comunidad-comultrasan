<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/User.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="/assets/image/favicon_0.ico">
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
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

<body class="g-sidenav-show bg-gray-200 align-content-center d-flex justify-content-center">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_user.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg container">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_user.php'; ?>
         <!-- End header -->
      </nav>
      <div class="card mt-2">
         <div class="row m-0">
            <div class="col-md-5 mt-4">
               <h4 class="text-success ms-3">Aceptar Comunidad</h4>
            </div>
            <div class="col-md-6 mt-4 d-flex justify-content-md-end my-auto">
               <p class="ms-3"><strong>Fecha solicitud:</strong> <?= $usuarioComunidadDTO->getFecha_registro() ?></p>
            </div>
            <div class="card-body">
               <form method="post">
                  <div class="row">
                     <div class="col-md-6 mb-3">
                        <div class="card p-4 h-100">
                           <h5>Detalles del Usuario Solicitante</h5>
                           <p><strong>Nombre:</strong> <?= $usuarioComunidadDTO->getUsuarioDTO()->getNombre() ?></p>
                           <p><strong>Email:</strong> <?= $usuarioComunidadDTO->getUsuarioDTO()->getCorreo() ?></p>
                        </div>
                     </div>
                     <div class="col-md-6 mb-3">
                        <div class="card p-4 h-100">
                           <h5>Detalles de la Comunidad Solicitada</h5>
                           <p><strong>Nombre de la Comunidad:</strong> <?= $usuarioComunidadDTO->getComunidadDTO()->getNombre() ?></p>
                           <p><strong>Nombre del Líder:</strong> <?= $usuarioComunidadDTO->getComunidadDTO()->getUsuarioDTO()->getNombre() ?></p>
                           <p hidden><strong>Fecha de Creación:</strong> <?= $usuarioComunidadDTO->getComunidadDTO()->getFecha_registro() ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-success" name="acceptCommunity">
                           <i class="material-icons me-2">check</i>Aceptar
                        </button>
                     </div>
                     <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-danger" name="declineCommunity">
                           <i class="material-icons me-2">close</i>Rechazar
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Start Footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/footer.php'; ?>
      <!-- End Footer -->
   </main>
   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>
   <!--   Core JS Files   -->
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control ../Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <?= $response ?>
</body>

</html>