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
         <div class="container-fluid">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item"><a href="index" class="text-white">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="communities" class="text-white">Comunidad</a></li>
                  <li class="breadcrumb-item active">Editar Comunidad</li>
               </ol>
            </nav>
         </div>
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header --></div>
      </nav>
      <div class="card mt-3">
         <div class="row m-0">
            <div class="col-md-5 mt-4 ms-4">
               <h4 class="text-success">Mi Comunidad</h4>
            </div>
            <div class="col-md-12 mt-2 pb-4">
               <form method="post">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="nombre">Nombre</label>
                           <input type="text" name="nombre" id="nombre" class="form-control border p-1" value="<?= $comunidad->getNombre() ?>">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="estado">Estado</label>
                           <select name="estado" id="estado" class="form-select border p-1">
                              <option value="<?= $comunidad->getEstado()[0] ?>"><?= $comunidad->getEstado()[1] ?></option>
                              <option value="0">Inactivo</option>
                              <option value="1">Activo</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="id_comunidad">Código</label>
                           <input type="text" name="id_comunidad" id="id_comunidad" class="form-control border p-1" value="<?= $comunidad->getId_comunidad() ?>" disabled>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="fecha">Creado</label>
                           <input type="text" name="fecha" id="fecha" class="form-control border p-1" value="<?= $comunidad->getFecha_registro() ?>" disabled>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="lider">Líder</label>
                           <input type="text" name="lider" id="lider" class="form-control border p-1" value="<?= $comunidad->getUsuarioDTO()->getNombre() ?>" disabled>
                        </div>
                     </div>
                     <div class="col-md-12 d-grid mt-4">
                        <button type="submit" class="btn btn-success" name="editCommunity">
                           <i class="material-icons me-2">edit</i> Editar Comunidad
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="card mt-3">
         <div class="card-head">
            <div class="mt-3 ms-3">
               <div class="row">
                  <div class="col-md-9">
                     <h4 class="text-success">
                        Integrantes
                     </h4>
                  </div>
                  <div class="col-md-3">
                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newUserComm">
                        <i class="material-icons me-2">add</i> Agregar integrante
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
                        <th class="text-uppercase font-weight-bolder">Asociado</th>
                        <th class="text-uppercase font-weight-bolder">Comunidad</th>
                        <th class="text-uppercase font-weight-bolder">Fecha Registro</th>
                        <th class="text-uppercase font-weight-bolder">Opciones</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">ID</th>
                        <th class="text-uppercase font-weight-bolder">Asociado</th>
                        <th class="text-uppercase font-weight-bolder">Comunidad</th>
                        <th class="text-uppercase font-weight-bolder">Fecha Registro</th>
                        <th class="text-uppercase font-weight-bolder">Opciones</th>
                     </tr>
                  </tfoot>
                  <tbody>
                     <?= $usuarioComunidad ?>
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
                     <h5 class="modal-title">Remover asociado de la comunidad</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea remover este asociado?</label>
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
                     <h5 class="modal-title">Agregar integrante</h5>
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
                     <button type="submit" name="newUserCommunityAdmin" class="btn btn-success"><i class="material-icons me-2">add</i> Nuevo Integrante</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!--Final Basic Modal-->
   </main>
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
   <script src="/system/js/selectRepeat.js"></script>
   <?= $response ?>
</body>

</html>