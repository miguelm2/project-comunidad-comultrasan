<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" id="navbarBlur" data-scroll="true">
   <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
      </div>
      <ul class="navbar-nav  justify-content-end">
         <li class="nav-item d-flex align-items-center">
            <div class="dropdown-activate">
               <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                  <span class="text-black"><i class="material-icons" style="font-size: 20px;">account_circle</i> <?= $_SESSION['nombre'] ?></span>
               </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                  <li class="dropdown-item"><a href="profile"> Mi perfil</a></li>
                  <li class="dropdown-item">
                     <a class="text-black" data-bs-toggle="modal" data-bs-target="#basicModal" role="button">
                        <span class="nav-link-text">Salir</span>
                     </a>
                  </li>
               </ul>
            </div>
         </li>
         <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
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
</nav>