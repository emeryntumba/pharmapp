<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Réinitialiser le mot de passe | PharmApp</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="{{ route('index') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/logo.png" width="180" alt="">
                </a>
                <p class="text-center">Gérer votre pharmacie devient facile</p>

                @if (session('status'))
                    <div class="badge badge-danger text-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{url('/reset-password')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Entrez votre adresse email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password_confirmation" aria-describedby="emailHelp">
                    </div>


                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Reinitialiser mon mot de passe</button>
                  <div class="d-flex align-items-center justify-content-center">

                    <a class="text-primary fw-bold ms-2" href="{{ url('/login') }}">Se connecter</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
