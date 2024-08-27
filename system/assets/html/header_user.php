<style>
   .header {
      --color-primary: #96be16;
      transition: all 0.5s;
      z-index: 997;
      height: 90px;
      background-color: var(--color-primary);
   }

   .header.sticked {
      position: fixed;
      top: 0;
      right: 0;
      left: 0;
      height: 70px;
      box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.1);
   }

   .header .logo img {
      max-height: 40px;
      margin-right: 6px;
   }

   .header .logo h1 {
      font-size: 30px;
      margin: 0;
      font-weight: 600;
      letter-spacing: 0.8px;
      color: #fff;
      font-family: var(--font-primary);
   }

   .header .logo h1 span {
      color: #f96f59;
   }

   li {
      text-align: -webkit-match-parent;
   }

   .navbar {
      --bs-navbar-padding-x: 0;
      --bs-navbar-padding-y: 0.5rem;
      --bs-navbar-color: rgba(var(--bs-emphasis-color-rgb), 0.65);
      --bs-navbar-hover-color: rgba(var(--bs-emphasis-color-rgb), 0.8);
      --bs-navbar-disabled-color: rgba(var(--bs-emphasis-color-rgb), 0.3);
      --bs-navbar-active-color: rgba(var(--bs-emphasis-color-rgb), 1);
      --bs-navbar-brand-padding-y: 0.3125rem;
      --bs-navbar-brand-margin-end: 1rem;
      --bs-navbar-brand-font-size: 1.25rem;
      --bs-navbar-brand-color: rgba(var(--bs-emphasis-color-rgb), 1);
      --bs-navbar-brand-hover-color: rgba(var(--bs-emphasis-color-rgb), 1);
      --bs-navbar-nav-link-padding-x: 0.5rem;
      --bs-navbar-toggler-padding-y: 0.25rem;
      --bs-navbar-toggler-padding-x: 0.75rem;
      --bs-navbar-toggler-font-size: 1.25rem;
      --bs-navbar-toggler-icon-bg: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2833, 37, 41, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e);
      --bs-navbar-toggler-border-color: rgba(var(--bs-emphasis-color-rgb), 0.15);
      --bs-navbar-toggler-border-radius: var(--bs-border-radius);
      --bs-navbar-toggler-focus-width: 0.25rem;
      --bs-navbar-toggler-transition: box-shadow 0.15s ease-in-out;
      position: relative;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      padding: var(--bs-navbar-padding-y) var(--bs-navbar-padding-x);
   }
</style>
<header id="header" class="header d-flex align-items-center">
   <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="/index" class="logo d-flex align-items-center">
         <img src="/assets/image/logo_principal.png" alt="Logo_financiera" class="img-fluid">
      </a>
      <nav id="navbar" class="navbar">
         <ul>
            <li>
               <a class="text-black" style="font-size: 18px;" href="/index">
                  Inicio
               </a>
            </li>
            <li>
               <a class="text-black" style="font-size: 18px;" href="/community">
                  Comunidad
               </a>
            </li>
            <li>
               <a class="text-black" style="font-size: 18px;" href="/benefits">
                  Beneficios y Recompensas
               </a>
            </li>
            <a class="text-black" data-bs-toggle="modal" data-bs-target="#basicModal" role="button">
               <span class="nav-link-text">Salir</span>
            </a>
         </ul>
      </nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
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
</header><!-- End Header -->