<div class="row">
    <div class="col-md-6">
        <h4>Mettre à jour son Mot de passe</4>
        <p class="fs-3 mt-2">Assurez vous d'entrer le nombre de caractère minimal 8 et aussi un mot de passe très fort</p>
    </div>

    <div class="col-md-6">
        @if(Session::has('message-succes'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message-succes') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (Session::has('message-error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('message-error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="form-group">
                    <label for="name">Mot de passe actuel</label>
                    <input type="password" class="form-control my-1" id="name" wire:model="currentPassword">
                </div>

                <div class="form-group">
                    <label for="pass">Nouveau mot de passe</label>
                    <input type="password" class="form-control my-1" id="pass" wire:model="password">
                </div>

                <div class="form-group">
                    <label for="pass">Repeter le nouveau mot de passe</label>
                    <input type="password" class="form-control my-1" id="pass" wire:model="passwordConfirmation">
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-dark" wire:click="changePassword">Sauvegarder</button>
                </div>
            </div>
        </div>

    </div>
</div>
