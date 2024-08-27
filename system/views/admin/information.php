<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
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
         <div class="container-fluid">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item"><a href="index" class="text-white">Inicio</a></li>
                  <li class="breadcrumb-item active">Información</li>
               </ol>
            </nav>
         </div>
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav><!-- End Page Title -->
      <div class="row m-0">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h4 class="text-success">
                        Editar Información
                     </h4>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body">
               <div class="row">

                  <form method="post">
                     <div class="row">
                        <div class="col-md-4 text-center mx-auto mb-3">
                           <img src="<?= Path::$DIR_IMG_PERFIL . $information->getImagen() ?>" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                           <div class="row">
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Nombre</label>
                                    <input type="text" class="form-control border p-1" name="nombre" value="<?= $information->getNombre() ?>" required>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">NIT</label>
                                    <input type="text" class="form-control border p-1" name="nit" value="<?= $information->getNit() ?>" required>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Dirección</label>
                                    <input type="text" class="form-control border p-1" name="direccion" value="<?= $information->getDireccion() ?>" required>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Correo</label>
                                    <input type="email" class="form-control border p-1" name="correo" value="<?= $information->getCorreo() ?>" required>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Celular</label>
                                    <input type="tel" class="form-control border p-1" name="whatsapp" value="<?= $information->getWp() ?>" required>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Color</label>
                                    <input type="color" class="form-control border p-1" name="color" value="<?= $information->getColor1() ?>">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 mt-1">
                           <div class="row">
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Ciudad</label>
                                    <input type="text" class="form-control border p-1" name="ciudad" value="<?= $information->getCiudad() ?>" required>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Departamento</label>
                                    <input type="text" class="form-control border p-1" name="departamento" value="<?= $information->getDepartamento() ?>" required>
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input type="url" class="form-control border p-1" name="facebook" value="<?= $information->getFb() ?>">
                                 </div>
                              </div>
                              <div class="col-6">
                                 <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input type="url" class="form-control border p-1" name="instagram" value="<?= $information->getInstagram() ?>">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="dark horizontal my-0 border-1 mt-4"></div>
                     <div class="row mt-4">
                        <div class="col-md-6 d-grid">
                           <button type="submit" class="btn btn-success" name="setInformation"><i class="material-icons me-2">edit</i> Editar Perfil</button>
                        </div>
                        <div class="col-md-6 d-grid">
                           <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#setImage">
                              <i class="material-icons me-2">image</i> Cambiar Imagen</button>
                        </div>
                     </div>
                  </form>

               </div>
            </div>
         </div>
      </div>
      <!-- ======= Basic Modal ======= -->
      <form method="post" enctype="multipart/form-data">
         <div class="modal fade" id="setImage" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Cambiar Imagen</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="form-label" for="logo">Imagen</label>
                        <input type="file" class="form-control border p-1" name="logo" accept="image/*" required>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="setLogoInformacion" class="btn btn-info">
                        <i class="material-icons me-2">image</i> Cambiar Imagen
                     </button>
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
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <?= $response ?>
</body>

</html>