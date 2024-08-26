<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Manager.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="/system/assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="/system/assets/image/favicon_0.ico">
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
                  <li class="breadcrumb-item active">Inicio</li>
               </ol>
            </nav>
         </div>
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-4 mt-2">
         <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">stars</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Puntos</p>
                        <h4 class="mb-0">250</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">diversity_3</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Comunidades</p>
                        <h4 class="mb-0">20</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person_add</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Nuevas personas</p>
                        <h4 class="mb-0">15</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mb-4 mt-3">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
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
               <div class="card z-index-2  ">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                     <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                        <div class="chart">
                           <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <h6 class="mb-0 "><i class="material-icons">stars</i> Puntos</h6>
                     <p class="text-sm ">Puntos entregados por mes</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 mt-4 mb-3">
               <div class="card z-index-2 ">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                     <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                        <div class="chart">
                           <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                        </div>
                     </div>
                  </div>
                  <div class="card-body">
                     <h6 class="mb-0 "><i class="material-icons">paid</i> Beneficios</h6>
                     <p class="text-sm ">Beneficios que han sido obtenidos por mes</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
   <script>
      var ctx2 = document.getElementById("chart-line").getContext("2d");

      new Chart(ctx2, {
         type: "line",
         data: {
            labels: ["Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            datasets: [{
               label: "Mobile apps",
               tension: 0,
               borderWidth: 0,
               pointRadius: 5,
               pointBackgroundColor: "rgba(255, 255, 255, .8)",
               pointBorderColor: "transparent",
               borderColor: "rgba(255, 255, 255, .8)",
               borderColor: "rgba(255, 255, 255, .8)",
               borderWidth: 4,
               backgroundColor: "transparent",
               fill: true,
               data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
               maxBarThickness: 6

            }],
         },
         options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
               legend: {
                  display: false,
               }
            },
            interaction: {
               intersect: false,
               mode: 'index',
            },
            scales: {
               y: {
                  grid: {
                     drawBorder: false,
                     display: true,
                     drawOnChartArea: true,
                     drawTicks: false,
                     borderDash: [5, 5],
                     color: 'rgba(255, 255, 255, .2)'
                  },
                  ticks: {
                     display: true,
                     color: '#f8f9fa',
                     padding: 10,
                     font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                     },
                  }
               },
               x: {
                  grid: {
                     drawBorder: false,
                     display: false,
                     drawOnChartArea: false,
                     drawTicks: false,
                     borderDash: [5, 5]
                  },
                  ticks: {
                     display: true,
                     color: '#f8f9fa',
                     padding: 10,
                     font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                     },
                  }
               },
            },
         },
      });

      var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

      new Chart(ctx3, {
         type: "line",
         data: {
            labels: ["Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            datasets: [{
               label: "Mobile apps",
               tension: 0,
               borderWidth: 0,
               pointRadius: 5,
               pointBackgroundColor: "rgba(255, 255, 255, .8)",
               pointBorderColor: "transparent",
               borderColor: "rgba(255, 255, 255, .8)",
               borderWidth: 4,
               backgroundColor: "transparent",
               fill: true,
               data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
               maxBarThickness: 6

            }],
         },
         options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
               legend: {
                  display: false,
               }
            },
            interaction: {
               intersect: false,
               mode: 'index',
            },
            scales: {
               y: {
                  grid: {
                     drawBorder: false,
                     display: true,
                     drawOnChartArea: true,
                     drawTicks: false,
                     borderDash: [5, 5],
                     color: 'rgba(255, 255, 255, .2)'
                  },
                  ticks: {
                     display: true,
                     padding: 10,
                     color: '#f8f9fa',
                     font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                     },
                  }
               },
               x: {
                  grid: {
                     drawBorder: false,
                     display: false,
                     drawOnChartArea: false,
                     drawTicks: false,
                     borderDash: [5, 5]
                  },
                  ticks: {
                     display: true,
                     color: '#f8f9fa',
                     padding: 10,
                     font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                     },
                  }
               },
            },
         },
      });
   </script>
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