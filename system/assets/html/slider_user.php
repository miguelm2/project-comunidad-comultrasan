<aside class="sidenav navbar navbar-vertical navbar-expand-xs slidenav-user border-0 border-radius-xl my-3 fixed-start ms-3 bg-white" id="sidenav-main">
   <div class="sidenav-header text-center">
      <i class="fas fa-times p-2 cursor-pointer text-black opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index">
         <img src="<?= Path::$DIR_IMAGE_USER . $_SESSION['imagen'] ?>" class="img-fluid" alt="main_logo">
      </a>
      <span class="font-weight-bold text-black text-center"><?= $_SESSION['nombre'] ?></span>
   </div>
   <hr class="horizontal dark mt-0 mb-2 p-1">
   <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link text-black" href="index">
               <div class="text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10 text-black">dashboard</i>
               </div>
               <span class="nav-link-text ms-1 text-black">Inicio</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black" href="community">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">people</i>
               </div>
               <span class="nav-link-text ms-1">Mi comunidad</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black" href="benefits">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">paid</i>
               </div>
               <span class="nav-link-text ms-1">Beneficios y recompensas</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black" href="profile">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">manage_accounts</i>
               </div>
               <span class="nav-link-text ms-1">Editar perfil</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black" data-bs-toggle="modal" data-bs-target="#basicModal" role="button">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">logout</i>
               </div>
               <span class="nav-link-text ms-1">Salir</span>
            </a>
         </li>
      </ul>
   </div>
</aside>