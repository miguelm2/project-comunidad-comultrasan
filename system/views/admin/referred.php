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
         <div class="container-fluid">
            <nav aria-label="breadcrumb" class="d-none d-lg-block">
               <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                  <li class="breadcrumb-item"><a href="index" class="text-white">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="referrals" class="text-white">Referidos</a></li>
                  <li class="breadcrumb-item active">Editar Referido</li>
               </ol>
            </nav>
         </div>
         <!-- Start header -->
         <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/header_admin.php'; ?>
         <!-- End header -->
      </nav><!-- End Page Title -->
      <div class="row m-0 mt-2">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10 mt-1">
                     <h5 class="text-success p-1">
                        Editar Pregunta Frecuente
                     </h5>
                  </div>
                  <div class="col-md-2 mt-0">
                     <div class="text-right"> <!-- Añadí 'text-right' para alinear el botón a la derecha -->
                        <a type="button" class="btn btn-secondary" href="questions"><i class="material-icons me-2">keyboard_return</i>atrás</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dark horizontal my-0 border-1"></div>
            <div class="card-body mt-0">
               <div class="row">
                  <div class="col-md-12">
                     <form method="post">
                        <div class="row text-start">
                           <div class="col-md-12">
                              <h5 class="text-black">
                                 Datos de quien refiere
                              </h5>
                           </div>
                           <div class="col-md-12 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="nombre_referir">Nombre y Apellidos</label>
                                 <input type="text" name="nombre_referir" class="form-control border p-1" placeholder="Nombres completos" required value="<?= $referred->getNombre_refiere() ?>">
                              </div>
                           </div>
                           <div class="col-md-6 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="tipo_documento_referir">Tipo de Documento</label>
                                 <select name="tipo_documento_referir" id="tipo_documento_referir" class="form-select border p-1">
                                    <option value="<?= $referred->getTipo_documento_refiere()[0] ?>"><?= $referred->getTipo_documento_refiere()[1] ?></option>
                                    <option value="1">Cédula de Ciudadanía</option>
                                    <option value="2">Tarjeta de identidad</option>
                                    <option value="3">Cédula de extranjería</option>
                                    <option value="4">Pasaporte</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-6 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="cedula_referir">Nro de documento</label>
                                 <input type="number" name="cedula_referir" class="form-control border p-1" placeholder="Nro de documento" required value="<?= $referred->getCedula_refiere() ?>">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <h5 class="text-black">
                                 Datos Referidos
                              </h5>
                           </div>

                           <div class="col-md-12 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="nombre_referido">Nombre y Apellidos</label>
                                 <input type="text" name="nombre_referido" class="form-control border p-1" placeholder="Nombres completos" required value="<?= $referred->getNombre_referido() ?>">
                              </div>
                           </div>

                           <div class="col-md-6 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="tipo_documento_referido">Tipo de Documento</label>
                                 <select name="tipo_documento_referido" id="tipo_documento_referido" class="form-select border p-1">
                                    <option value="<?= $referred->getTipo_documento_referido()[0] ?>"><?= $referred->getTipo_documento_referido()[1] ?></option>
                                    <option value="1">Cédula de Ciudadanía</option>
                                    <option value="2">Tarjeta de identidad</option>
                                    <option value="3">Cédula de extranjería</option>
                                    <option value="4">Pasaporte</option>
                                 </select>
                              </div>
                           </div>

                           <div class="col-md-6 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="cedula_referir">Nro de documento</label>
                                 <input type="text" name="cedula_referido" class="form-control border p-1" placeholder="Nro de documento" required value="<?= $referred->getCedula_referido() ?>">
                              </div>
                           </div>

                           <div class="col-md-6 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="departamento">Departamento</label>
                                 <input type="text" name="departamento" class="form-control border p-1" placeholder="Departamento" required value="<?= $referred->getDepartamento() ?>">
                              </div>
                           </div>

                           <div class="col-md-6 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="ciudad">Ciudad</label>
                                 <input type="text" name="ciudad" class="form-control border p-1" placeholder="Ciudad" required value="<?= $referred->getCiudad() ?>">
                              </div>
                           </div>

                           <div class="col-md-4 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="correo">Correo</label>
                                 <input type="email" name="correo" class="form-control border p-1" placeholder="Correo" required value="<?= $referred->getCorreo() ?>">
                              </div>
                           </div>

                           <div class="col-md-4 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="celular">Celular</label>
                                 <input type="number" name="celular" class="form-control border p-1" placeholder="Celular" required value="<?= $referred->getCelular() ?>">
                              </div>
                           </div>
                           <div class="col-md-4 mt-2">
                              <div class="form-group">
                                 <label class="text-black" for="tipo_documento_referido">Tipo de Documento</label>
                                 <select name="estado" id="estado" class="form-select border p-1">
                                    <option value="<?= $referred->getEstado()[0] ?>"><?= $referred->getEstado()[1] ?></option>
                                    <option value="1">Inscrito</option>
                                    <option value="2">Aprobado</option>
                                    <option value="3">En proceso</option>
                                 </select>
                              </div>
                           </div>
                           <div class="dark horizontal my-0 border-1 mt-4"></div>
                           <div class="row mt-4">
                              <div class="col-md-6 d-grid">
                                 <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">
                                    <i class="material-icons me-2">delete</i>Eliminar Registro
                                 </button>
                              </div>
                              <div class="col-md-6 d-grid">
                                 <button type="submit" class="btn btn-success" name="setReferred">
                                    <i class="material-icons me-2">edit</i>Editar Referido</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
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
                     <h5 class="modal-title">Eliminar Referido</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea eliminar el registros?</label>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="deleteReferred" class="btn btn-danger"><i class="material-icons me-2">delete</i> Eliminar Referido</button>
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