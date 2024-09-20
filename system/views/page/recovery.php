<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Recuperar contraseña</title>
   <link rel="icon" href="assets/image/favicon_0.ico">
   <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">
   <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
   <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
   <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
   <link href="/assets/css/main.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
   <!-- Start Header -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/header.php'; ?>
   <!-- End Header -->
   <section class="ftco-section">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-md-7 col-lg-7 p-2">
               <img src="/assets/image/login.jpg" alt="Login" class="img-fluid rounded-3">
            </div>
            <div class="col-md-5 col-lg-5 p-2">
               <div class="wrap d-md-flex h-100">
                  <div class="login-wrap p-2 p-md-2 bg-secondary rounded-3">
                     <form method="post" class="signin-form">
                        <div class="text-center section-header pb-1 text-black">
                           <h5 class="text-success">¿Olvidates tu contraseña?</h5>
                           <p class="text-black text-start m-4">
                              Te enviaremos instrucciones sobre cómo restablecer tu contraseña a
                              la dirección de correo electrónico asociada a tu cuenta.
                           </p>
                        </div>
                        <div class="row p-1 text-black">
                           <div class="col-md-12">
                              <div class="form-group mb-3">
                                 <label class="label" for="cedula">Documento de identidad</label>
                                 <input type="text" class="form-control" placeholder="Digita tu documento de identidad" name="cedula" maxlength="255" required>
                              </div>
                           </div>
                           <div class="col-md-12 col-sm-12 d-flex justify-content-end">
                              <button type="submit" class="btn btn-verde btn1 rounded mt-3" name="recovery">
                                 <i class="bi bi-send-fill"></i> Enviar
                              </button>
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
   <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="/assets/vendor/aos/aos.js"></script>
   <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
   <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
   <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
   <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="/assets/vendor/php-email-form/validate.js"></script>
   <script src="/assets/js/main.js"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <?= $response ?>
</body>

</html>