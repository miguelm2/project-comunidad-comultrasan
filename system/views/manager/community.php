<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Manager.php'; ?>
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
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_gestor.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <div class="container-fluid">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item"><a href="index" class="text-white">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="communities" class="text-white">Comunidad</a></li>
                  <li class="breadcrumb-item active">Ver Comunidad</li>
               </ol>
            </nav>
         </div>
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header --></div>
      </nav>
      <div class="card mt-3">
         <div class="row m-0">
            <div class="col-md-5 mt-4 ms-4">
               <h4 class="text-success">Ver Comunidad</h4>
            </div>
            <div class="col-md-12 mt-2 pb-4 ms-4">
               <div class="row">
               <div class="col-md-2">
                     <div class="form-group">
                        <h6>Código</h6>
                        <p><?= $comunidad->getId_comunidad() ?></p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <h6>Nombre</h6>
                        <p><?= $comunidad->getNombre() ?></p>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <h6>Creado</h6>
                        <p><?= $comunidad->getFecha_registro() ?></p>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <h6>Estado</h6>
                        <p><?= $comunidad->getEstado()[1] ?></p>
                     </div>
                  </div>
                  
                  
                  <div class="col-md-6">
                     <div class="form-group">
                        <h6>Líder</h6>
                        <p><?= $comunidad->getUsuarioDTO()->getNombre() ?></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card mt-3">
         <div class="card-head">
            <div class="mt-3 ms-3">
               <div class="row">
                  <div class="col-md-9">
                     <h4 class="text-success">
                        Integrantes
                     </h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-hover table-bordered table-striped">
                  <thead class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">ID</th>
                        <th class="text-uppercase font-weight-bolder">Asociado</th>
                        <th class="text-uppercase font-weight-bolder">Comunidad</th>
                        <th class="text-uppercase font-weight-bolder">Fecha Registro</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">ID</th>
                        <th class="text-uppercase font-weight-bolder">Asociado</th>
                        <th class="text-uppercase font-weight-bolder">Comunidad</th>
                        <th class="text-uppercase font-weight-bolder">Fecha Registro</th>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?= $usuarioComunidad ?>
                  </tbody>
               </table>
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
   <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="/system/js/modalEliminar.js"></script>
   <script src="/system/js/selectRepeat.js"></script>
   <?= $response ?>
</body>

</html>