<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-faded-success" id="sidenav-main">
   <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="index">
         <img src="/assets/image/favicon_0.ico" class="navbar-brand-img h-100" alt="main_logo">
         <span class="ms-1 font-weight-bold text-white">Comunidad Comultrasan</span>
      </a>
   </div>
   <hr class="horizontal light mt-0 mb-2">
   <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link text-black" href="index">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">dashboard</i>
               </div>
               <span class="nav-link-text ms-1">Inicio</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black " href="comunity">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">people</i>
               </div>
               <span class="nav-link-text ms-1">Comunidades</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black " href="points">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">favorite</i>
               </div>
               <span class="nav-link-text ms-1">Corazones</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black " href="benefits">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">paid</i>
               </div>
               <span class="nav-link-text ms-1">Beneficios</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black " href="users">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">groups</i>
               </div>
               <span class="nav-link-text ms-1">Asociados</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black " href="groups">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">groups</i>
               </div>
               <span class="nav-link-text ms-1">Grupos</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black " href="profile">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">manage_accounts</i>
               </div>
               <span class="nav-link-text ms-1">Perfil</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-black " data-bs-toggle="modal" data-bs-target="#basicModal" role="button">
               <div class="text-black text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="material-icons opacity-10">logout</i>
               </div>
               <span class="nav-link-text ms-1">Salir</span>
            </a>
         </li>
      </ul>
   </div>
   <!-- ======= Basic Modal ======= -->
   <form method="POST">
      <div class="modal fade" id="basicModal" tabindex="-1">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Salir del sistema</h5>
                  <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  ¿Esta seguro que desea salir del sistema?
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="material-icons opacity-10">close</i> Cerrar</button>
                  <button type="submiT" name="logout" class="btn btn-danger"><i class="material-icons opacity-10">logout</i> Salir del sistema</button>
               </div>
            </div>
         </div>
      </div>
   </form>
</aside>