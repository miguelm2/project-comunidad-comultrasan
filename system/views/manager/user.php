<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Manager.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="/assets/image/favicon_0.ico">
   <!-- Nucleo Icons -->
   <link href="/system/assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="/system/assets/css/nucleo-svg.css" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
   <!-- CSS Files -->
   <link id="pagestyle" href="/system/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_user.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius">
      <div class="pagetitle p-1 mt-2 mp-0">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index">Inicio</a></li>
               <li class="breadcrumb-item"><a href="users">Asociados</a></li>
               <li class="breadcrumb-item active">Ver Asociado</li>
            </ol>
         </nav>
      </div><!-- End Page Title -->
      <div class="row m-0">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success p-1">
                        Ver Asociado N°. <?= $user->getId_usuario() ?>
                     </h5>
                  </div>
                  <div class="col-md-2">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <a type="button" class="btn btn-secondary" href="users">
                           <i class="material-icons me-2">keyboard_return</i>atrás
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-3">
                     <img src="<?= Path::$DIR_IMAGE_USER . $user->getImagen() ?>" alt="Imagen" class="img-fluid">
                  </div>
                  <div class="col-md-9">
                     <div class="row">
                        <div class="col-6">
                           <h6>Nombre:</h6>
                           <p><?= $user->getNombre() ?></p>
                        </div>
                        <div class="col-6">
                           <h6>Cédula</h6>
                           <p><?= $user->getCedula() ?></p>
                        </div>
                        <div class="col-6">
                           <h6>Celular</h6>
                           <p><?= $user->getTelefono() ?></p>
                        </div>
                        <div class="col-6">
                           <h6>Correo</h6>
                           <p><?= $user->getCorreo() ?></p>
                        </div>
                        <div class="col-6">
                           <h6>Estado</h6>
                           <p><?= $user->getEstado()[1] ?></p>
                        </div>
                        <div class="col-6">
                           <h6>Tipo</h6>
                           <p><?= $user->getTipo() ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success p-1">
                        Puntos
                     </h5>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                           <td class="text-uppercase font-weight-bolder">ID</td>
                           <td class="text-uppercase font-weight-bolder">Administrador</td>
                           <td class="text-uppercase font-weight-bolder">Corazones</td>
                           <td class="text-uppercase font-weight-bolder">Descripción</td>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <td class="text-uppercase font-weight-bolder">Id</td>
                           <td class="text-uppercase font-weight-bolder">Administrador</td>
                           <td class="text-uppercase font-weight-bolder">Corazones</td>
                           <td class="text-uppercase font-weight-bolder">Descripción</td>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?= $tablePointsUser ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success p-1">
                        Beneficios
                     </h5>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-hover table-hover table-bordered table-striped">
                     <thead>
                        <tr>
                           <td class="text-uppercase font-weight-bolder">ID</td>
                           <td class="text-uppercase font-weight-bolder">Título</td>
                           <td class="text-uppercase font-weight-bolder">Puntos</td>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <td class="text-uppercase font-weight-bolder">ID</td>
                           <td class="text-uppercase font-weight-bolder">Título</td>
                           <td class="text-uppercase font-weight-bolder">Puntos</td>
                        </tr>
                     </tfoot>
                     <tbody>
                        
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
   <!--   Core JS Files   -->
   <script src="/system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="/system/js/viewPassword.js"></script>
   <script src="/system/js/functions.js"></script>
   <?= $response ?>
</body>

</html>