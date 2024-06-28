<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
   <link rel="icon" type="image/png" href="/assets/image/favicon_0.ico">
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
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
         <div class="container-fluid py-1 px-3">
            <!-- Start header -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/views/assets/html/header_admin.php'; ?>
            <!-- End header -->
         </div>
      </nav>
      <div class="card">
         <div class="card-head">
            <div class="col-10 m-4">
               <h4>
                  Editar Perfil
               </h4>
            </div>
         </div>
         <div class="card-body">
            <form method="post">
               <div class="row">
                  <div class="col-md-4 text-center mx-auto mb-3">
                     <img src="/system/img/perfil/perfil.png" alt="" class="img-fluid">
                  </div>
                  <div class="col-md-8">
                     <form action="" method="post">
                        <div class="row">
                           <div class="col-6">
                              <div class="input-group input-group-outline">
                                 <label class="form-label">Nombre</label>
                                 <input type="text" class="form-control" name="nombre" value="<?= $information->getNombre() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="input-group input-group-outline">
                                 <label class="form-label">NIT</label>
                                 <input type="text" class="form-control" name="nit" value="<?= $information->getNit() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="input-group input-group-outline my-3">
                                 <label class="form-label">Dirección</label>
                                 <input type="text" class="form-control" name="direccion" value="<?= $information->getDireccion() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="input-group input-group-outline my-3">
                                 <label class="form-label">Correo</label>
                                 <input type="email" class="form-control" name="correo" value="<?= $information->getCorreo() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="input-group input-group-outline my-3 col-6">
                                 <label class="form-label">Celular</label>
                                 <input type="tel" class="form-control" name="whatsapp" value="<?= $information->getWp() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="input-group input-group-outline my-3">
                                 <label class="form-label">Color</label>
                                 <input type="color" class="form-control" name="color" value="<?= $information->getColor1()?>">
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="input-group input-group-outline my-3">
                                 <label class="form-label">Ciudad</label>
                                 <input type="text" class="form-control" name="ciudad" value="<?= $information->getCiudad() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="input-group input-group-outline my-3">
                                 <label class="form-label">Departamento</label>
                                 <input type="text" class="form-control" name="departamento" value="<?= $information->getDepartamento() ?>" required>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="input-group input-group-outline my-3">
                                 <label class="form-label">Facebook</label>
                                 <input type="url" class="form-control" name="facebook" value="<?= $information->getFb() ?>">
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="input-group input-group-outline my-3">
                                 <label class="form-label">Instagram</label>
                                 <input type="url" class="form-control" name="instagram" value="<?= $information->getInstagram() ?>">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <button type="submit" class="col-6 btn btn-success" name="setInformation">Editar Perfil</button>
                           <button type="submit" class="col-6 btn btn-info">Cambiar imagen</button>
                        </div>
                     </form>
                  </div>
               </div>

            </form>
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