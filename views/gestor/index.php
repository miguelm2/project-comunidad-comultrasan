<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="../../assets/image/favicon_0.ico">
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   <!-- Nucleo Icons -->
   <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
   <!-- CSS Files -->
   <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
   <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/slider_gestor.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Inicio</li>
               </ol>
               <h6 class="font-weight-bolder mb-0">Inicio</h6>
            </nav>
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
         <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">star</i>
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
                     <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">people</i>
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
                        <i class="material-icons opacity-10">person</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Nuevas personas</p>
                        <h4 class="mb-0">15</h4>
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
                     <h6 class="mb-0 ">Puntos</h6>
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
                     <h6 class="mb-0 ">Beneficios</h6>
                     <p class="text-sm ">Beneficios que han sido obtenidos por mes</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mb-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
               <div class="card">
                  <div class="card-header pb-0">
                     <div class="row">
                        <div class="col-lg-6 col-7">
                           <h6>Comunidades</h6>
                           <p class="text-sm mb-0">
                              <i class="fa fa-check text-info" aria-hidden="true"></i>
                              <span class="font-weight-bold ms-1">30 comunidades</span> este mes
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="card-body px-0 pb-2">
                     <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                           <thead>
                              <tr>
                                 <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Comunidad</th>
                                 <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">
                                    Miebros</th>
                                 <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Puntos</th>
                                 <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Beneficios</th>
                              </tr>
                           </thead>
                           <tfoot>
                              <tr>
                                 <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Comunidad</th>
                                 <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">
                                    Miebros</th>
                                 <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Puntos</th>
                                 <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                                    Beneficios</th>
                              </tr>
                           </tfoot>
                           <tbody>
                              <tr>
                                 <td>
                                    <div class="d-flex px-2 py-1">
                                       <div>
                                          <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd">
                                       </div>
                                       <div class="d-flex flex-column justify-content-center">
                                          <h6 class="mb-0 text-sm">Comunidad 1</h6>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="avatar-group mt-2">
                                       <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                          <img src="../assets/img/team-1.jpg" alt="team1">
                                       </a>
                                       <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                          <img src="../assets/img/team-2.jpg" alt="team2">
                                       </a>
                                       <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                                          <img src="../assets/img/team-3.jpg" alt="team3">
                                       </a>
                                       <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                          <img src="../assets/img/team-4.jpg" alt="team4">
                                       </a>
                                    </div>
                                 </td>
                                 <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold"> 10 </span>
                                 </td>
                                 <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold"> 10 </span>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="d-flex px-2 py-1">
                                       <div>
                                          <img src="../assets/img/small-logos/logo-atlassian.svg" class="avatar avatar-sm me-3" alt="atlassian">
                                       </div>
                                       <div class="d-flex flex-column justify-content-center">
                                          <h6 class="mb-0 text-sm">Comunidad 2</h6>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="avatar-group mt-2">
                                       <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                          <img src="../assets/img/team-2.jpg" alt="team5">
                                       </a>
                                       <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                          <img src="../assets/img/team-4.jpg" alt="team6">
                                       </a>
                                    </div>
                                 </td>
                                 <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold"> 16 </span>
                                 </td>
                                 <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold"> 10 </span>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="d-flex px-2 py-1">
                                       <div>
                                          <img src="../assets/img/small-logos/logo-slack.svg" class="avatar avatar-sm me-3" alt="team7">
                                       </div>
                                       <div class="d-flex flex-column justify-content-center">
                                          <h6 class="mb-0 text-sm">Comunidad 3</h6>
                                       </div>
                                    </div>
                                 </td>
                                 <td>
                                    <div class="avatar-group mt-2">
                                       <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                          <img src="../assets/img/team-3.jpg" alt="team8">
                                       </a>
                                       <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                          <img src="../assets/img/team-1.jpg" alt="team9">
                                       </a>
                                    </div>
                                 </td>
                                 <td class="align-middle text-center ">
                                    <span class="text-xs font-weight-bold">20</span>
                                 </td>
                                 <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold"> 10 </span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Start footer -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/footer_admin.php'; ?>
            <!-- End fooeter -->
         </div>
   </main>
   <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
         <i class="material-icons py-2">settings</i>
      </a>
      <div class="card shadow-lg">
         <div class="card-header pb-0 pt-3">
            <div class="float-start">
               <h5 class="mt-3 mb-0">Material UI Configurator</h5>
               <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
               <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                  <i class="material-icons">clear</i>
               </button>
            </div>
            <!-- End Toggle Button -->
         </div>
         <hr class="horizontal dark my-1">
         <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
               <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
               <div class="badge-colors my-2 text-start">
                  <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                  <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
               </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
               <h6 class="mb-0">Sidenav Type</h6>
               <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
               <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
               <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
               <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3 d-flex">
               <h6 class="mb-0">Navbar Fixed</h6>
               <div class="form-check form-switch ps-0 ms-auto my-auto">
                  <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
               </div>
            </div>
            <hr class="horizontal dark my-3">
            <div class="mt-2 d-flex">
               <h6 class="mb-0">Light / Dark</h6>
               <div class="form-check form-switch ps-0 ms-auto my-auto">
                  <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--   Core JS Files   -->
   <script src="../assets/js/core/popper.min.js"></script>
   <script src="../assets/js/core/bootstrap.min.js"></script>
   <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="../assets/js/plugins/chartjs.min.js"></script>
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
   <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>