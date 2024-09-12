<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>
<!doctype html>
<html lang="en">

<head>
   <title>Unete</title>
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
            <h2 class="text-pri">¡Únete!</h2>
         </div>
         <div class="row">
            <div class="col-md-4 col-lg-4">
               <img src="assets/image/unete.webp" alt="" class="img-fluid">
               <div class="container bg-primary pb-4">
                  <div>
                     <br>
                     <h5>
                        ¡Únete a Nuestra Comunidad!
                     </h5>
                     <br>
                     <h5>
                        Aquí encontrarás un mundo de oportunidades para crecer, aprender y disfrutar. <br>
                     </h5>
                  </div>
               </div>
            </div>
            <div class="col-md-8 col-lg-8">
               <div class="login-wrap">
                  <form method="post" class="signin-form">
                     <div class="row text-start">

                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="tipo_documento">Tipo de Documento</label>
                              <select name="tipo_documento" id="tipo_documento" class="form-select">
                                 <option value="1">Cédula de Ciudadanía</option>
                                 <option value="2">Tarjeta de identidad</option>
                                 <option value="3">Cédula de extranjería</option>
                                 <option value="4">Pasaporte</option>
                              </select>
                           </div>
                        </div>

                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="cedula">Documento de identidad</label>
                              <input type="text" class="form-control" name="cedula" placeholder="Documento de identidad" maxlength="30" required>
                           </div>
                        </div>

                        <div class="col-md-12 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="nombre">Nombre y Apellidos <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" class="form-control" name="nombre" placeholder="Nombres completos" maxlength="255" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="telefono">Celular</label>
                              <input type="number" class="form-control" name="telefono" placeholder="Celular" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="correo">Correo <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="email" class="form-control" name="correo" placeholder="Correo" maxlength="255" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="fecha_nacimiento">Fecha de nacimiento</label>
                              <input type="date" class="form-control" name="fecha_nacimiento" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="departamento">Departamento <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" class="form-control" name="departamento" maxlength="255" placeholder="Departamento" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="ciudad">Ciudad <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" class="form-control" name="ciudad" maxlength="255" placeholder="Ciudad" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="direccion">Dirección <small class="p-0 m-0 text-danger" style="font-size: 0.6rem;"> (Máximo de caracteres: 255)</small></label>
                              <input type="text" class="form-control" name="direccion" maxlength="255" placeholder="Dirección" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="pass">Contraseña</label>
                              <input type="password" class="form-control" name="pass" placeholder="Contraseña" maxlength="30" required>
                           </div>
                        </div>
                        <div class="col-md-6 mt-2">
                           <div class="form-group">
                              <label class="label text-black" for="imageUser">Imagen <small class="text-secondary">(png, jpeg, jpg, gif)</small></label>
                              <input type="file" accept="image/*" name="imageUser" class="form-control">
                           </div>
                        </div>
                        <div>
                           <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        </div>
                        <div class="col-md-12 mt-2">
                           <div class="form-check">
                              <label for="tratamiento" class="text-black">
                                 <input type="checkbox" name="tratamiento" id="tratamineto">
                                 Autorización para el tratamiento de datos personales, conmsulta y reporte
                                 de información crediticia
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <br>
                        <button type="submit" name="newUserUnete" class="btn btn-verde btn1 rounded"> <i class="bi bi-send"></i> Enviar</button>
                     </div>
                     <div class="form-group mt-2">
                        <br>
                        <p class="text-black">
                           La información que estás suministrando en este formulario es para uso exclusivo de Financiera
                           Comultrasan. Ten presente que no debes de compartir con otras personas el código de verificación
                           en tu proceso de autoinscripción.
                        </p>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>
   <!-- Start Footer -->
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
   <script src="system/assets/vendor/jquery/jquery.min.js"></script>
   <script src="system/assets/vendor/swal/sweetalert.min.js"></script>
   <script src="system/js/valideImage.js"></script>
   <?= $response ?>
</body>

</html>