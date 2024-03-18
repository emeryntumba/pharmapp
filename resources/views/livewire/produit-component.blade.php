<div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="mb-3 row">
        <div class="col-md-6">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <input type="text" id="search" class="form-control" wire:model.live="search" placeholder="Rechercher">
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row align-items-center">
                <div class="col-4">
                    <label for="afficher">Afficher</label>
                </div>
                <div class="col-8 mt-2">
                    <select wire:model.live="afficher" class="form-select">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="all">Tout</option>
                    </select>
                </div>
            </div>

        </div>

    </div>

    @if (count($produits) != 0)
    <div class="table-responsive">
        <table class="table table-hover text-nowrap mb-0 align-middle ">
            <thead class="text-dark fs-4 table-primary">
                <tr>
                    <th class="border-bottom-0" wire:click="sortBy('id')">
                        <h6 class="fw-semibold mb-0">N°</h6>
                    </th>
                    <th class="border-bottom-0" wire:click="sortBy('nom')">
                        <h6 class="fw-semibold mb-0">Produit</h6>
                    </th>
                    <th class="border-bottom-0" wire:click="sortBy('prix')">
                        <h6 class="fw-semibold mb-0">Prix</h6>
                    </th>
                    <th class="border-bottom-0" wire:click="sortBy('quantite_en_stock')">
                        <h6 class="fw-semibold mb-0">Stock</h6>
                    </th>
                    <th class="border-bottom-0" wire:click="sortBy('dosage')">
                        <h6 class="fw-semibold mb-0">Dosage</h6>
                    </th>
                    <th class="border-bottom-0" wire:click="sortBy('forme_galenique')">
                        <h6 class="fw-semibold mb-0">Forme</h6>
                    </th>
                    <th class="border-bottom-0" wire:click="sortBy('forme_galenique')">
                        <h6 class="fw-semibold mb-0">Enregistrement</h6>
                    </th>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Actions</h6>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                        <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->nom }}</p></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0 fs-4">{{ $produit->prix }}FC</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$produit->stock_state}}</h6></td>
                        <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->dosage }}</p></td>
                        <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->forme_galenique }}</p></td>
                        <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->created_at }}</p></td>
                        <td class="border-bottom-0">
                            <a href="{{route('produit.show', ['id' => $produit->id])}}"><button class="btn btn-primary" wire:click="showTransactions({{$produit->id}})"><i class="ti ti-exchange"></i></button></a>
                            <a href="{{route('produit.edit', ['id' => $produit->id])}}"><button class="btn btn-warning" id={{$produit->id}} data-bs-toggle="modal" data-bs-target="#Modal2"><i class="ti ti-pencil"></i></button></a>
                            <button class="btn btn-danger" wire:click="delete({{$produit->id}})" wire:confirm="Etes-vous sur de vouloir supprimer ce produit?"><i class="ti ti-trash"></i></button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @else
    Pas de résultat

    @endif

</div>
