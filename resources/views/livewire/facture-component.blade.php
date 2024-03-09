<div class="table-responsive">
    <table class="table text-nowrap mb-0 align-middle table-hover">
        @if($products)
        <thead class="text-dark fs-4 table-primary">
            <tr>

                <th class="border-bottom-0" wire:click="sortBy('nom')">
                    <h6 class="fw-semibold mb-0">Produit</h6>
                </th>
                <th class="border-bottom-0" wire:click="sortBy('dosage')">
                    <h6 class="fw-semibold mb-0">Dosage</h6>
                </th>
                <th class="border-bottom-0" wire:click="sortBy('forme_galenique')">
                    <h6 class="fw-semibold mb-0">Forme Galenique</h6>
                </th>
                <th class="border-bottom-0" wire:click="sortBy('prix')">
                    <h6 class="fw-semibold mb-0">Prix</h6>
                </th>
                <th class="border-bottom-0" wire:click="sortBy('prix')">
                    <h6 class="fw-semibold mb-0">Qté</h6>
                </th>
                <th class="border-bottom-0" wire:click="sortBy('prix')">
                    <h6 class="fw-semibold mb-0">Total</h6>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $produit)


                <tr wire:key="{{$produit->id}}">

                    <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->nom }}</p></td>
                    <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->dosage }}</p></td>
                    <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $produit->forme_galenique }}</p></td>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0 fs-4">${{ $produit->prix }}</h6></td>
                    <td class="border-bottom-0"><input type="text" class="form-control px-2" wire.model="qte" value="{{$qte}}"></td>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0 fs-4">${{ $produit->prix * $qte }}</h6></td>
                </tr>
            @endforeach
        </tbody>
        @else
            Pas de valeur
        @endif
    </table>
</div>
