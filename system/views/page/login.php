<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>
<!doctype html>
<html lang="en">

<head>
   <title>Ingresar</title>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="" name="description">
   <meta content="" name="keywords">

   <!-- Favicons -->
   <link href="/../../../assets/image/favicon_0.ico" rel="icon">
   <link href="/../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="/../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="/../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="/../../../assets/vendor/aos/aos.css" rel="stylesheet">
   <link href="/../../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
   <link href="/../../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="/../../../assets/css/main.css" rel="stylesheet">

</head>

<body>
   <!-- Start Header -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/header.php'; ?>
   <!-- End Header -->
   <section class="ftco-section p-2">
      <div class="container">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="/index">Inicio</a></li>
               <li class="breadcrumb-item active" aria-current="page">Ingresar</li>
            </ol>
         </nav>
         <div class="row justify-content-center">
            <div class="col-md-7 col-lg-7 p-2">
               <img src="/assets/image/login.jpg" alt="Login" class="img-fluid">
            </div>
            <div class="col-md-5 col-lg-5 p-2">
               <div class="wrap d-md-flex ">
                  <div class="login-wrap p-2 p-md-2 bg-secondary rounded-3">
                     <form method="post" class="signin-form">
                        <div class="text-center section-header pb-1 text-black">
                           <h5>Comunidad Familia Comultrasan</h5>
                        </div>
                        <div class="row p-1 text-black">
                           <div class="col-md-12">
                              <div class="form-group mb-3">
                                 <label class="label" for="cedula">Usuario</label>
                                 <input type="text" class="form-control" placeholder="Usuario" name="cedula" required>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="label" for="password">Contraseña</label>
                                 <input type="password" class="form-control" placeholder="Contraseña" name="pass" required>
                              </div>
                           </div>
                           <div class="col-md-12 col-sm-12 d-flex justify-content-end">
                              <button type="submit" class="btn btn-verde btn1 rounded mt-3" name="login">
                                 <i class="bi bi-box-arrow-in-right"></i> Ingresar
                              </button>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <div class="row mt-2">
                                    <div class="col-md-5 p-2">
                                       <a href="/singup" class="btn btn-secondary">Registrarse</a>
                                    </div>
                                    <div class="col-md-7 p-2">
                                       <a href="recovery" class="btn btn-secondary">¿Haz olvidado tu contraseña?</a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Start Footer -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/footer.php'; ?>
   <!-- End Footer -->

   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>
   <!-- Vendor JS Files -->
   <script src="/../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="/../../../assets/vendor/aos/aos.js"></script>
   <script src="/../../../assets/vendor/glightbox/js/glightbox.min.js"></script>
   <script src="/../../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
   <script src="/../../../assets/vendor/swiper/swiper-bundle.min.js"></script>
   <script src="/../../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="/../../../assets/vendor/php-email-form/validate.js"></script>

   <!-- Template Main JS File -->
   <script src="/../../../assets/js/main.js"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script src="/assets/js/main.js"></script>
   <?= $response ?>

</body>