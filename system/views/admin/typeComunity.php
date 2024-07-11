<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Admin.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>Comunidad Comultrasan</title>
   <meta content="" name="description">
   <meta content="" name="keywords">

   <!-- Favicons -->
   <link href="../../assets/img/favicon.png" rel="icon">
   <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

   <!-- Google Fonts -->
   <link href="https://fonts.gstatic.com" rel="preconnect">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
   <link href="../../assets/vendor/quill/quill.snow.css" rel="stylesheet">
   <link href="../../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
   <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
   <link href="../../assets/vendor/simple-datatables/style.css" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="../../assets/css/style.css" rel="stylesheet">
   <link href="../../assets/css/styleCard.css" rel="stylesheet">
</head>

<body>

   <!-- ======= Header ======= -->
   <?php include '../../assets/html/header.php'; ?>
   <!-- End Header -->
   <!-- Start Slider -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/assets/html/slider_admin.php'; ?>
   <!-- End Slider -->
   <main id="main" class="main">
      <div class="pagetitle">
         <nav>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index">Inicio</a></li>
               <li class="breadcrumb-item active">Tipos de comunidades</li>
            </ol>
         </nav>
      </div><!-- End Page Title -->
      <section class="section profile">
         <div class="row">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-10">
                        <h5 class="text-success">
                           Tipos de comunidades
                        </h5>
                     </div>
                  </div>
               </div>
               <div class="card-body mt-4">
                  <form method="post">
                     <div class="row">
                        <div class="col-md-8">
                           <form action="" method="post">
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
                              <div class="row mt-4 ">
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

                  </form>
               </div>
            </div>
         </div>
      </section>
   </main>
   <!-- Vendor JS Files -->
   <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
   <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
   <script src="../../assets/vendor/echarts/echarts.min.js"></script>
   <script src="../../assets/vendor/quill/quill.min.js"></script>
   <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
   <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
   <script src="../../assets/vendor/php-email-form/validate.js"></script>

   <!-- Template Main JS File -->
   <script src="../../assets/js/main.js"></script>
   <script src="../../assets/vendor/swal/sweetalert.min.js"></script>
   <?= $response ?>
</body>

</html>