<div class="row">
        @if ( session()->has('user-created') )
        <div class="col-12 alert alert-success">
            <span>{{ session('user-created') }}</span>
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
                            <a href=""><button class="btn btn-primary fs-1"><i class="ti ti-eye"></i></button></a>
                            <a href=""><button class="btn btn-warning fs-1" data-bs-toggle="modal" data-bs-target="#Modal2"><i class="ti ti-pencil"></i></button></a>
                            <button class="btn btn-danger fs-1"  wire:confirm="Etes-vous sur de vouloir supprimer ce produit?"><i class="ti ti-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <div class="col-md-4 mt-1">
        <form action="">
            <div class="form-group row mb-2">
                <label for="name" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" wire:model="name" required>
                </div>
            </div>
            <div class="form-group row mb-2">
                <label for="code" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="code" wire:model="email" required>
                </div>
            </div>

            <div class="mb-2">
                <span>Mot de passe par défaut, lui sera notifié via email: <span class="text-warning">pharmapp{{  now()->year  }}</span></span>
            </div>
        </form>
        <button wire:click="createUser" class="btn btn-success"><span><i class="ti ti-plus"></i></span> Ajouter l'utilisateur</button></a>
    </div>

</div>
