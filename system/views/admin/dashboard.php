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
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
         <div class="row">
            <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">groups</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Usuarios</p>
                        <h4 class="mb-0"><?= $listCountsAdmin[2] ?></h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">groups</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Administrador</p>
                        <h4 class="mb-0"><?= $listCountsAdmin[1] ?></h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-4 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Gestores</p>
                        <h4 class="mb-0"><?= $listCountsAdmin[0] ?></h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mb-4 mt-3">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
               <div class="card">
                  <div class="card-header pb-0">
                     <div class="row">
                        <div class="col-lg-6 col-7">
                           <h5 class="text-success">Comunidades</h5>
                        </div>
                     </div>
                  </div>
                  <div class="card-body px-0 pb-2">
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
                              <?= $tableCommunitiesIndex ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-4">
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
               <div class="card z-index-2 ">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                     <div class="bg-gradient-info shadow-primary border-radius-lg py-3 pe-1">
                        <div class="chart">
                           <canvas id="chart-bars" class="chart-canvas" height="220"></canvas>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <h6 class="mb-0"><i class="material-icons">visibility</i> Visitas</h6>
                     <p class="text-sm">Visitas a la Web</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
               <div class="card z-index-2  ">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                     <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                        <div class="chart">
                           <canvas id="chart-line" class="chart-canvas" height="220"></canvas>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <h6 class="mb-0 "><i class="material-icons">favorite</i> Corazones</h6>
                     <p class="text-sm ">Corazones entregados por mes</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
               <div class="card z-index-2  ">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                     <div class="bg-gradient-primary shadow-success border-radius-lg py-3 pe-1">
                        <div class="chart">
                           <canvas id="chart-user" class="chart-canvas" height="220"></canvas>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <h6 class="mb-0 "><i class="material-icons">person</i> Miembros</h6>
                     <p class="text-sm ">Miembros nuevos por mes</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
               <div class="card z-index-2">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                     <div class="bg-gradient-warning shadow-success border-radius-lg py-3 pe-1">
                        <div class="chart text-center align-content-center justify-content-center" style="height: 220px !important;">
                           <canvas id="chart_community" class="chart-canvas text-center" style="height: 220px !important;"></canvas>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <h6 class="mb-0 "><i class="material-icons">person</i> Puntos por comunidad</h6>
                     <p class="text-sm ">Puntos totales de la comunidad en este mes</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Start Footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/footer.php'; ?>
      <!-- End Footer -->
      <div id="preloader">
         <img src="/assets/image/favicon_0.ico" alt="Cargando...">
      </div>
   </main>

   <!--   Core JS Files   -->
   <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
   <script src="/system/js/graphics/dashboard.js"></script>
   <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
         var options = {
            damping: '0.5'
         }
         Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
   </script>

   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>