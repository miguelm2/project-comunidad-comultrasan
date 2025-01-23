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
            <div class="col-md-8 ms-4 mt-4">
               <div class="card-head">
                  <h4 class="text-success">Reconocemos tus logros y los de tu comunidad</h4>
               </div>
            </div>
         </div>
         <div class="row m-0">
            <div class="col-md-7">
               <p class="ms-3 text-black">
                  En la Comunidad Comultrasan, premiamos tu lealtad y compromiso con beneficios
                  exclusivos. Valoramos tu participación y queremos ofrecerte una experiencia
                  enriquecedora y memorable. Tú y tu comunidad pueden crecer, aprender y obtener
                  recompensas alcanzando los retos que nuestra comunidad propone en estos dos pilares.
               </p>
               <div class="row">
                  <div class="col-md-6">
                     <a href="#exploraYaprende">
                        <div class="card border-2 ms-2 h-100">
                           <div class="card-head">
                              <h5 class="text-success ms-3 mt-2">Explora y aprende</h5>
                           </div>
                           <div class="card-body">
                              <p>
                                 Acumula corazones al completar actividades educativas en nuestra
                                 plataforma. Mejora tu educación financiera y canjea corazones
                                 por beneficios.
                              </p>
                           </div>
                        </div>
                     </a>
                  </div>
                  <div class="col-md-6">
                     <a href="#invitaYgana">
                        <div class="card border-2 h-100">
                           <div class="card-head">
                              <h5 class="text-success ms-3 mt-2">Invita y gana</h5>
                           </div>
                           <div class="card-body">
                              <p>
                                 Gana corazones haciendo crecer la comunidad e incrementando tus saldos.
                                 Valorizamos y recompensamos tu esfuerzo.
                              </p>
                           </div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-md-5 pb-3">
               <?= $cardRest ?>
            </div>
         </div>
      </div>
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
      <div class="card mt-2 border-2 tamano_card" id="invitaYgana">
         <div class="row m-0">
            <div class="col-md-8 ms-4 mt-4">
               <div class="card-head">
                  <h4 class="text-success">Invita y Gana</h4>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="row justify-content-center align-content-center">
               <div class="col-md-3">
                  <div class="card-flip">
                     <div class="card border-2 h-100">
                        <div class="card-front">
                           <img src="/assets/img/comunidad/nuevo_miembro.png" alt="NuevoMiembros"
                              class="img-fluid rounded-2">
                           <h6 class="text-success text-center">Nuevos miembros en la Comunidad</h6>
                           <p class="ms-2">
                              Invita a otros a que disfruten de los beneficios de la comunidad.
                           </p>
                        </div>
                        <div class="card-back">
                           <h6 class="text-center">Nuevos miembros en la comunidad</h6>
                           <p class="ms-2">
                              Tus nuevos miembros pueden ser:
                           <ul class="text-black">
                              <li class="text-black">
                                 Asociado - 5
                              </li>
                              <li class="text-black">
                                 Nuevo asociado - 10
                              </li>
                              <li class="text-black">
                                 Nueva comunidad familiar (A) - 10
                              </li>
                              <li class="text-black">
                                 Nueva comunidad familiar (NA) - 20
                              </li>
                           </ul>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card-flip">
                     <div class="card border-2 h-100">
                        <div class="card-front">
                           <img src="/assets/img/comunidad/datos_dia.png" alt="Datos" class="img-fluid rounded-2">
                           <h6 class="text-success text-center">Datos al día</h6>
                           <p class=" ms-2">
                              Actualiza tus datos para que no perdamos contacto.
                           </p>
                        </div>
                        <div class="card-back">
                           <h6 class="text-center">Datos al día</h6>
                           <p class="ms-2">
                              Tu actualización de datos puedes hacerla semestralmente así:
                           <ul class="text-black">
                              <li class="text-black">
                                 Agencias, campaña Contact Center - 5
                              </li>
                              <li class="text-black">
                                 Autogestión con Agencia virtual, Contact Center, Fibot - 8
                              </li>
                           </ul>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card-flip">
                     <div class="card border-2 h-100">
                        <div class="card-front">
                           <img src="/assets/img/comunidad/productos.png" alt="Productos" class="img-fluid rounded-2">
                           <h6 class="text-success text-center">Tus productos financieros</h6>
                           <p class=" ms-2">
                              Incluye nuevos productos a tu portafolio y moviliza los existentes
                           </p>
                        </div>
                        <div class="card-back">
                           <h6 class="text-center">Tus productos financieros</h6>
                           <p class="ms-2">
                              Puedes incluir o movilizar tus productos así:
                           <ul class="text-black">
                              <li class="text-black">
                                 Apertura PAP - 10
                              </li>
                              <li class="text-black">
                                 Constitución CDAT - 10
                              </li>
                              <li class="text-black">
                                 Adquisición tarjeta de crédito - 10
                              </li>
                              <li class="text-black">
                                 Compras y avances en comercios nacionales e internacionales
                                 $500.000 - 1 por cada $500.000
                              </li>
                              <li class="text-black">
                                 Incremento saldos en PAP a partir de $50.000 - 1 por cada $50.000
                              </li>
                           </ul>
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card-flip">
                     <div class="card border-2 h-100">
                        <div class="card-front">
                           <img src="/assets/img/comunidad/referidos_efectivos.png" alt="Referidos_efecrivos"
                              class="img-fluid rounded-2">
                           <h6 class="text-success text-center">Referidos efectivos</h6>
                           <p class=" ms-2">
                              Cuéntale a otros lo feliz que te sientes de estar aquí
                           </p>
                        </div>
                        <div class="card-back">
                           <h6 class="text-center">Programa de referidos</h6>
                           <p class="ms-2">
                              Comparte beneficios con los que más quieres así:
                           <ul class="text-black">
                              <li class="text-black">
                                 Desembolso de crédito – ver tabla
                              </li>
                              <li class="text-black">
                                 Constitución CDAT – ver tabla
                              </li>
                              <li class="text-black">
                                 Adquisición tarjeta de crédito - 10
                              </li>
                           </ul>
                           </p>
                        </div>
                     </div>
                  </div>
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
            <?php if (!empty($tablePointsByUserLider)): ?>
               <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="comunidad-tab" data-bs-toggle="tab" href="#comunidad" role="tab" aria-controls="comunidad" aria-selected="<?php echo empty($tablePointsByUserLider) ? 'true' : 'false'; ?>">Mi comunidad</a>
               </li>
            <?php endif; ?>
            <li class="nav-item" role="presentation">
               <a class="nav-link <?php if (empty($tablePointsByUserLider)) echo 'active'; ?>" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="<?php echo empty($tablePointsByUserLider) ? 'true' : 'false'; ?>">Personal</a>
            </li>
         </ul>

         <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade <?php echo !empty($tablePointsByUserLider) ? 'show active' : ''; ?>" id="comunidad" role="tabpanel" aria-labelledby="comunidad-tab">
               <div class="row m-0">
                  <div class="col-12 mt-4">
                     <div class="card-head">
                        <h4 class="text-success">Historial de Corazones</h4>
                        <div class="row px-1">
                           <div class="col-md-2 mb-1">
                              <label for="nombre">Nombre</label>
                              <input type="text" name="nombre_lider" id="nombre_lider" class="form-control border p-1" placeholder="Nombre">
                           </div>
                           <div class="col-md-2 mb-1">
                              <label for="fecha_inicio">Fecha inicio</label>
                              <input type="date" name="fecha_inicio_lider" id="fecha_inicio_lider" class="form-control border p-1">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-body p-3 pt-0">
                  <div class="table-responsive">
                     <table class="table table-bordered table-hover align-items-center mb-0" id="tableHistorialCorazonesLider">
                        <thead class="text-center">
                           <tr>
                              <th class="text-uppercase font-weight-bolder">Nombre</th>
                              <th class="text-uppercase font-weight-bolder">Corazones</th>
                              <th class="text-uppercase font-weight-bolder">Descripción</th>
                           </tr>
                        </thead>
                        <tfoot class="text-center">
                           <tr>
                              <th class="text-uppercase font-weight-bolder">Nombre</th>
                              <th class="text-uppercase font-weight-bolder">Corazones</th>
                              <th class="text-uppercase font-weight-bolder">Descripción</th>
                           </tr>
                        </tfoot>
                        <tbody class="text-center" id="bodyTableUserLider">
                           <?= $tablePointsByUserLider ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="tab-pane fade <?php echo !empty($tablePointsByUserLider) ? '' : 'show active'; ?>" id="personal" role="tabpanel" aria-labelledby="personal-tab">
               <div class="row m-0">
                  <div class="col-12 mt-4">
                     <div class="card-head">
                        <h4 class="text-success">Historial de Corazones</h4>
                        <div class="row px-1">
                           <div class="col-md-2 mb-1">
                              <label for="nombre">Nombre</label>
                              <input type="text" name="nombre_user" id="nombre_user" class="form-control border p-1" placeholder="Nombre">
                           </div>
                           <div class="col-md-2 mb-1">
                              <label for="fecha_inicio">Fecha inicio</label>
                              <input type="date" name="fecha_inicio_user" id="fecha_inicio_user" class="form-control border p-1">
                           </div>
                        </div>
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
                              <th class="text-uppercase font-weight-bolder">Nombre</th>
                              <th class="text-uppercase font-weight-bolder">Corazones</th>
                              <th class="text-uppercase font-weight-bolder">Descripción</th>
                           </tr>
                        </tfoot>
                        <tbody class="text-center" id="bodyTableUserUser">
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
   <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="/system/js/filter/filter_benefits.js"></script>
   <?= $response ?>
</body>

</html>