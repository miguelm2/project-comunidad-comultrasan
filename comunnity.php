<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/system/php/routing/Page.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Comunidad Comultrasan - Inicio</title>
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
   <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

   <!-- Template Main CSS File -->
   <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>

   <!-- Start Header -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/header.php'; ?>
   <!-- End Header -->

   <div id="futbol" data-aos="fade-up" data-aos-delay="100">
      <section class="p-2">
         <div class="container">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index#index">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="comunidad">Comunidad</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?= $typeComunnity->getTitulo() ?></li>
               </ol>
            </nav>
            <div class="row gy-2 align-items-center">
               <div class="col-md-8">
                  <div class="text-start">
                     <h2 class="text-pri"><?= $typeComunnity->getTitulo() ?></h2>
                     <h5 class="text-black">
                        <?= $typeComunnity->getContenido() ?> <br>
                     </h5>
                  </div>
               </div>
               <div class="col-md-4">
                  <img src="<?= Path::$DIR_IMAGE_TYPE_COM . $typeComunnity->getImagen() ?>" alt="Pioneros" class="img-fluid">
                  <div class="card mt-3">
                     <?= $forumPage ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
   <!-- Start Footer -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/footer.php'; ?>
   <!-- End Footer -->

   </main><!-- End #main -->
   <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <div id="preloader">
      <img src="/assets/image/favicon_0.ico" alt="Cargando...">
   </div>

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

</body>

</html>