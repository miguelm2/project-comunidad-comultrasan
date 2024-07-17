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
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <div class="pagetitle p-1 mt-2 mp-0">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index">Inicio</a></li>
               <li class="breadcrumb-item active">Administrador</li>
            </ol>
         </nav>
      </div>
      <div class="card">
         <div class="row m-0">
            <div class="col-md-8 m-4">
               <div class="card-head">
                  <h4 class="text-success">Administrador</h4>
               </div>
            </div>
            <div class="col-md-3 mt-3">
               <div class="card-head text-right">
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newAdmin">
                     <i class="material-icons me-2">add</i> Agregar Administrador
                  </button>
               </div>
            </div>
         </div>
         <div class="card-body m-0">
            <div class="table-responsive">
               <table class="table table-bordered table-hover align-items-center mb-0">
                  <thead class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">
                           Nombre</th>
                        <th class="text-uppercase font-weight-bolder">
                           Correo</th>
                        <th class="text-uppercase font-weight-bolder">
                           Teléfono</th>
                        <th class="text-uppercase font-weight-bolder">
                           Cédula</th>
                        <th class="text-uppercase font-weight-bolder">
                           Estado</th>
                        <th class="text-uppercase font-weight-bolder">
                           Opciones</th>
                     </tr>
                  </thead>
                  <tfoot class="text-center">
                     <tr>
                        <th class="text-uppercase font-weight-bolder">
                           Nombre</th>
                        <th class="text-uppercase font-weight-bolder">
                           Correo</th>
                        <th class="text-uppercase font-weight-bolder">
                           Teléfono</th>
                        <th class="text-uppercase font-weight-bolder">
                           Cédula</th>
                        <th class="text-uppercase font-weight-bolder">
                           Estado</th>
                        <th class="text-uppercase font-weight-bolder">
                           Opciones</th>
                     </tr>
                  </tfoot>
                  <tbody class="text-center">
                     <?= $tableAdministradores ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- ======= Basic Modal ======= -->
      <form id="uploadForm" method="post" enctype="multipart/form-data">
         <div class="modal fade" id="newAdmin" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Nuevo Administrador</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row g-3">
                        <div class="col-6">
                           <div class="form-group">
                              <label class="form-label">Nombre</label>
                              <input type="text" class="form-control border p-1" name="nombre" required>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label class="form-label">Correo</label>
                              <input type="email" class="form-control border p-1" name="correo" required>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label class="form-label">Celular</label>
                              <input type="tel" class="form-control border p-1" name="telefono" required>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label class="form-label">Cédula</label>
                              <input type="number" class="form-control border p-1" name="cedula" required>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <label class="form-label">Contraseña</label>
                              <input type="password" class="form-control border p-1" name="pass" required>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="mb-3">
                              <div class="form-group">
                                 <label>Imagen</label>
                                 <input type="file" class="form-control border p-1" name="imageAdmin" accept="image/*">
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newAdministrator" class="btn btn-success"><i class="material-icons me-2">add</i> Nuevo Administrador</button>
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