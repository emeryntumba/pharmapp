<div class="row">
    <div class="col-lg-12 d-flex align-items-stretch">

        <div class="card w-100">
          <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Medicaments Disponibles</h5>
            <div class="mb-3">
                <a href="{{route('produit.create')}}"><button class="btn btn-success"><span><i class="ti ti-plus"></i></span> Nouveau produit</button></a>
                <button class="btn btn-danger ms-2" wire:click="deleteSelected"><span><i class="ti ti-trash"></i></span> Supprimer</button>
            </div>
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
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

                @if (count($produits) != 0)
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap mb-0 align-middle ">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0"><input type="checkbox"></h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Produit</h6>
                                </th>
                                <th class="border-bottom-0" >
                                    <h6 class="fw-semibold mb-0">Prix</h6>
                                </th>
                                <th class="border-bottom-0" >
                                    <h6 class="fw-semibold mb-0">Stock</h6>
                                </th>
                                <th class="border-bottom-0" >
                                    <h6 class="fw-semibold mb-0">Dosage</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Forme</h6>
                                </th>
                                <th class="border-bottom-0" >
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
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><input type="checkbox" wire:model="selectedElements" value="{{ $produit->id }}"></h6></td>
                                    <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->nom }}</p></td>
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0 fs-4">{{ $produit->prix }} {{ session('devise') }}</h6></td>
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$produit->stock_state}}</h6></td>
                                    <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->dosage }}</p></td>
                                    <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->forme_galenique }}</p></td>
                                    <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->created_at->format('H:i - d/m/Y') }}</p></td>
                                    <td class="border-bottom-0">
                                        <a href="{{route('produit.show', ['id' => $produit->id])}}"><button class="btn btn-primary" wire:click="showTransactions({{$produit->id}})"><i class="ti ti-exchange"></i></button></a>
                                        <a href="{{route('produit.edit', ['id' => $produit->id])}}"><button class="btn btn-warning" id={{$produit->id}} data-bs-toggle="modal" data-bs-target="#Modal2"><i class="ti ti-pencil"></i></button></a>
                                        <button class="btn btn-danger" wire:click="delete({{$produit->id}})" wire:confirm="Etes-vous sur de vouloir supprimer ce produit?"><i class="ti ti-trash"></i></button>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                    <div class="mt-3">
                        {{ $produits->links('pagination::bootstrap-5') }}
                    </div>

                </div>
                @else
                Pas de résultat

                @endif

            </div>

          </div>
        </div>
    </div>
</div>
