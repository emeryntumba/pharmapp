<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Nous sommes là pour vous aider ! Que vous ayez des questions, besoin d'assistance, ou souhaitiez en savoir plus sur notre application de gestion de pharmacie, n'hésitez pas à nous contacter. Notre équipe de support est disponible pour répondre à toutes vos questions et vous offrir le soutien nécessaire pour garantir une expérience optimale avec notre application</p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-map"></i>
                <h3>Notre Adresse</h3>
                <p>Immeuble Anapex, Kinshasa - Gombe</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Ecrivez en email</h3>
                <p>pharmapp@opencommonhealth.com<br>contact@opencommonhealth.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Appelez nous au</h3>
                <p>+243 897 701 190<br>+243 823 193 107</p>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6 mt-4 mt-lg-0">
          <form  role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
                <input type="text" wire:model="name" class="form-control" id="name" placeholder="Votre Nom " required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" wire:model="email" id="email" placeholder="Votre email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" wire:model="subject" id="subject" placeholder="Objet du message" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" wire:model="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             @endif
            </div>
            <div class="text-center"><button type="submit" wire:click="submit">Envoyez le message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
