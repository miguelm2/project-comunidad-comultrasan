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
      <div class="card mt-2" id="exploraYaprende">
         <?= $cardRest ?>
      </div>
      <div class="card mt-2" id="exploraYaprende">
         <div class="row m-0">
            <div class="col-md-8 ms-4 mt-4">
               <div class="card-head">
                  <h4 class="text-success">Explora y Aprende</h4>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="row justify-content-center align-content-center">
               <div class="col-md-3">
                  <a href="community">
                     <div class="card border-2 h-100">
                        <img src="/assets/img/comunidad/comunida_creada.png" alt="Comunidad"
                           class="img-fluid rounded-2">
                        <div class="card-body">
                           <h6 class="text-success text-center">Crea tu comunidad</h6>
                           <p class=" ms-2">
                              Crea tu comunidad y comparte tus retos y recompensas con tus personas más especiales
                           </p>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-3">
                  <a href="profile">
                     <div class="card border-2 h-100">
                        <img src="/assets/img/comunidad/completar_perfil.png" alt="Perfil" class="img-fluid rounded-2">
                        <div class="card-body">
                           <h6 class="text-success text-center">Completar tu perfil</h6>
                           <p class=" ms-2">
                              Completa tu perfil y empieza a acumular corazones.
                           </p>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-3">
                  <a href="/system/views/user/survey?survey=9">
                     <div class="card border-2 h-100">
                        <img src="/assets/img/comunidad/gustos.png" alt="Gustos" class="img-fluid rounded-2">
                        <div class="card-body">
                           <h6 class="text-success text-center">Cuéntanos tus gustos e intereses</h6>
                           <p class=" ms-2">
                              Permítenos conocerte mejor para diseñar experiencias para ti y tu comunidad.
                           </p>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-3">
                  <a href="/system/views/user/survey?survey=5">
                     <div class="card border-2 h-100">
                        <img src="/assets/img/comunidad/reto.png" alt="Reto" class="img-fluid rounded-2">
                        <div class="card-body">
                           <h6 class="text-success text-center">Reto Educación Financiera</h6>
                           <p class=" ms-2">
                              Fortalece tus conocimientos y gana más &#10084;
                           </p>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-3 mt-2">
                  <a href="/system/views/user/survey?survey=2">
                     <div class="card border-2 h-100">
                        <img src="/assets/img/comunidad/trivia.png" alt="Trivia" class="img-fluid rounded-2">
                        <div class="card-body">
                           <h6 class="text-success text-center">Trivia de economía solidaria</h6>
                           <p class=" ms-2">
                              Conoce el fascinante mundo solidario y sigue ganando recompensas.
                           </p>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-3 mt-2">
                  <a href="/system/views/user/survey?survey=3">
                     <div class="card border-2">
                        <img src="/assets/img/comunidad/recompensas.png" alt="Recompensas" class="img-fluid rounded-2">
                        <div class="card-body">
                           <h6 class="text-success text-center">Trivia de programa de recompensas</h6>
                           <p class=" ms-2">
                              Conoce el fascinante mundo solidario y sigue ganando recompensas.
                           </p>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-3 mt-2">
                  <a href="/system/views/user/survey?survey=10">
                     <div class="card border-2">
                        <img src="/assets/img/comunidad/programa_referidos.png" alt="Refereidos"
                           class="img-fluid rounded-2">
                        <div class="card-body">
                           <h6 class="text-success text-center">Trivia de programa de referidos</h6>
                           <p class=" ms-2">
                              Conoce el fascinante mundo solidario y sigue ganando recompensas.
                           </p>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <div class="card mt-3">
         <div class="row m-0">
            <div class="col-md-8 ms-4 mt-4">
               <div class="card-head">
                  <h4 class="text-success">Mis Beneficios</h4>
               </div>
            </div>
         </div>
         <div class="card-body p-3 pt-0">
            <div class="row">
               <?= $cardBenefitUser ?>
            </div>
         </div>
      </div>
      <div class="card mt-3">
         <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
               <a class="nav-link active" id="comunidad-tab" data-bs-toggle="tab" href="#comunidad" role="tab" aria-controls="comunidad" aria-selected="true">Mi comunidad</a>
            </li>
            <li class="nav-item" role="presentation">
               <a class="nav-link" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Personal</a>
            </li>
         </ul>

         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="comunidad" role="tabpanel" aria-labelledby="comunidad-tab">
               <div class="row m-0">
                  <div class="col-12 mt-4">
                     <div class="card-head">
                        <h4 class="text-success">Historial de Corazones</h4>
                     </div>
                  </div>
               </div>
               <div class="card-body p-3 pt-0">
                  <div class="table-responsive">
                     <table class="table table-bordered table-hover align-items-center mb-0">
                        <thead class="text-center">
                           <tr>
                              <th class="text-uppercase font-weight-bolder">Asignado Por</th>
                              <th class="text-uppercase font-weight-bolder">Corazones</th>
                              <th class="text-uppercase font-weight-bolder">Descripción</th>
                           </tr>
                        </thead>
                        <tfoot class="text-center">
                           <tr>
                              <th class="text-uppercase font-weight-bolder">Asignado Por</th>
                              <th class="text-uppercase font-weight-bolder">Corazones</th>
                              <th class="text-uppercase font-weight-bolder">Descripción</th>
                           </tr>
                        </tfoot>
                        <tbody class="text-center">
                           <?= $tablePointsByUserLider ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
               <div class="row m-0">
                  <div class="col-12 mt-4">
                     <div class="card-head">
                        <h4 class="text-success">Historial de Corazones</h4>
                     </div>
                  </div>
               </div>
               <div class="card-body p-3 pt-0">
                  <div class="table-responsive">
                     <table class="table table-bordered table-hover align-items-center mb-0">
                        <thead class="text-center">
                           <tr>
                              <th class="text-uppercase font-weight-bolder">Nombre </th>
                              <th class="text-uppercase font-weight-bolder">Corazones</th>
                              <th class="text-uppercase font-weight-bolder">Descripción</th>
                           </tr>
                        </thead>
                        <tfoot class="text-center">
                           <tr>
                              <th class="text-uppercase font-weight-bolder">Asignado Por</th>
                              <th class="text-uppercase font-weight-bolder">Corazones</th>
                              <th class="text-uppercase font-weight-bolder">Descripción</th>
                           </tr>
                        </tfoot>
                        <tbody class="text-center">
                           <?= $tablePointsByUser ?>
                        </tbody>
                     </table>
                  </div>
               </div>
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