<div class="row">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="col-md-8 table-responsive">
        <table class="table table-hover text-nowrap mb-0 align-middle ">
            <thead class="text-dark fs-4 ">
                <tr>

                    <th class="border-bottom-0" wire:click="sortBy('nom')">
                        <h6 class="fw-semibold mb-0">Nom</h6>
                    </th>
                    <th class="border-bottom-0" wire:click="sortBy('prix')">
                        <h6 class="fw-semibold mb-0">Email</h6>
                    </th>

                    <th class="border-bottom-0" wire:click="sortBy('dosage')">
                        <h6 class="fw-semibold mb-0">Role</h6>
                    </th>

                    <th class="border-bottom-0" wire:click="sortBy('forme_galenique')">
                        <h6 class="fw-semibold mb-0">Actions</h6>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border-bottom-0">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getRoleNames()->first() }}</td>
                        <td class="border-bottom-0">
                            <button class="btn btn-danger fs-2" wire:click="deleteUser({{ $user->id }})"  wire:confirm="Etes-vous sur de vouloir supprimer cet utilisateur ?"><i class="ti ti-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="col-md-4 mt-1">
        <div class="row">
            <div class="col-12">

                    <div class="form-group row mb-2">
                        <label for="name" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" wire:model="name" placeholder="nom d'utilisateur" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="code" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="code" wire:model="email" placeholder="son adresse mail" required>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="code" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select wire:model="role" id="" class="form-select">
                                <option value="">choisir le role</option>
                                <option value="caissier">caissier</option>
                                <option value="administrateur">administrateur</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-2">
                        <span>Mot de passe par défaut, lui sera notifié via email: <span class="text-warning">pharmapp{{  now()->year  }}</span></span>
                    </div>
                    <button wire:click="createUser" class="btn btn-success"><span><i class="ti ti-plus"></i></span> Ajouter l'utilisateur</button></a>
                
            </div>

        </div>
    </div>

</div>
