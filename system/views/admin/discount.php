<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
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
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="discounts">Descuentos</a></li>
                  <li class="breadcrumb-item active">Editar Descuento</li>
               </ol>
            </nav>
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav><!-- End Page Title -->
      <div class="row m-0">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success">
                        Editar Descuento
                     </h5>
                  </div>
                  <div class="col-md-2 mt-0">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <a type="button" class="btn btn-secondary" href="discounts">
                           <i class="material-icons me-2">keyboard_return</i>atrás</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body mt-0">
               <form method="post">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="row">
                           <div class="col-md-6">
                              <img src="<?= Path::$DIR_IMAGE_DIS . $discount->getImagen() ?>" alt="Imagen" class="img-fluid" style="max-height: 280px;">
                           </div>
                           <div class="col-md-6">
                              <img src="<?= Path::$DIR_IMAGE_DIS_LOGO . $discount->getLogo() ?>" alt="Logo" class="img-fluid" style="max-height: 280px;">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="col-md-12 form-group">
                           <label for="titulo">Título</label>
                           <input type="text" class="form-control border p-1" name="titulo" value="<?= $discount->getTitulo() ?>" required>
                        </div>
                        <div class="col-12 mt-3">
                           <div class="form-group">
                              <label class="form-label" for="descuento">Descuento</label>
                              <input type="text" class="form-control border p-1" name="descuento" value="<?= $discount->getDescuento() ?>" required>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <label class="form-label" for="vigencia">Vigencia</label>
                              <input type="text" class="form-control border p-1" name="vigencia" value="<?= $discount->getVigencia() ?>" required>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12 mt-3">
                        <label for="acceso">Acceso</label>
                        <textarea name="acceso" id="acceso" class="form-control border p-1" rows="5" required><?= $discount->getAcceso() ?></textarea>
                     </div>
                     <div class="dark horizontal my-0 border-1 mt-4"></div>
                     <div class="col-md-3 d-grid mt-4">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">
                           <i class="material-icons me-2">delete</i> Eliminar Registro</button>
                     </div>
                     <div class="col-md-3 d-grid mt-4">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#setImage">
                           <i class="material-icons me-2">image</i> Cambiar Imagen</button>
                     </div>
                     <div class="col-md-3 d-grid mt-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setLogo">
                           <i class="material-icons me-2">image</i> Cambiar Logo</button>
                     </div>
                     <div class="col-md-3 d-grid mt-4">
                        <button type="submit" class="btn btn-success" name="setDiscount">
                           <i class="material-icons me-2">edit</i> Editar Descuento
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <!-- Modal Eliminar Registro-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="eliminar" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Eliminar Descuento</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea eliminar el registro?</label>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="deleteDiscount" class="btn btn-danger"><i class="material-icons me-2">delete</i> Eliminar Descuento</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post" enctype="multipart/form-data">
         <div class="modal fade" id="setImage" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Cambiar Imagen</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="form-label" for="imageDiscount">Imagen</label>
                        <input type="file" class="form-control border p-1" name="imageDiscount" accept="image/*" required>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="setImageDiscount" class="btn btn-info"><i class="material-icons me-2">image</i> Cambiar Imagen</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post" enctype="multipart/form-data">
         <div class="modal fade" id="setLogo" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Cambiar Logo</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="form-label" for="logoDiscount">Logo</label>
                        <input type="file" class="form-control border p-1" name="logoDiscount" accept="image/*" required>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="setLogoDiscount" class="btn btn-info"><i class="material-icons me-2">image</i> Cambiar Logo</button>
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