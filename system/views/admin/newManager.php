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
   <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
   <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
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
      <div class="row m-0 mt-2">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success">
                        Nuevo Gestor
                     </h5>
                  </div>
                  <div class="col-md-2 mt-0">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <a type="button" class="btn btn-secondary" href="managers">
                           <i class="material-icons me-2">keyboard_return</i>atrás</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body mt-0">
               <form method="post">
                  <div class="row">
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label">Nombre <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                           <input type="text" class="form-control border p-1" name="nombre" placeholder="Nombre completo" maxlength="255" required>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label">Dirección <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                           <input type="text" class="form-control border p-1" name="direccion" placeholder="Dirección" maxlength="255" required>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label">Cédula</label>
                           <input type="number" class="form-control border p-1" name="cedula" placeholder="Cédula" maxlength="255" required>
                           <small>Maximo de caracteres: <span id="contadorPublicacion">255</span></small>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label">Celular</label>
                           <input type="tel" class="form-control border p-1" name="telefono" placeholder="Teléfono" maxlength="255" required>
                           <small>Maximo de caracteres: <span id="contadorPublicacion">255</span></small>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label">Correo <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                           <input type="email" class="form-control border p-1" name="correo" placeholder="Correo electrónico" maxlength="255" required>
                        </div>
                     </div>
                     <div class="col-6">
                        <div class="form-group">
                           <label class="form-label">Contraseña</label>
                           <input type="password" class="form-control border p-1" name="pass" placeholder="Contraseña" maxlength="30" required>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="mb-3">
                           <div class="form-group">
                              <label>Imagen <small class="text-secondary">(png, jpeg, jpg, gif)</small></label>
                              <input type="file" class="form-control border p-1" name="imageManager" accept="image/*">
                           </div>
                        </div>
                     </div>
                     <div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                     </div>
                     <div class="dark horizontal my-0 border-1 mt-4"></div>
                     <div class="col-md-12 d-grid mt-4">
                        <button type="submit" class="btn btn-success" name="newManager">
                           <i class="material-icons me-2">add</i> Guardar Gestor
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
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>

   <!-- Uncomment to load the Spanish translation -->
   <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/translations/es.js"></script>
   <script src="/system/js/CkEditor/confCkeditor_1.js"></script>
   <script src="/system/js/CkEditor/confCkeditor.js"></script>
   <script src="/system/js/valideImage.js"></script>
   <?= $response ?>
</body>

</html>