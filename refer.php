<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>
<!doctype html>
<html lang="en">

<head>
   <title>Referidos</title>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="" name="description">
   <meta content="" name="keywords">

   <!-- Favicons -->
   <link href="assets/image/favicon_0.ico" rel="icon">
   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&display=swap" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="assets/vendor/aos/aos.css" rel="stylesheet">
   <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
   <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="d-flex flex-column min-vh-100">
   <!-- Start Header -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/header.php'; ?>
   <!-- End Header -->
   <section class="ftco-section p-3" id="unete">
      <div class="container">
         <div class="text-center section-header pb-1">
            <h2 class="text-pri">Referidos</h2>
         </div>
         <div class="row">
            <div class="col-md-12 col-lg-12">
               <div class="login-wrap">
                  <form method="post" class="signin-form">
                     <div class="row text-start">
                        <div class="col-md-12">
                           <h5 class="text-black">
                              Datos de quien refiere
                           </h5>
                        </div>
                        <div class="col-md-12 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="nombre_referir">Nombre y Apellidos <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" name="nombre_referir" class="form-control" placeholder="Nombres completos" maxlength="255" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="tipo_documento_referir">Tipo de Documento</label>
                              <select name="tipo_documento_referir" id="tipo_documento_referir" class="form-select">
                                 <option value="1">Cédula de Ciudadanía</option>
                                 <option value="2">Tarjeta de identidad</option>
                                 <option value="3">Cédula de extranjería</option>
                                 <option value="4">Pasaporte</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="cedula_referir">Documento de identidad <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 20)</small></label>
                              <input type="text" name="cedula_referir" class="form-control" placeholder="Documento de identidad" maxlength="20" required>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <h5 class="text-black">
                              Datos Referidos
                           </h5>
                        </div>

                        <div class="col-md-12 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="nombre_referido">Nombre y Apellidos <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" name="nombre_referido" class="form-control" placeholder="Nombres completos" maxlength="255" required>
                           </div>
                        </div>

                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="tipo_documento_referido">Tipo de Documento</label>
                              <select name="tipo_documento_referido" id="tipo_documento_referido" class="form-select">
                                 <option value="1">Cédula de Ciudadanía</option>
                                 <option value="2">Tarjeta de identidad</option>
                                 <option value="3">Cédula de extranjería</option>
                                 <option value="4">Pasaporte</option>
                              </select>
                           </div>
                        </div>

                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="cedula_referir">Documento de identidad  <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 20)</small></label>
                              <input type="text" name="cedula_referido" class="form-control" placeholder="Documento de identidad" maxlength="20" required>
                           </div>
                        </div>

                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="celular">Celular <small class="p-0 m-0 text-success" style="font-size: 0.6rem;"> (Máximo de caracteres: 20)</small></label>
                              <input type="number" name="celular" class="form-control" placeholder="Celular" maxlength="20" required>
                           </div>
                        </div>

                        <div>
                           <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        </div>

                        <div class="col-md-12 mt-2">
                           <div class="form-check">
                              <label for="tratamiento" class="text-black">
                                 <input type="checkbox" name="tratamiento" id="tratamiento" required>
                                 <a href="https://www.financieracomultrasan.com.co/es/seguridad-financiera/proteccion-de-datos-personales">
                                    Autorizo el tratamiento de datos personales
                                 </a>
                              </label>
                           </div>
                        </div>
                        <div class="col-md-12 mt-2">
                           <div class="form-check">
                              <label for="terminos" class="text-black">
                                 <input type="checkbox" name="terminos" id="terminos" required>
                                 Declaro que cuento con autorización para compartir los datos de mi referido
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <br>
                        <button type="submit" name="referred_page" class="btn btn-verde btn1 rounded-3"> <i class="bi bi-send"></i> Enviar</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Start Footer -->
   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/footer.php'; ?>
   <!-- End Footer -->

   <!-- Vendor JS Files -->
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="assets/vendor/aos/aos.js"></script>
   <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
   <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
   <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
   <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="assets/vendor/php-email-form/validate.js"></script>

   <!-- Template Main JS File -->
   <script src="assets/js/main.js"></script>
   <script src="/system/assets/vendor/swal/sweetalert.min.js"></script>
   <?= $response ?>
</body>

</html>