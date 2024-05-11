<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/logos/favicon.png')}}" />
    <!-- Vendor CSS Files -->
    <link href="assets/landing_page/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/landing_page/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/landing_page/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/landing_page/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/landing_page/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/landing_page/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/landing_page/assets/css/style.css" rel="stylesheet">
</head>
<body>
    @include('landing_page.components.header')

    @yield('content')

    @include('landing_page.components.footer')

    <!-- Vendor JS Files -->
  <script src="assets/landing_page/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/landing_page/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/landing_page/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/landing_page/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/landing_page/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/landing_page/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/landing_page/assets/js/main.js"></script>
</body>
</html>
