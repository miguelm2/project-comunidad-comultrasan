<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Manager.php'; ?>
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
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_gestor.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <div class="container-fluid">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item"><a href="index" class="text-white">Inicio</a></li>
                  <li class="breadcrumb-item active">Comunidades</li>
               </ol>
            </nav>
         </div>
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav>
      <div class="card container-fluid mt-3">
         <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
               <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#community" role="tab" aria-controls="profile" aria-selected="true">
                     Comunidades
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#information" role="tab" aria-controls="dashboard" aria-selected="false">
                     Información personal
                  </a>
               </li>
            </ul>
         </div>
         <div class="tab-content pt-2">
            <div class="tab-pane fade show active profile-overview" id="community">
               <div class="row p-2">
                  <div class="col-md-4">
                     <label for="codigo">Código</label>
                     <input type="number" name="codigo" id="codigo" class="form-control border p-1">
                  </div>
                  <div class="col-md-4">
                     <label for="nombre">Nombre</label>
                     <input type="text" name="nombre" id="nombre" class="form-control border p-1">
                  </div>
                  <div class="col-md-4">
                     <label for="nombre_lider">Nombre del Líder</label>
                     <input type="text" name="nombre_lider" id="nombre_lider" class="form-control border p-1">
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-bordered table-hover" id="tableCommunity">
                     <thead class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">ID</th>
                           <th class="text-uppercase font-weight-bolder">Nombre</th>
                           <th class="text-uppercase font-weight-bolder">Líder</th>
                           <th class="text-uppercase font-weight-bolder">Estado</th>
                           <th class="text-uppercase font-weight-bolder">Fecha Registro</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </thead>
                     <tfoot class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">ID</th>
                           <th class="text-uppercase font-weight-bolder">Nombre</th>
                           <th class="text-uppercase font-weight-bolder">Líder</th>
                           <th class="text-uppercase font-weight-bolder">Estado</th>
                           <th class="text-uppercase font-weight-bolder">Fecha Registro</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </tfoot>
                     <tbody class="text-center">
                        <?= $tableCommunities ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="tab-pane fade profile-overview" id="information">
               <div class="row">
                  <div class="col-md-4">
                     <label for="codigo">Código</label>
                     <input type="number" name="codigo" id="codigo_user" class="form-control border p-1">
                  </div>
                  <div class="col-md-4">
                     <label for="nombre">Nombre</label>
                     <input type="text" name="nombre" id="nombre_user" class="form-control border p-1">
                  </div>
                  <div class="col-md-4">
                     <label for="documento">Nro de documento</label>
                     <input type="text" name="documento" id="documento" class="form-control border p-1">
                  </div>
               </div>
               <div class="table-responsive">
                  <table class="table table-bordered table-hover align-items-center mb-0" id="tableUser">
                     <thead class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Nombre</th>
                           <th class="text-uppercase font-weight-bolder">Comunidad</th>
                           <th class="text-uppercase font-weight-bolder">Teléfono</th>
                           <th class="text-uppercase font-weight-bolder">Correo</th>
                           <th class="text-uppercase font-weight-bolder">Fecha nacimiento</th>
                           <th class="text-uppercase font-weight-bolder">Referido</th>
                           <th class="text-uppercase font-weight-bolder">Tipo</th>
                           <th class="text-uppercase font-weight-bolder">Fecha ingreso</th>
                           <th class="text-uppercase font-weight-bolder">Grupo Interes</th>
                           <th class="text-uppercase font-weight-bolder">Fecha último &#10084;</th>
                           <th class="text-uppercase font-weight-bolder">&#10084; Acumulados</th>
                           <th class="text-uppercase font-weight-bolder">Estado</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </thead>
                     <tfoot class="text-center">
                        <tr>
                           <th class="text-uppercase font-weight-bolder">Nombre</th>
                           <th class="text-uppercase font-weight-bolder">Comunidad</th>
                           <th class="text-uppercase font-weight-bolder">Teléfono</th>
                           <th class="text-uppercase font-weight-bolder">Correo</th>
                           <th class="text-uppercase font-weight-bolder">Fecha nacimiento</th>
                           <th class="text-uppercase font-weight-bolder">Referido</th>
                           <th class="text-uppercase font-weight-bolder">Tipo</th>
                           <th class="text-uppercase font-weight-bolder">Fecha ingreso</th>
                           <th class="text-uppercase font-weight-bolder">Grupo Interes</th>
                           <th class="text-uppercase font-weight-bolder">Fecha último &#10084;</th>
                           <th class="text-uppercase font-weight-bolder">&#10084; Acumulados</th>
                           <th class="text-uppercase font-weight-bolder">Estado</th>
                           <th class="text-uppercase font-weight-bolder">Opciones</th>
                        </tr>
                     </tfoot>
                     <tbody class="text-center">
                        <?= $tableUserManager ?>
                     </tbody>
                  </table>
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
   <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control ../Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="/system/assets/vendor/quill/quill.core.js"></script>
   <script src="/system/assets/vendor/quill/quill.min.js"></script>
   <script src="/system/assets/vendor/simple-datatables/simple-datatables.js"></script>
   <script src="/system/assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="/system/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <script src="/system/js/demo/datatables-demo.js"></script>
   <script src="/system/js/filter/filter_community.js"></script>
   <script src="/system/js/filter/filter_users.js"></script>
   <?= $response ?>
</body>

</html>