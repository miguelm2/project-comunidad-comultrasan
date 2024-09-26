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
   <link rel="stylesheet" href="/system/assets/vendor/quill/quill.snow.css">
   <link rel="stylesheet" href="/system/assets/vendor/quill/quill.bubble.css">
   <link rel="stylesheet" href="/system/assets/vendor/simple-datatables/style.css">
   <link rel="stylesheet" href="/system/assets/vendor/datatables/dataTables.bootstrap4.min.css">
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
         <!-- End header --></div>
      </nav>
      <div class="card mt-3">
         <div class="row m-0">
            <div class="col-md-9 mt-4 ms-4">
               <h4 class="text-success">Editar Comunidad</h4>
            </div>
            <div class="col-md-2 mt-4">
               <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                  <a type="button" class="btn btn-secondary" href="communities"><i class="material-icons me-2">keyboard_return</i>atrás</a>
               </div>
            </div>
            <div class="col-md-12 mt-2 pb-4">
               <form method="post">
                  <div class="row">
                     <div class="col-md-3">
                        <img src="/assets/image/comunidad_general.jpg" alt="Imagen" class="img-fluid">
                     </div>
                     <div class="col-md-9">
                        <div class="row">
                           <div class="col-md-4 mt-2">
                              <div class="form-group">
                                 <h6>Código</h6>
                                 <p><?= $comunidad->getId_comunidad() ?></p>
                              </div>
                           </div>
                           <div class="col-md-4 mt-2">
                              <div class="form-group">
                                 <h6>Fecha de creación</h6>
                                 <p><?= $comunidad->getFecha_registro() ?></p>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="table-resposive text-center">
                                 <table class="table table-hover table-bordered table-striped">
                                    <thead>
                                       <tr>
                                          <th>Número de miembros</th>
                                          <th>&#10084; Acumulados</th>
                                          <th>Ranking</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td><?= $infoCommunity->nro_usuarios ?></td>
                                          <td><?= $infoCommunity->total_puntos ?></td>
                                          <td><?= $infoCommunity->ranking ?></td>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="col-12">
                              <h6>Líder: <?= $comunidad->getUsuarioDTO()->getNombre() ?></h6>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6 mt-2">
                        <div class="form-group">
                           <label for="nombre">Nombre <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                           <input type="text" name="nombre" id="nombre_" class="form-control border p-1" value="<?= $comunidad->getNombre() ?>" maxlength="255" required>
                        </div>
                     </div>
                     <div class="col-md-6 mt-2">
                        <div class="form-group">
                           <label for="estado">Estado</label>
                           <select name="estado" id="estado" class="form-select border p-1">
                              <option value="<?= $comunidad->getEstado()[0] ?>"><?= $comunidad->getEstado()[1] ?></option>
                              <option value="0">Inactivo</option>
                              <option value="1">Activo</option>
                           </select>
                        </div>
                     </div>
                     <div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                     </div>
                     <div class="col-md-12 d-grid mt-4">
                        <button type="submit" class="btn btn-success" name="editCommunity">
                           <i class="material-icons me-2">save</i> Guardar Información
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="card mt-3">
         <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
               <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active text-success" style="font-size: 20px;" data-bs-toggle="tab" href="#activityMissing" role="tab" aria-controls="missing" aria-selected="true">
                     Mostrar Actividades por realizar
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 text-success" style="font-size: 20px;" data-bs-toggle="tab" href="#activityComplete" role="tab" aria-controls="complete" aria-selected="true">
                     Mostrar Actividades completas
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 text-success" style="font-size: 20px;" data-bs-toggle="tab" href="#pointsReclamend" role="tab" aria-controls="reclamed" aria-selected="true">
                     Mostrar &#10084; Redimidos
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 text-success" style="font-size: 20px;" data-bs-toggle="tab" href="#showAll" role="tab" aria-controls="all" aria-selected="true">
                     Mostrar Todas
                  </a>
               </li>
            </ul>
         </div>

         <div class="tab-content pt-2">
            <div class="tab-pane fade show active profile-overview" id="activityMissing">
               <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                           <th class="text-uppercase font-weight-bolder">Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Estatus Actividad</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                           <th class="text-uppercase font-weight-bolder">Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Estatus Actividad</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?= $activityMissing ?>
                     </tbody>
                  </table>
               </div>
            </div>

            <div class="tab-pane fade profile-overview" id="activityComplete">
               <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                           <th class="text-uppercase font-weight-bolder">Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Estatus Actividad</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                           <th class="text-uppercase font-weight-bolder">Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Estatus Actividad</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?= $activityRealized ?>
                     </tbody>
                  </table>
               </div>
            </div>

            <div class="tab-pane fade profile-overview" id="pointsReclamend">
               <div class="row p-2">
                  <div class="col-md-3">
                     <label for="cedula">Documento de identidad <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                     <input type="text" name="cedula" id="cedula" class="form-control border p-1" maxlength="255" placeholder="Documento de identidad">
                  </div>
                  <div class="col-md-3">
                     <label for="nombre">Nombre Miembro <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                     <input type="text" name="nombre" id="nombre" class="form-control border p-1" maxlength="255" placeholder="Nombre Miembro">
                  </div>
                  <div class="col-md-3">
                     <label for="fecha_inicio">Fecha inicio</label>
                     <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control border p-1">
                  </div>
                  <div class="col-md-3">
                     <label for="fecha_fin">Fecha fin</label>
                     <input type="date" name="fecha_fin" id="fecha_fin" class="form-control border p-1">
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-hover table-bordered table-striped" id="tablePoints">
                     <thead class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Comunidad</th>
                           <th class="text-uppercase font-weight-bolder">Documento de identidad</th>
                           <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                           <th class="text-uppercase font-weight-bolder">Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Fecha Asignación / Vencimiento</th>
                           <th class="text-uppercase font-weight-bolder">Estatus Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Corazones</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </thead>
                     <tfoot class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Comunidad</th>
                           <th class="text-uppercase font-weight-bolder">Documento de identidad</th>
                           <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                           <th class="text-uppercase font-weight-bolder">Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Fecha Asignación / Vencimiento</th>
                           <th class="text-uppercase font-weight-bolder">Estatus Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Corazones</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?= $tableCommunityManager ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="tab-pane fade profile-overview" id="showAll">
               <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                           <th class="text-uppercase font-weight-bolder">Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Estatus Actividad</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                           <th class="text-uppercase font-weight-bolder">Actividad</th>
                           <th class="text-uppercase font-weight-bolder">Estatus Actividad</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?= $showAll ?>
                     </tbody>
                  </table>
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
                        Miembros
                     </h4>
                  </div>
                  <div class="col-md-3">
                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newUserComm">
                        <i class="material-icons me-2">add</i> Agregar Miembro
                     </button>
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
                        <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                        <th class="text-uppercase font-weight-bolder">Comunidad</th>
                        <th class="text-uppercase font-weight-bolder">&#10084; Acumulados</th>
                        <th class="text-uppercase font-weight-bolder">Fecha Registro</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">ID</th>
                        <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                        <th class="text-uppercase font-weight-bolder">Comunidad</th>
                        <th class="text-uppercase font-weight-bolder">&#10084; Acumulados</th>
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
      <div class="card mt-3">
         <div class="card-head">
            <div class="mt-3 ms-3">
               <div class="row">
                  <div class="col-md-9">
                     <h4 class="text-success">
                        Beneficios en la comunidad
                     </h4>
                  </div><div class="col-md-3">
                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#userBenefitsCommunity">
                        <i class="material-icons me-2">add</i> Agregar Beneficio
                     </button>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-hover table-bordered table-striped">
                  <thead class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">Título</th>
                        <th class="text-uppercase font-weight-bolder">Puntos</th>
                        <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                        <th class="text-uppercase font-weight-bolder">Fecha Registro</th>
                        <th class="text-uppercase font-weight-bolder">Opciones</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">Título</th>
                        <th class="text-uppercase font-weight-bolder">Puntos</th>
                        <th class="text-uppercase font-weight-bolder">Nombre Completo</th>
                        <th class="text-uppercase font-weight-bolder">Fecha Registro</th>
                        <th class="text-uppercase font-weight-bolder">Opciones</th>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?= $benefitByCommunity ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- Start Footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/footer.php'; ?>
      <!-- End Footer -->
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
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="deleteUserCommunity" class="btn btn-danger">
                        <i class="material-icons me-2">person_remove</i> Remover
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
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
                              <label class="form-label">Usuario</label>
                              <select name="usuario" id="usuario" class="form-select border p-1">
                                 <option value="">Seleccione un usuario</option>
                                 <?= $optionUserWithoutCommunity ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newUserCommunityAdmin" class="btn btn-success"><i class="material-icons me-2">add</i> Nuevo Miembro</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!--Final Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="userBenefitsCommunity" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Agregar Beneficio</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="form-label" for="userBenefit">Beneficio</label>
                        <select class="form-select border p-1" name="userBenefit" required>
                           <option value="">Seleccione un beneficio</option>
                           <?= $optionBenefit ?>
                        </select>
                     </div>
                     <div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newUserBenefitsCommunity" class="btn btn-info"><i class="material-icons me-2">add</i> Guardar Beneficio</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!--Final Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="takeOutBenefit" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Remover beneficio del miembro</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea remover este beneficio?</label>
                     <input type="hidden" id="usuarioBeneficio" name="usuarioBeneficio">
                  </div>
                  <div>
                     <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="deleteUserBenefit" class="btn btn-danger">
                        <i class="material-icons me-2">delete</i> Remover Beneficio
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="removeLeader" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Remover líder de la comunidad</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea remover al líder?</label>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="deleteUserLeader" class="btn btn-danger">
                        <i class="material-icons me-2">delete</i> Remover Lider
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
   </main>
   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>
   <!--   Core JS Files   -->
   <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control ../Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/simple-datatables/simple-datatables.js"></script>
   <script src="/system/assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="/system/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="/system/js/demo/datatables-demo.js"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="/system/js/modalEliminar.js"></script>
   <script src="/system/js/selectRepeat.js"></script>
   <script src="/system/js/filter/filter_points_admin.js"></script>
   <script src="/system/js/modalEliminar.js"></script>
   <?= $response ?>
</body>

</html>