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
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
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

<body class="g-sidenav-show bg-gray-200 align-content-center d-flex justify-content-center">
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_user.php'; ?>
   <!-- End Slider -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius container">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg  mx-4 shadow-none border-radius-xl bg-success pt-0 mb-0 mt-2 ms-0" id="navbarBlur" data-scroll="true">
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_user.php'; ?>
         <!-- End header -->
      </nav>
      <div class="row m-0 mt-2">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h4 class="text-success">
                        Editar Perfil
                     </h4>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body">
               <div class="row">

                  <form method="post">
                     <div class="row">
                        <div class="col-md-3 text-center mx-auto text-center mb-3">
                           <img src="<?= Path::$DIR_IMAGE_USER . $_SESSION['imagen'] ?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                           <div class="row">
                              <div class="col-12">
                                 <div class="form-group">
                                    <label class="form-label">Nombre <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                                    <input type="text" class="form-control border p-1" name="nombre" value="<?= $_SESSION['nombre'] ?>" maxlength="255" required>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Correo <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                                    <input type="email" class="form-control border p-1" name="correo" value="<?= $_SESSION['correo'] ?>" maxlength="255" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="label text-black" for="tipo_documento">Tipo de Documento</label>
                                    <select name="tipo_documento" id="tipo_documento" class="form-select  border p-1">
                                       <option value="1">Cédula de Ciudadanía</option>
                                       <option value="2">Tarjeta de identidad</option>
                                       <option value="3">Cédula de extranjería</option>
                                       <option value="4">Pasaporte</option>
                                    </select>
                                 </div>
                              </div>
                              <div>
                                 <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="cedula" class="form-label">Documento de identidad</label><br>
                                    <input type="text" class="form-control border p-1" name="cedula" value="<?= $_SESSION['cedula'] ?>" maxlength="30" required>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label class="label text-black" for="tipo_imagen">Imagen</label>
                                    <select name="tipo_imagen" id="tipo_imagen" class="form-select  border p-1">
                                       <option value="">Seleccione su opción</option>
                                       <option value="1">
                                          Avatar Hombre
                                       </option>
                                       <option value="2">
                                          Avatar Mujer
                                       </option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="dark horizontal my-0 border-1 mt-4"></div>
                     <div class="row mt-4">
                        <div class="col-md-6 d-grid">
                           <button type="submit" class="btn btn-success" name="setProfileUser">
                              <i class="material-icons me-2">edit</i> Guardar Información</button>
                        </div>
                        <div class="col-md-6 d-grid">
                           <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cambiarPass">
                              <i class="material-icons me-2">lock</i> Cambiar Contraseña</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal Cambiar Contraseña-->
      <!-- ======= Basic Modal ======= -->
      <form method="post" onsubmit="return validatePassword()">
         <div class="modal fade" id="cambiarPass" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Cambiar Contraseña</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="row g-3">
                        <div class="col-md-12 form-group">
                           <label for="pass">Contraseña Actual</label>
                           <input type="password" id="pass" name="pass" class="form-control border p-1" maxlength="30" required>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="newPass">Nueva contraseña</label>
                           <input type="password" id="newPass" name="newPass" class="form-control border p-1" maxlength="30" required>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="confirmPass">Confirmar contraseña</label>
                           <input type="password" id="confirmPass" name="confirmPass" class="form-control border p-1" maxlength="30" required>
                        </div>
                        <div>
                           <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        </div>
                     </div>
                     <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="viewPassPerfil">
                           <label class="form-check-label" for="flexCheckDefault">
                              Mostrar contraseña
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="setPassProfileUser" class="btn btn-info"><i class="material-icons me-2">lock</i> Actualizar Contraseña</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->

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
   <script src="/system/js/viewPassword.js"></script>
   <script src="/system/js/valideImage.js"></script>
   <script src="/system/js/functions.js"></script>
   <?= $response ?>
</body>

</html>