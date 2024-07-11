<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Comunidad Comultrasan</title>
   <!--     Fonts and icons     -->
   <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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
      <div class="pagetitle p-1 mt-2 mp-0">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index">Inicio</a></li>
               <li class="breadcrumb-item active">Perfil</li>
            </ol>
         </nav>
      </div><!-- End Page Title -->
      <div class="row p-0">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-10">
                     <h5 class="text-success">
                        Editar Perfil
                     </h5>
                  </div>
               </div>
            </div>
            <div class="card-body mt-4">
               <div class="row">
                  <div class="col-md-4 text-center mx-auto mb-3">
                     <img src="/system/img/perfil/perfil.png" alt="" class="img-fluid">
                  </div>
                  <div class="col-md-8">
                     <form method="post">
                        <div class="row">
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Nombre</label>
                                 <input type="text" class="form-control" name="nombre" value="<?= $information->getNombre() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">NIT</label>
                                 <input type="text" class="form-control" name="nit" value="<?= $information->getNit() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Dirección</label>
                                 <input type="text" class="form-control" name="direccion" value="<?= $information->getDireccion() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Correo</label>
                                 <input type="email" class="form-control" name="correo" value="<?= $information->getCorreo() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Celular</label>
                                 <input type="tel" class="form-control" name="whatsapp" value="<?= $information->getWp() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Color</label>
                                 <input type="color" class="form-control" name="color" value="<?= $information->getColor1() ?>">
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Ciudad</label>
                                 <input type="text" class="form-control" name="ciudad" value="<?= $information->getCiudad() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Departamento</label>
                                 <input type="text" class="form-control" name="departamento" value="<?= $information->getDepartamento() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Facebook</label>
                                 <input type="url" class="form-control" name="facebook" value="<?= $information->getFb() ?>">
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="form-group">
                                 <label class="form-label">Instagram</label>
                                 <input type="url" class="form-control" name="instagram" value="<?= $information->getInstagram() ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row mt-4">
                           <div class="col-md-6 d-grid">
                              <button type="submit" class="btn btn-success" name="setInformation"><i class="bi bi-pencil-square"></i> Editar Perfil</button>
                           </div>
                           <div class="col-md-6 d-grid">
                              <button type="submit" class="btn btn-info"><i class="bi bi-image"></i> Cambiar imagen</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
   <!--   Core JS Files   -->
   <script src="/system/assets/js/core/popper.min.js"></script>
   <script src="/system/assets/js/core/bootstrap.min.js"></script>
   <script src="/system/assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/smooth-scrollbar.min.js"></script>
   <script src="/system/assets/js/plugins/chartjs.min.js"></script>
   <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
   <script src="/system/assets/js/material-dashboard.min.js?v=3.1.0"></script>
   <?= $response ?>
</body>

</html>