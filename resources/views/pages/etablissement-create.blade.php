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
          <div class="col-md-12 col-lg-6">
            <div class="card my-2">
              <div class="card-body">
                <a href="{{ route('index') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
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
                <form method="POST" action="{{ route('etablissement.store') }}">
                    @csrf
                  <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputtext1" class="form-label">Nom de l'Etablissement<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" name="nom_etablissement" required>
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Devise symbole<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="devise" required>
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Adresse<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="adresse" required>
                          </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">RCCM</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="rccm">
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ID Nat</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_nat">
                          </div>

                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Numero Impot</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="num_impot">
                          </div>

                    </div>
                  </div>

                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Suivant <i class="ti ti-arrow-right"></i></button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Vous avez déjà un compte? </p>
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
