<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="{{route('index')}}" class="text-nowrap logo-img">
          <img src="../assets/images/logos/logo.png" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Accueil</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('index')}}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>

          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Menu</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('vente')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-cash"></i>
                </span>
                <span class="hide-menu">Vente</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('produit')}}" aria-expanded="false">
              <span>
                <i class="ti ti-database"></i>
              </span>
              <span class="hide-menu">Gérer les produits</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('facture')}}" aria-expanded="false">
              <span>
                <i class="ti ti-report-money"></i>
              </span>
              <span class="hide-menu">Factures</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('stock')}}" aria-expanded="false">
              <span>
                <i class="ti ti-database-export"></i>
              </span>
              <span class="hide-menu">Mouvement du stock</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('finance')}}" aria-expanded="false">
              <span>
                <i class="ti ti-wallet"></i>
              </span>
              <span class="hide-menu">Finance</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Autres</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('parametre')}}" aria-expanded="false">
              <span>
                <i class="ti ti-settings"></i>
              </span>
              <span class="hide-menu">Paramètres</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="http://www.pharmapp.opencommonhealth.com/support" target="_blank" aria-expanded="false">
              <span>
                <i class="ti ti-help"></i>
              </span>
              <span class="hide-menu">Aide & Support</span>
            </a>
          </li>

        </ul>
        <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
          <div class="d-flex">
            <form action="{{route('logout')}}" method="POST">
                <div class="unlimited-access-title me-3">

                        @csrf

                        <button type="submit" formmethod="POST" class="btn btn-primary fs-2 fw-semibold lh-sm">Se déconnecter</button>
                </div>
            </form>

          </div>
        </div>
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->
