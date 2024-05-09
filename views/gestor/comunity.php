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
                  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Comunidad</li>
               </ol>
            </nav>
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <div class="card">
         <div class="row">
            <div class="col-8 m-4">
               <div class="card-head">
                  <h3>Comunidades</h3>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table align-items-center mb-0">
                  <thead class="text-center">
                     <tr>
                        <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Comunidad</th>
                        <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">
                           Grupos</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Puntos</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Beneficios</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Opciones</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Comunidad</th>
                        <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">
                           Grupos</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Puntos</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Beneficios</th>
                        <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">
                           Opciones</th>
                     </tr>
                  </tfoot>
                  <tbody class="text-center">
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
                           <span class="text-xs font-weight-bold">2</span>
                        </td>
                        <td>
                           <a class="btn btn-link text-info px-3 mb-0" href="seeComunity">
                              <i class="material-icons text-sm me-2">visibility</i>Ver
                           </a>
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
                           <span class="text-xs font-weight-bold"> 10 </span>
                        </td>
                        <td class="align-middle text-center">
                           <span class="text-xs font-weight-bold">2</span>
                        </td>
                        <td>
                           <a class="btn btn-link text-info px-3 mb-0" href="seeComunity">
                              <i class="material-icons text-sm me-2">visibility</i>Ver
                           </a>
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
                        <td class="align-middle text-center">
                           <span class="text-xs font-weight-bold"> 10 </span>
                        </td>
                        <td class="align-middle text-center">
                           <span class="text-xs font-weight-bold">2</span>
                        </td>
                        <td>
                           <a class="btn btn-link text-info px-3 mb-0" href="seeComunity">
                              <i class="material-icons text-sm me-2">visibility</i>Ver
                           </a>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </main>
   <!--   Core JS Files   -->
   <script src="../assets/js/core/popper.min.js"></script>
   <script src="../assets/js/core/bootstrap.min.js"></script>
   <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="../assets/js/plugins/chartjs.min.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>