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
   <!-- ======= Our Services Section ======= -->

   <!-- ======= Stats Counter Section ======= -->
   <section id="comunidad" class="p-2">
      <div class="container" data-aos="fade-up mb-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index#index">Inicio</a></li>
               <li class="breadcrumb-item active" aria-current="page">Comunidad</a></li>
            </ol>
         </nav>
         <div class="row gy-2 align-items-center">
            <div class="col-md-12 col-sm-12 text-center">
               <div class="row">
                  <div class="section-header pb-0">
                     <h2 class="text-pri">Comunidad Comultrasan</h2>
                  </div>
               </div>
               <div>
                  <h5 class="text-black fst-italic">
                     Comparte tus gustos e intereses con integrantes de otras comunidades
                  </h5>
               </div>
               <div class="container position-relative">
                  <div class="row gy-1 mt-2">
                     <div class="col-12">
                        <div class="row justify-content-center">
                           <?= $typeComunityIndex ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Start Footer -->
   <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/html/footer.php'; ?>
   <!-- End Footer -->

   </main><!-- End #main -->
   <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

   <div id="preloader"></div>

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