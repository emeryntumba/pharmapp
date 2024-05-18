@extends('layout.landing')

@section('title', 'Home | Pharmapp')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-2 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Gérer votre pharmacie en toute facilité et fluidité</h1>
          <ul>
            <li><i class="ri-check-line"></i> Gestion efficace du stock</li>
            <li><i class="ri-check-line"></i> Notifications en temps réel</li>
            <li><i class="ri-check-line"></i> Journalisation, Rapport et Impression des factures</li>
          </ul>
          <div class="mt-3">
            <a href="{{ route('etablissement.create') }}" class="btn-get-started scrollto">Essayer gratuitement</a>
            <a href="#contact" class="btn-get-quote">Nous contacter</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/landing_page/assets/img/hero-img.png" class="img-thumbnail" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

   <!-- ======= About Section ======= -->
<section id="about" class="about">
    <div class="container">

      <div class="row content">
        <div class="col-lg-6">
          <h2>Révolutionnez la Gestion de Votre Pharmacie</h2>
          <h3>Optimisez vos opérations quotidiennes avec notre solution tout-en-un</h3>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
          <p>
            Notre application de gestion de pharmacie est conçue pour simplifier et automatiser vos tâches quotidiennes. Dites adieu aux tracas administratifs et concentrez-vous sur ce qui compte vraiment : vos patients.
          </p>
          <ul>
            <li><i class="ri-check-double-line"></i> Gestion simplifiée des stocks et des commandes</li>
            <li><i class="ri-check-double-line"></i> Suivi précis des ventes et des rapports financiers</li>
            <li><i class="ri-check-double-line"></i> Interface intuitive et facile à utiliser pour tous les membres de l'équipe</li>
          </ul>
          <p class="fst-italic">
            Découvrez comment notre technologie peut transformer votre pharmacie en une entreprise plus efficace et plus rentable.
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
    <div class="container">

      <div class="row">

        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="box flex-fill">
            <span>01</span>
            <h4>Interface Intuitive</h4>
            <p>Notre application est conçue pour être facile à utiliser, même pour ceux qui ne sont pas à l'aise avec la technologie. Gagnez du temps et évitez les erreurs.</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0 d-flex align-items-stretch">
          <div class="box flex-fill">
            <span>02</span>
            <h4>Support Technique Dédié</h4>
            <p>Notre équipe de support est disponible pour vous aider à tout moment. Profitez d'une assistance rapide et efficace pour toutes vos questions et problèmes.</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0 d-flex align-items-stretch">
          <div class="box flex-fill">
            <span>03</span>
            <h4>Conformité et Sécurité</h4>
            <p>Nous garantissons la conformité aux normes de sécurité des données médicales. Vos informations sensibles sont protégées par les meilleurs protocoles de sécurité.</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Why Us Section -->


   <!-- ======= Features Section ======= -->
<section id="features" class="features">
    <div class="container">

      <div class="section-title">
        <h2>Fonctionnalités</h2>
        <p>Découvrez les fonctionnalités puissantes de notre application de gestion de pharmacie qui simplifieront votre travail quotidien et amélioreront l'efficacité de votre pharmacie.</p>
      </div>

      <div class="row">

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-store-line" style="color: #ffbb2c;"></i>
            <h3><a href="">Gestion des stocks</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
            <h3><a href="">Analyse des ventes</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
            <h3><a href="">Gestion des commandes</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
            <h3><a href="">Personnalisation</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #47aeff;"></i>
            <h3><a href="">Base de données sécurisée</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
            <h3><a href="">Interface conviviale</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
            <h3><a href="">Rapports détaillés</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
            <h3><a href="">Tarification flexible</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-anchor-line" style="color: #b2904f;"></i>
            <h3><a href="">Support technique 24/7</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-disc-line" style="color: #b20969;"></i>
            <h3><a href="">Gestion des médicaments</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-base-station-line" style="color: #ff5828;"></i>
            <h3><a href="">Synchronisation multi-appareils</a></h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
            <h3><a href="">Sécurité avancée</a></h3>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Features Section -->



    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Tarifs</h2>
          <p>Nous offrons des plans tarifaires flexibles et adaptés aux besoins spécifiques de votre pharmacie. Que vous gériez une petite officine ou une grande chaîne de pharmacies, nous avons une solution qui vous conviendra parfaitement</p>
        </div>

        <div class="row no-gutters">

          <div class="col-lg-4 box">
            <h3>Gratuit</h3>
            <h4>$0<span>par mois</span></h4>
            <ul>
              <li><i class="bx bx-check"></i> Enregistrer jusqu'à 25 produits</li>
              <li><i class="bx bx-check"></i> 50 transactions par mois</li>
              <li><i class="bx bx-check"></i> 1 Gestionnaire</li>
              <li><i class="bx bx-check"></i> Support technique opportun</li>
              <li class="na"><i class="bx bx-x"></i> <span>Application hors ligne</span></li>
              <li class="na"><i class="bx bx-x"></i> <span>Accès anticipé aux versions beta</span></li>
            </ul>
            <a href="#" class="btn-buy">Commencer</a>
          </div>

          <div class="col-lg-4 box featured">
            <h3>Business</h3>
            <h4>$14.99<span>par mois</span></h4>
            <ul>
                <li><i class="bx bx-check"></i> Nombre illimité des produits</li>
                <li><i class="bx bx-check"></i> Nombre illimité des transactions</li>
                <li><i class="bx bx-check"></i> Nombre illimité des Gestionnaires</li>
                <li><i class="bx bx-check"></i> Application hors ligne</li>
                <li><i class="bx bx-check"></i> Accès anticipé aux versions beta</li>
                <li><i class="bx bx-check"></i> Support technique 24h/24</li>
                <li class="na"><i class="bx bx-x"></i> Pas de frais mensuel</li>
            </ul>
            <a href="#" class="btn-buy">Prendre mon abonnement</a>
          </div>

          <div class="col-lg-4 box">
            <h3>Licence à vie</h3>
            <h4>$500<span>une seule fois</span></h4>
            <ul>
                <li><i class="bx bx-check"></i> Pas de frais mensuel</li>
                <li><i class="bx bx-check"></i> Nombre illimité des produits</li>
                <li><i class="bx bx-check"></i> Nombre illimité des transactions</li>
                <li><i class="bx bx-check"></i> Nombre illimité des Gestionnaires</li>
                <li><i class="bx bx-check"></i> Application hors ligne</li>
                <li><i class="bx bx-check"></i> Accès anticipé aux versions beta</li>
                <li><i class="bx bx-check"></i> Support technique 24h/24</li>
            </ul>
            <a href="#" class="btn-buy">Payer maintenant</a>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
<section id="faq" class="faq">
    <div class="container">

      <div class="section-title">
        <h2>Questions Fréquemment Posées</h2>
      </div>

      <ul class="faq-list">

        <li>
          <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Quelles sont les fonctionnalités principales de l'application de gestion de pharmacie ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq1" class="collapse" data-bs-parent=".faq-list">
            <p>
              Notre application offre des fonctionnalités essentielles telles que la gestion des stocks, des commandes et des fournisseurs, la génération de rapports détaillés, la gestion des clients, et la possibilité de gérer plusieurs utilisateurs avec différents niveaux d'accès.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Est-ce que votre application est conforme aux normes de confidentialité et de sécurité des données médicales ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq2" class="collapse" data-bs-parent=".faq-list">
            <p>
              Oui, notre application respecte les normes de confidentialité et de sécurité des données médicales les plus strictes, y compris la conformité avec la norme HIPAA (Health Insurance Portability and Accountability Act) aux États-Unis et d'autres réglementations internationales similaires.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Comment puis-je ajouter de nouveaux produits à mon inventaire et les mettre à jour ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq3" class="collapse" data-bs-parent=".faq-list">
            <p>
              Vous pouvez ajouter de nouveaux produits à votre inventaire en saisissant les détails tels que le nom, la quantité, le prix et la date d'expiration. Vous pouvez également mettre à jour les informations des produits existants à tout moment.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Est-ce que votre application prend en charge les paiements et les factures ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq4" class="collapse" data-bs-parent=".faq-list">
            <p>
              Oui, notre application permet de gérer les paiements et les factures. Vous pouvez créer des factures pour les clients, enregistrer les paiements reçus et générer des rapports sur les transactions financières de votre pharmacie.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Puis-je accéder à l'application depuis plusieurs appareils ou emplacements ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq5" class="collapse" data-bs-parent=".faq-list">
            <p>
              Oui, notre application est basée sur le cloud, ce qui vous permet d'y accéder depuis n'importe quel appareil connecté à Internet, que ce soit un ordinateur, une tablette ou un smartphone. Vous pouvez également autoriser l'accès à plusieurs utilisateurs avec des permissions spécifiques.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Est-ce que votre application offre un support technique en cas de problème ou de question ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq6" class="collapse" data-bs-parent=".faq-list">
            <p>
              Oui, nous proposons un support technique complet à nos utilisateurs. Vous pouvez nous contacter par email, téléphone ou chat en direct pour toute question ou assistance technique. Notre équipe est là pour vous aider à utiliser notre application de manière optimale.
            </p>
          </div>
        </li>

      </ul>

    </div>
  </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">

            <div class="section-title">
                <h2>Témoignages</h2>
            </div>

            <div class="row">

                <!-- Témoignage 1 -->
                <div class="col-lg-4">
                    <div class="testimonial-item">
                        <h3>Clément NKOLOMONYI</h3>
                        <p class="testimonial-text">
                            "J'ai été agréablement surpris par la simplicité d'utilisation et la puissance de l'application de gestion de pharmacie de Pharmapp. Cela a vraiment facilité la gestion de mon officine au quotidien."
                        </p>
                    </div>
                </div>

                <!-- Témoignage 2 -->
                <div class="col-lg-4">
                    <div class="testimonial-item">
                        <h3>Pierre MWAMBA</h3>
                        <p class="testimonial-text">
                            "Grâce à Pharmapp, j'ai pu optimiser mes opérations et améliorer la satisfaction de mes clients. Je recommande vivement cette solution à tous les professionnels de la pharmacie."
                        </p>
                    </div>
                </div>

                <!-- Témoignage 3 -->
                <div class="col-lg-4">
                    <div class="testimonial-item">
                        <h3>Jacques KILUNGU</h3>
                        <p class="testimonial-text">
                            "Pharmapp a vraiment changé la façon dont je gère mon établissement. C'est une solution complète qui répond à tous mes besoins. Je ne pourrais plus m'en passer!"
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Testimonials Section -->





    <livewire:contact-us/>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@endsection
