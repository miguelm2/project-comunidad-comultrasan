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
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Inicio</li>
               </ol>
            </nav>
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <!-- End Navbar -->
      <div class="container-fluid py-4">
         <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">stars</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Mis Puntos</p>
                        <h4 class="mb-0">10</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">diversity_1</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Mi comunidad</p>
                        <h4 class="mb-0">Comunidad 1</h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
               <div class="card">
                  <div class="card-header p-3 pt-2">
                     <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">groups</i>
                     </div>
                     <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Mi grupo</p>
                        <h4 class="mb-0">Grupo 2</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row mt-4">
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
               <div class="card z-index-2 ">
                  <div class="card-body">
                     <h5>Mis datos</h5>
                     <div class="row">
                        <div class="col-md-6">
                           <img src="<?= Path::$DIR_IMAGE_USER . $_SESSION['imagen'] ?>" alt="Imagen_usuario" class="img-fluid rounded-3">
                        </div>
                        <div class="col-md-6">
                           <h6><i class="material-icons">account_box</i> Nombre: </h6>
                           <p><?= $_SESSION['nombre'] ?></p>
                           <h6><i class="material-icons">email</i> Correo: </h6>
                           <p><?= $_SESSION['correo'] ?></p>
                           <h6><i class="material-icons">phone</i> Celular: </h6>
                           <p><?= $_SESSION['telefono'] ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
               <div class="card">
                  <div class="card-body">
                     <h5>Mi comunidad</h5>
                     <h6><i class="material-icons">diversity_3</i> Nombre: </h6>
                     <p>Nombre de la comunidad</p>
                     <h6><i class="material-icons">supervisor_account</i> Lider: </h6>
                     <p>Nombre del lider</p>
                     <h6><i class="material-icons">group_add</i> Cantidad de usuarios en la comunidad: </h6>
                     <p>N de usuarios</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
               <div class="card">
                  <div class="card-body">
                     <h5>Mi grupo de interés</h5>
                     <h6><i class="material-icons">diversity_2</i> Nombre: </h6>
                     <p>Nombre del grupo</p>
                     <h6><i class="material-icons">supervisor_account</i> Lider: </h6>
                     <p>Nombre del lider</p>
                     <h6><i class="material-icons">group_add</i> Personas en el grupo</h6>
                     <p>N de personas</p>
                     <h6><i class="material-icons">today</i> Fecha de ingreso</h6>
                     <p>Fecha de ingreso al grupo</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
               <div class="card">
                  <div class="card-body">
                     <h5>Mis beneficios</h5>
                     <h6><i class="material-icons">checklist</i> Benefios obtenidos</h6>
                     <p>Beneficios del usuario</p>
                     <h6><i class="material-icons">today</i> Fecha de obtención</h6>
                     <p>fecha en que se obtuvieron</p>
                     <h5>Puntos</h5>
                     <h6><i class="material-icons">control_point_duplicate</i> Mis puntos: </h6>
                     <p>Puntos obtenidos</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Start Footer -->
      <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/footer.php'; ?>
      <!-- End Footer -->
   </main>
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>