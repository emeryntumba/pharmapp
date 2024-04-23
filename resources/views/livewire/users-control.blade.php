<div class="row">
    <div class="col-12 table-responsive">
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
                            <a href=""><button class="btn btn-primary"><i class="ti ti-eye"></i></button></a>
                            <a href=""><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal2"><i class="ti ti-pencil"></i></button></a>
                            <button class="btn btn-danger"  wire:confirm="Etes-vous sur de vouloir supprimer ce produit?"><i class="ti ti-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>
