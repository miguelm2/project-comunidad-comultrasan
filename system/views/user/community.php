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
   <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-200 align-content-center d-flex justify-content-center">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_user.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg container">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0"
         id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_user.php'; ?>
         <!-- End header -->
      </nav>
      <div class="card mt-3 border-2">
         <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
               <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active text-success" data-bs-toggle="tab" href="#community"
                     role="tab" aria-controls="profile" aria-selected="true">
                     Mi comunidad
                  </a>
               </li>
               <?= $optionRequest['html'] ?>
            </ul>
         </div>
         <div class="tab-content pt-2">
            <div class="tab-pane fade show active profile-overview" id="community">
               <div class="row m-0">
                  <div class="col-md-6 mt-4 ms-4">
                     <h4 class="text-success">Mi Comunidad </h4>
                  </div>
                  <div class="col-md-5 mt-4">
                     <div class="row">

                        <?= $btnJoinUser ?>

                     </div>
                  </div>
               </div>
               <?= $unitedCommunity ?>
            </div>
            <div class="tab-pane fade profile-overview" <?= $optionRequest['style'] ?> id="information">
               <div class="row m-0">
                  <div class="col-md-6 mt-4 ms-4">
                     <h4 class="text-success">Solicitudes </h4>
                  </div>
               </div>
               <table class="table table-bordered table-hover table-striped">
                  <thead class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">Nombre</th>
                        <th class="text-uppercase font-weight-bolder">&#10084; Acumulados</th>
                        <th class="text-uppercase font-weight-bolder">Estado</th>
                        <th class="text-uppercase font-weight-bolder">Fecha Solicitud</th>
                        <th class="text-uppercase font-weight-bolder">Opciones</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">Nombre</th>
                        <th class="text-uppercase font-weight-bolder">&#10084; Acumulados</th>
                        <th class="text-uppercase font-weight-bolder">Estado</th>
                        <th class="text-uppercase font-weight-bolder">Fecha Solicitud</th>
                        <th class="text-uppercase font-weight-bolder">Opciones</th>
                     </tr>
                  </tfoot>
                  <tbody class="text-center">
                     <?= $tableRequestCommunity ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="card border-2 mt-2 pb-3">
         <div class="card-head mt-2 ms-4">
            <h5 class="text-success">Reconocemos tus logros y los de tu comunidad</h5>
         </div>
         <div class="row">
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
            <?= $cardRest ?>
         </div>
      </div>
      <div class="card mt-2 border-2" id="exploraYaprende">
         <div class="card-head">
            <h5 class="text-success ms-3 mt-2">Explora y Aprende</h5>
         </div>
         <div class="card-body">
            <div class="row justify-content-center align-content-center">
               <div class="col-md-3">
                  <a href="">
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
                  <a href="survey?survey=9">
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
                  <a href="survey?survey=5">
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
                  <a href="survey?survey=2">
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
                  <a href="survey?survey=3">
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
                  <a href="survey?survey=10">
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
         <div class="card-head">
            <h5 class="text-success ms-3 mt-2">Invita y Gana</h5>
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
      </div>
      <div class="card mt-3 border-2">
         <div class="card-head">
            <div class="ms-3 mt-3">
               <h4 class="text-success">Grupos de Interés </h4>
            </div>
         </div>
         <div class="card-body">
            <div class="row justify-content-center">
               <?= $cardGroupInterest ?>
            </div>
         </div>
      </div>
      <!-- ======= Basic Modal ======= -->
      <form id="uploadForm" method="post" enctype="multipart/form-data">
         <div class="modal fade" id="newCommunity" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Nueva comunidad</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row g-3">
                        <div class="col-12">
                           <div class="form-group">
                              <label class="form-label">Nombre de la comunidad <small class="p-0 m-0 text-success"
                                    style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" class="form-control border p-1" name="nombre" maxlength="255" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">Nombre del otro miembro <small class="p-0 m-0 text-success"
                                    style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" class="form-control border p-1" name="nombre_user" maxlength="255"
                                 required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">Documento de identidad del otro miembro</label>
                              <input type="text" class="form-control border p-1" name="cedula" maxlength="30" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">Correo del otro miembro <small class="p-0 m-0 text-success"
                                    style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="mail" class="form-control border p-1" name="correo" maxlength="255" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="form-label">Celular del otro miembro</label>
                              <input type="number" class="form-control border p-1" name="celular" maxlength="30"
                                 required>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="checkbox-container">
                              <input type="checkbox" name="tratamiento" id="tratamiento" required
                                 oninvalid="this.setCustomValidity('Por favor declara que cuentas con autorización de tu referido para suministrar sus datos personales')"
                                 oninput="this.setCustomValidity('')">
                              <label for="tratamiento" class="text-black">
                                 Declaro que cuento con autorización por parte de mi referido para suministrar sus datos personales
                              </label>
                           </div>
                        </div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>" hidden>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                           class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newCommunity" class="btn btn-success"><i
                           class="material-icons me-2">add</i> Nueva Comunidad</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!--Final Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form id="uploadForm" method="post" enctype="multipart/form-data">
         <div class="modal fade" id="newUserComm" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Agregar Miembro</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row g-3">
                        <div class="col-12">
                           <div class="form-group">
                              <label for="nombre">Nombre del miembro <small class="p-0 m-0 text-success"
                                    style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" name="nombre" class="form-control border p-1" id="nombre"
                                 maxlength="255" placeholder="Nombre del miembro">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <label for="cedula">Documento de identidad</label>
                              <input type="number" name="cedula" class="form-control border p-1" id="cedula"
                                 maxlength="20" placeholder="Documento de identidad">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <label for="celular">Celular</label>
                              <input type="number" name="celular" class="form-control border p-1" id="celular"
                                 placeholder="Celular">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <label for="correo">Correo <small class="p-0 m-0 text-success" style="font-size: 0.6rem;">
                                    (Máximo de caracteres: 255)</small></label>
                              <input type="mail" name="correo" class="form-control border p-1" id="correo"
                                 maxlength="255" placeholder="Correo">
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="checkbox-container">
                              <input type="checkbox" name="tratamiento" id="tratamiento" required
                                 oninvalid="this.setCustomValidity('Por favor declara que cuentas con autorización de tu referido para suministrar sus datos personales')"
                                 oninput="this.setCustomValidity('')">
                              <label for="tratamiento" class="text-black">
                                 Declaro que cuento con autorización por parte de mi referido para suministrar sus datos personales
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                           class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newUserCommunity" class="btn btn-success"><i
                           class="material-icons me-2">add</i> Guardar Miembro</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!--Final Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="leave" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Salir de la comunidad</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea salir de la comunidad?</label>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                           class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="leaveCommunity" class="btn btn-danger"><i
                           class="material-icons me-2">logout</i> Salir Ahora</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="takeOut" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Remover miembro de la comunidad</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea remover este miembro?</label>
                     <input type="hidden" id="usuario" name="usuario">
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                           class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="deleteUserCommunity" class="btn btn-danger">
                        <i class="material-icons me-2">person_remove</i> Remover miembro
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="editName" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Editar Nombre de la Comunidad</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">Nombre de la Comunidad</label>
                     <input type="text" name="nombre" id="nombre" class="form-control border p-1">
                     <input type="hidden" id="comunidad" name="comunidad">
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                           class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="editCommunity" class="btn btn-info">
                        <i class="material-icons me-2">save</i> Guardar Información
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="leaveLeader" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Salir de la comunidad</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea salir de la comunidad?</label>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                           class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="leaveLeaderCommunity" class="btn btn-danger"><i
                           class="material-icons me-2">logout</i> Salir Ahora</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->

      <!-- ======= Basic Modal ======= -->
      <form id="uploadForm" method="post" enctype="multipart/form-data">
         <div class="modal fade" id="unitedCommunity" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Unirme a comunidad</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row g-3">
                        <div class="col-12">
                           <div class="form-group">
                              <label class="form-label">Código de comunidad</label>
                              <input type="number" name="comunidad" id="comunidad" class="form-control border p-1"
                                 placeholder="Digite código de comunidad" required>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                           class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newUserCommunityJoin" class="btn btn-success"><i
                           class="material-icons me-2">add</i> Enviar Solicitud</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!--Final Basic Modal-->
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
   <?= $response ?>
</body>

</html>