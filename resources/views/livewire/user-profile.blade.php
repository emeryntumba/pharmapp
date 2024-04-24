<div class="row">
    <div class="col-md-6">
        <h4>Profile Information</4>
        <p class="fs-3 mt-2">Mettez à jour votre profil</p>
    </div>

    <div class="col-md-6">
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card w-100">
            <div class="card-body p-4">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control my-1" id="name" wire:model="name" value="{{ $name }}">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control my-1" id="email" wire:model="email" value="{{ $email }}">
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-dark" wire:click="sauvegarder">Sauvegarder</button>
                </div>
            </div>
        </div>

    </div>
</div>
