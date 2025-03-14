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

<body class="g-sidenav-show  bg-gray-200 align-content-center d-flex justify-content-center">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_user.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_user.php'; ?>
         <!-- End header -->
      </nav>
      <div class="container pe-4">
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
         <div class="container mt-2 p-2">
            <div class="section-header pb-3">
               <h3 class="text-pri m-0">Novedades de nuestra comunidad</h3>
               <p class="card-text text-start">¡Hola! Queremos compartir contigo algunas de las actividades más destacadas que hemos vivido recientemente en nuestra comunidad</p>
            </div>
            <div id="novedadesCarousel" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active mr-0">
                     <div class="row" style="margin-right: 0">
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen1.jpg" class="card-img-top img-fluid" alt="Celebración día de la familia">
                              <div class="card-body">
                                 <h5 class="card-title">Celebración día de la familia</h5>
                                 <p class="card-text text-start">El pasado 16 de noviembre, mas de cuatro mil miembros  de nuestra comunidad se reunieron para celebrar la primera edición del Dia de la Familia. Fue un espacio lleno de integración y alegría creado para decirle a todos nuestros miembros ¡Gracias por ser parte de nuestra comunidad</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen2.jpg" class="card-img-top  img-fluid" alt="Beneficios para tus mascotas">
                              <div class="card-body">
                                 <h5 class="card-title">Feria de mascotas</h5>
                                 <p class="card-text text-start">Los integrantes de "Patitas Traviesas" participaron como expositores en la feria "BGAPets", distrutando de este beneficio por ser parte de nuestra comunidad. Aqui piedes revivir alguno de los momentos más emocionantes de nuestras mascotas</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen3.jpg" class="card-img-top img-fluid" alt="Apoyos educativos">
                              <div class="card-body">
                                 <h5 class="card-title">Auxilios Economicos</h5>
                                 <p class="card-text text-start">Conscientes de la importancia de la educación para el desarrollo del país, nuestra coperativa apoya a los asociados y a sus hijos en su educación formal y no formal a través  del beneficio de Auxilios Educativos. Te invitamos a revisar los requisitos e inscribirte aqui</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="row" style="margin-right: 0">
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen1.jpg" class="card-img-top img-fluid" alt="Celebración día de la familia">
                              <div class="card-body">
                                 <h5 class="card-title">Celebración día de la familia</h5>
                                 <p class="card-text text-start">El pasado 16 de noviembre, mas de cuatro mil miembros  de nuestra comunidad se reunieron para celebrar la primera edición del Dia de la Familia. Fue un espacio lleno de integración y alegría creado para decirle a todos nuestros miembros ¡Gracias por ser parte de nuestra comunidad</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen2.jpg" class="card-img-top  img-fluid" alt="Beneficios para tus mascotas">
                              <div class="card-body">
                                 <h5 class="card-title">Feria de mascotas</h5>
                                 <p class="card-text text-start">Los integrantes de "Patitas Traviesas" participaron como expositores en la feria "BGAPets", distrutando de este beneficio por ser parte de nuestra comunidad. Aqui piedes revivir alguno de los momentos más emocionantes de nuestras mascotas</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 my-2">
                           <div class="card h-100">
                              <img src="/assets/image/imagen3.jpg" class="card-img-top img-fluid" alt="Apoyos educativos">
                              <div class="card-body">
                                 <h5 class="card-title">Auxilios Economicos</h5>
                                 <p class="card-text text-start">Conscientes de la importancia de la educación para el desarrollo del país, nuestra coperativa apoya a los asociados y a sus hijos en su educación formal y no formal a través  del beneficio de Auxilios Educativos. Te invitamos a revisar los requisitos e inscribirte aqui</p>
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
            <div class="container">
               <div class="section-header pb-0">
                  <h3 class="text-pri">Eventos del mes</h3>
               </div>
               <div class="row">
                  <?= $cardEventCalendar ?>
               </div>
            </div>
         </section>
      </div>
      <!-- ======= Basic Modal ======= -->
      <div class="modal fade" id="loginModal" tabindex="-1">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="loginModalLabel">Aviso de encuestas pendientes</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="text-center">
                     <img src="/assets/image/modal.jpg" alt="Modal" class="img-fluid" style="max-width: 200px;">
                  </div>
                  <br>
                  <p class="text-black m-0">
                     <?= $encuesta->mensaje ?>
                     <br>
                     <a href="survey?survey=<?= $encuesta->id_encuesta ?>" class="btn btn-success mt-2"><i class="material-icons me-2">school</i> ¡Resolver Ahora!</a>
                  </p>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                     <i class="material-icons me-2">close</i> Cerrar</button>
               </div>
            </div>
         </div>
      </div>
      <form method="post">
         <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="otpModalLabel">Validación de OTP</h5>
                  </div>
                  <div class="modal-body">
                     <p>Por favor, ingresa el código OTP que te enviamos:</p>
                     <input type="text" name="otp" class="form-control border p-1" placeholder="Código OTP">
                  </div>
                  <div class="modal-footer">
                     <button type="submit" name="generarOTP" class="btn btn-info">Generar OTP</button>
                     <button type="submit" name="validateOtpBtn" class="btn btn-success">Validar OTP</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
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

   <?= $response ?>
</body>

</html>