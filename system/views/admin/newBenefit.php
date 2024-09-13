<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
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
   <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_admin.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius">
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav><!-- End Page Title -->
      <div class="row m-0">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success">
                        Nuevo Beneficio
                     </h5>
                  </div>
                  <div class="col-md-2 mt-0">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <a type="button" class="btn btn-secondary" href="benefits">
                           <i class="material-icons me-2">keyboard_return</i>atrás</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body mt-0">
               <form method="post" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-12">
                        <div class="form-group">
                           <label class="form-label" for="titulo">Título <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                           <input type="text" class="form-control border p-1" name="titulo" maxlength="255" placeholder="Título" required>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <label class="form-label" for="puntos">Corazones</label>
                           <input type="number" class="form-control border p-1" name="puntos" placeholder="Corazones" required>
                        </div>
                     </div>
                     <div class="col-md-12 form-group">
                        <label for="imageBenefit">Imagen <small class="text-secondary">(png, jpeg, jpg, gif)</small></label>
                        <input type="file" class="form-control border p-1" name="imageBenefit" accept="image/*" required>
                     </div>
                     <div class="col-md-12 mt-3">
                        <label for="definicion">Definición <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                        <textarea name="definicion" id="definicion" class="form-control border p-1" rows="5" required placeholder="Escribe una definición del beneficio" maxlength="255"></textarea>
                     </div>
                     <div class="col-md-12 mt-3">
                        <label for="condiciones">Condiciones <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                        <textarea name="condiciones" id="condiciones" class="form-control border p-1" rows="5" required placeholder="Escribe las condiciones que debe cumplir el beneficio" maxlength="255"></textarea>
                     </div>
                     <div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                     </div>
                     <div class="dark horizontal my-0 border-1 mt-4"></div>
                     <div class="col-md-12 d-grid mt-4">
                        <button type="submit" class="btn btn-success" name="newBenefit">
                           <i class="material-icons me-2">add</i> Guardar Beneficio
                        </button>
                     </div>
                  </div>
               </form>
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
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="/system/js/valideImage.js"></script>
   <?= $response ?>
</body>

</html>