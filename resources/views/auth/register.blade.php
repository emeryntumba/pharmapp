<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Enregistrement | PharmApp</title>
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
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/logo.png" width="180" alt="">
                </a>
                <p class="text-center">Gérer votre pharmacie devient facile</p>
                @if ($errors->any())

                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

                @endif
                <form method="POST" action="{{ url('/register') }}">
                    @csrf
                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Nom du gestionnaire principal <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="name" required>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                  </div>

                  <div class="mb-3">
                    <label for="exampleInputtext1" class="form-label">Telephone</label>
                    <input type="tel" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="telephone">
                  </div>

                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Mot de passe<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword" class="form-label">Confirmer le mot de passe<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="exampleInputPassword" name="password_confirmation" required>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Créer votre compte</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Vous avez déjà un compte?</p>
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
