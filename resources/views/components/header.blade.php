<header class="app-header" style="-webkit-app-region: drag;">
    <nav class="navbar navbar-expand-lg navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item d-block d-xl-none">
          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-icon-hover" href="#" id="showNotifications">
            <i class="ti ti-bell-ringing"></i>
            <div class="notification bg-primary rounded-circle"></div>
          </a>
        </li>
      </ul>
      <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
          <a  class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Coming soon... 🐱">Télecharger <i class="ti ti-arrow-down"></i></a>
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
              aria-expanded="false">
              <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
              <div class="message-body">
                <span class="ms-3"><span class="fs-5 fw-bold">Hi🤗 </span>{{ auth()->user()->name }}</span>
                <a href="{{url('user/profile')}}" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-user fs-6"></i>
                  <p class="mb-0 fs-3">Mon Profile</p>
                </a>
                <a href="{{url('user/operations')}}" class="d-flex align-items-center gap-2 dropdown-item">
                  <i class="ti ti-list-check fs-6"></i>
                  <p class="mb-0 fs-3">Mes Opérations</p>
                </a>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" formmethod="POST" class="btn btn-outline-primary mx-3 mt-2 d-block">Se déconnecter</button>
                </form>


            </div>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!--  Header End -->

  <div id="notificationsModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="notificationsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationsModalLabel">Notifications</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(Session::has('notifications'))
                <ul class="list-group">
                    @foreach(Session::get('notifications') as $notification)
                    @php
                    $productId = $notification->data['produit_id'];
                    $product = \App\Models\Produit::find($productId);
                    @endphp
                    <li class="list-group-item fw-bold"><span class="fw-bolder">{{ $product->nom }}</span>:{{ $notification->data['message'] }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>


