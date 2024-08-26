<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/User.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="/system/assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="/assets/image/favicon_0.ico">
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_user.php'; ?>
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
      <div class="container-fluid pe-4">
         <section class="services sections-bg bg-light mt-2">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
               <div class="text-white">
                  <small>
                     ¡Hola, <strong><?= $_SESSION['nombre'] ?></strong>!,
                     ¡Que bueno tenerte de vuelta! <strong>¿Qué quieres hacer hoy?</strong>
                  </small>
               </div>
               <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         </section>
      </div>
      <!-- ======= Our Services Section ======= -->
      <section class="sections-bg bg-light">
         <div class="container-fluid mt-2 p-2">
            <div class="section-header pb-0">
               <h3 class="text-pri">Novedades de nuestra comunidad</h3>
            </div>
            <div id="novedadesCarousel" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-md-4 mt-2">
                           <div class="card">
                              <img src="/assets/image/imagen1.jpg" class="card-img-top img-fluid" alt="Celebración día de la familia">
                              <div class="card-body">
                                 <h5 class="card-title">Celebración día de la familia</h5>
                                 <p class="card-text text-start">Te invitamos a ser parte de un programa único diseñado especialmente para ti, tu familia y tus seres queridos. Al registrarte, podrás disfrutar de sistemas de recompensas, descuentos exclusivos...</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 mt-2">
                           <div class="card">
                              <img src="/assets/image/imagen2.jpg" class="card-img-top  img-fluid" alt="Beneficios para tus mascotas">
                              <div class="card-body">
                                 <h5 class="card-title">Beneficios para tus mascotas</h5>
                                 <p class="card-text text-start">Te invitamos a ser parte de un programa único diseñado especialmente para ti, tu familia y tus seres queridos. Al registrarte, podrás disfrutar de sistemas de recompensas, descuentos exclusivos...</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 mt-2">
                           <div class="card">
                              <img src="/assets/image/imagen3.jpg" class="card-img-top img-fluid" alt="Apoyos educativos">
                              <div class="card-body">
                                 <h5 class="card-title">Apoyos educativos</h5>
                                 <p class="card-text text-start">Te invitamos a ser parte de un programa único diseñado especialmente para ti, tu familia y tus seres queridos. Al registrarte, podrás disfrutar de sistemas de recompensas, descuentos exclusivos...</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row">
                        <div class="col-md-4 mt-2">
                           <div class="card">
                              <img src="/assets/image/imagen1.jpg" class="card-img-top img-fluid" alt="Celebración día de la familia">
                              <div class="card-body">
                                 <h5 class="card-title">Celebración día de la familia</h5>
                                 <p class="card-text text-start">Te invitamos a ser parte de un programa único diseñado especialmente para ti, tu familia y tus seres queridos. Al registrarte, podrás disfrutar de sistemas de recompensas, descuentos exclusivos...</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 mt-2">
                           <div class="card">
                              <img src="/assets/image/imagen2.jpg" class="card-img-top" alt="Beneficios para tus mascotas">
                              <div class="card-body">
                                 <h5 class="card-title">Beneficios para tus mascotas</h5>
                                 <p class="card-text text-start">Te invitamos a ser parte de un programa único diseñado especialmente para ti, tu familia y tus seres queridos. Al registrarte, podrás disfrutar de sistemas de recompensas, descuentos exclusivos...</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 mt-2">
                           <div class="card">
                              <img src="/assets/image/imagen3.jpg" class="card-img-top" alt="Apoyos educativos">
                              <div class="card-body">
                                 <h5 class="card-title">Apoyos educativos</h5>
                                 <p class="card-text text-start">Te invitamos a ser parte de un programa único diseñado especialmente para ti, tu familia y tus seres queridos. Al registrarte, podrás disfrutar de sistemas de recompensas, descuentos exclusivos...</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#novedadesCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#novedadesCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
               </button>
            </div>
         </div>
      </section><!-- End Our Services Section -->
      <!-- End Navbar -->
      <div class="mt-2">
         <section class="services sections-bg bg-light">
            <div class="container-fluid">
               <div class="section-header pb-0">
                  <h3 class="text-pri">Eventos del mes</h3>
               </div>
               <div class="row">
                  <?= $cardEventCalendar ?>
               </div>
            </div>
         </section>
      </div>
      <!-- Start Footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/footer.php'; ?>
      <!-- End Footer -->
   </main>
   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>