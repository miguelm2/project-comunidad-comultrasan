<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl shadow-none" id="navbarBlur" data-scroll="true">
   <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar">
         <ul class="navbar-nav ms-auto">
            <li class="nav-item d-flex align-items-center">
               <div class="dropdown-activate">
                  <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                     <span class="text-black"><i class="material-icons" style="font-size: 20px;">account_circle</i> <?= $_SESSION['nombre'] ?></span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink2">
                     <li class="dropdown-item"><a href="profile">Mi perfil</a></li>
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
   </div>
</nav>