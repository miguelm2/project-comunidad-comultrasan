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
      <div class="row m-0 mt-2">
         <div class="card">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-10">
                     <h5 class="text-success p-1">
                        Editar Asociado
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
               <form method="post">
                  <div class="row">
                     <div class="col-md-4">
                        <img src="<?= Path::$DIR_IMAGE_USER . $user->getImagen() ?>" alt="Imagen" class="img-fluid" style="max-height: 70%;">
                     </div>
                     <div class="col-md-8">
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <label class="form-label">Nombre <small class="p-0 m-0 text-successs" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                                 <input type="text" class="form-control border p-1" value="<?= $user->getNombre() ?>" name="nombre" maxlength="255" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label" for="tipo_documento">Tipo de documento</label>
                                 <select name="tipo_documento" class="form-select border p-1" id="tipo_documento" required>
                                    <option value="<?= $user->getTipo_documento()[0] ?>"><?= $user->getTipo_documento()[1] ?></option>
                                    <option value="1">Cédula de ciudadanía</option>
                                    <option value="2">Tarjeta de identidad</option>
                                    <option value="3">Cédula de extranjería</option>
                                    <option value="4">Pasaporte</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Cédula</label>
                                 <input type="number" class="form-control border p-1" value="<?= $user->getCedula() ?>" name="cedula" maxlength="30" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Correo <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                                 <input type="email" class="form-control border p-1" value="<?= $user->getCorreo() ?>" name="correo" maxlength="255" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label for="estado">Estado</label>
                                 <select name="estado" id="estado" class="form-select border p-1">
                                    <option value="<?= $user->getEstado()[0] ?>"><?= $user->getEstado()[1] ?></option>
                                    <option value="0">Inactivo</option>
                                    <option value="1">Activo</option>
                                    <option value="2">En proceso</option>
                                 </select>
                              </div>
                           </div>
                           <div>
                              <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="dark horizontal my-0 border-1 mt-4"></div>
                  <div class="row mt-4">
                     <div class="col-md-4 d-grid">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cambiarPass">
                           <i class="material-icons me-2">lock</i> Cambiar Contraseña
                        </button>
                     </div>
                     <div class="col-md-4 d-grid">
                        <button type="submit" class="btn btn-success" name="setUser">
                           <i class="material-icons me-2">save</i> Guardar Información
                        </button>
                     </div>
                     <div class="col-md-4 d-grid">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">
                           <i class="material-icons me-2">delete</i> Eliminar Registro
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-9">
                     <h5 class="text-success">
                        Comunidad
                     </h5>
                  </div>
                  <?= $infoCommunityAdmin ?>
               </div>
            </div>
         </div>
         <div class="card mt-3">
            <div class="card-head mt-4">
               <div class="row">
                  <div class="col-md-9">
                     <h5 class="text-success p-1">
                        Puntos
                     </h5>
                  </div>
                  <div class="col-md-3 mt-4">
                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newUserPoint">
                        <i class="material-icons me-2">add</i> Agregar Corazones
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                           <td class="text-uppercase font-weight-bolder">ID</td>
                           <td class="text-uppercase font-weight-bolder">Nombre Completo</td>
                           <td class="text-uppercase font-weight-bolder">Corazones</td>
                           <td class="text-uppercase font-weight-bolder">Descripción</td>
                           <td class="text-uppercase font-weight-bolder">Opciones</td>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th colspan="2" class="text-uppercase font-weight-bolder">Total</th>
                           <th colspan="3" class="text-uppercase font-weight-bolder"><?= $total_puntos ?></th>
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
                  <div class="col-md-9">
                     <h5 class="text-success p-1">
                        Beneficios
                     </h5>
                  </div>
                  <div class="col-md-3 mt-4">
                     <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newUserBenefit">
                        <i class="material-icons me-2">add</i> Agregar Beneficio
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                     <thead>
                        <tr>
                           <td class="text-uppercase font-weight-bolder">Beneficio</td>
                           <td class="text-uppercase font-weight-bolder">Corazones</td>
                           <td class="text-uppercase font-weight-bolder">Fecha Registro</td>
                           <td class="text-uppercase font-weight-bolder">Opciones</td>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <td class="text-uppercase font-weight-bolder">Beneficio</td>
                           <td class="text-uppercase font-weight-bolder">Corazones</td>
                           <td class="text-uppercase font-weight-bolder">Fecha Registro</td>
                           <td class="text-uppercase font-weight-bolder">Opciones</td>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?= $tableBenefitUser ?>
                     </tbody>
                  </table>
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
                     <h5 class="modal-title">Eliminar Asociado</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea eliminar el registro?</label>
                  </div>
                  <div>
                     <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="deleteUser" class="btn btn-danger"><i class="material-icons me-2">delete</i> Eliminar Asociado</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->

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
                           <label for="newPass">Nueva contraseña</label>
                           <input type="password" id="newPass" name="newPass" class="form-control border p-1" maxlength="30" required>
                        </div>
                        <div class="col-md-12 form-group">
                           <label for="confirmPass">Confirmar contraseña</label>
                           <input type="password" id="confirmPass" name="confirmPass" class="form-control border p-1" maxlength="30" required>
                        </div>
                     </div>
                     <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="viewPass">
                           <label class="form-check-label" for="flexCheckDefault">
                              Mostrar contraseña
                           </label>
                        </div>
                     </div>
                     <div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="setPassUser" class="btn btn-info"><i class="material-icons me-2">lock</i> Actualizar Contraseña</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="newUserBenefit" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Agregar Beneficio</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="form-label" for="userBenefit">Beneficio</label>
                        <select class="form-select border p-1" name="userBenefit" required>
                           <option value="">Seleccione un beneficio</option>
                           <?= $optionBenefit ?>
                        </select>
                     </div>
                     <div>
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newUserBenefits" class="btn btn-info"><i class="material-icons me-2">add</i> Guardar Beneficio</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="newUserPoint" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Agregar Corazones</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <div class="row">
                           <div class="col-md-12">
                              <label class="form-label" for="punto">Corazones</label>
                              <input type="number" name="puntos" id="puntos" class="form-control border p-1" placeholder="Cantidad de Corazones" required>
                           </div>
                           <div class="col-md-12">
                              <label for="descripcion">Descripción <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <textarea name="descripcion" id="descripcion" class="form-control border p-1" placeholder="Descripción de los puntos" rows="4" maxlength="255" required></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="newPointUser" class="btn btn-info"><i class="material-icons me-2">add</i> Guardar Corazones</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
      <!-- End Basic Modal-->
      <!-- ======= Basic Modal ======= -->
      <form method="post">
         <div class="modal fade" id="takeOutBenefit" tabindex="-1">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Remover beneficio del asociado</h5>
                     <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <label class="form-label">¿Esta seguro que desea remover este beneficio?</label>
                     <input type="hidden" id="usuarioBeneficio" name="usuarioBeneficio">
                  </div>
                  <div>
                     <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons me-2">close</i> Cerrar</button>
                     <button type="submit" name="deleteUserBenefit" class="btn btn-danger">
                        <i class="material-icons me-2">delete</i> Remover Beneficio
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
   <script src="/system/js/selectRepeat.js"></script>
   <script src="/system/js/valideImage.js"></script>
   <script src="/system/js/modalEliminar.js"></script>
   <?= $response ?>
</body>

</html>