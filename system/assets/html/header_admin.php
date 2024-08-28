<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" id="navbarBlur" data-scroll="true">
   <div class="container d-flex justify-content-between">
      <!-- Logo (alineado a la izquierda) -->
      <div class="d-xl-none d-lg-none d-flex align-items-center me-0">
         <a href="index" class="nav-link text-body p-0">
            <img src="/../assets/image/favicon_0.ico" alt="logo" class="img-fluid" width="30px">
         </a>
      </div>


      <!-- Navbar contenido -->
      <div class="collapse navbar-collapse" id="navbar">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item d-flex align-items-center justify-content-end">
               <div class="dropdown-activate">
                  <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                     <span class="text-white"><i class="material-icons" style="font-size: 20px; color:white">account_circle</i> <?= $_SESSION['nombre'] ?></span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end border-2 shadow" aria-labelledby="navbarDropdownMenuLink2">
                     <li class="dropdown-item"><a href="profile" class="text-black">Mi perfil</a></li>
                     <li class="dropdown-item">
                        <a class="text-black" data-bs-toggle="modal" data-bs-target="#basicModal" role="button">
                           <span class="nav-link-text">Salir</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center justify-content-end">
               <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                     <i class="sidenav-toggler-line"></i>
                     <i class="sidenav-toggler-line"></i>
                     <i class="sidenav-toggler-line"></i>
                  </div>
               </a>
            </li>
         </ul>
      </div>
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
</nav>