<div>
    <div class="mb-3 row">
        <div class="col-md-6">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <label for="search" class="form-label">Rechercher</label>
                </div>
                <div class="col-md-10">
                    <input type="text" id="search" class="form-control" wire:model.live="search">
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <label for="afficher">Afficher</label>
                </div>
                <div class="col-md-8">
                    <select  wire:model.live="afficher" class="form-select">
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
                        <h6 class="fw-semibold mb-0">Id</h6>
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
                        <h6 class="fw-semibold mb-0">Forme Galenique</h6>
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
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $produit->id }}</h6></td>
                        <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->nom }}</p></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0 fs-4">${{ $produit->prix }}</h6></td>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">4</h6></td>
                        <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->dosage }}</p></td>
                        <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->forme_galenique }}</p></td>
                        <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->created_at }}</p></td>
                        <td class="border-bottom-0">
                            <a href=""><button class="btn btn-primary"><i class="ti ti-eye"></i></button></a>
                            <a href=""><button class="btn btn-warning"><i class="ti ti-pencil"></i></button></a>
                            <a href=""><button class="btn btn-danger"><i class="ti ti-trash"></i></button></a>
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
