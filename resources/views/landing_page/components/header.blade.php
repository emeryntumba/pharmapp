<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="{{ route('landing.index') }}"><img src="../assets/images/logos/logo.png" width="180" alt="" /></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">Fonctionnalités</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Prix</a></li>
          <li><a class="nav-link scrollto" href="#services">FAQ</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="{{ route('etablissement.create') }}">Commencer</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
