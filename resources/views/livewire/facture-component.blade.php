<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle table-hover">
                @if($products)
                <thead class="text-dark fs-4">
                    <tr>

                        <th class="border-bottom-0" wire:click="sortBy('nom')">
                            <h6 class="fw-semibold mb-0">Produit</h6>
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
                    @foreach ($products as $index => $product)


                        <tr  data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$product['produit']->forme_galenique}} de {{$product['produit']->dosage}}">
                            <td class="border-bottom-0"><p class="mb-0 fs-2">{{ strlen($product['produit']->nom) > 5 ? substr($product['produit']->nom, 0, 7) . '...' : $product['produit']->nom }}</p></td>
                            <td class="border-bottom-0"><h6 class=" mb-0 fs-2">{{ $product['produit']->prix }}FC</h6></td>
                            <td class="border-bottom-0"><input type="text" class="form-control px-2 fs-2" wire:model="products.{{ $index }}.quantite" wire:input="recalculerTotal({{ $index }})"></td>
                            <td class="border-bottom-0"><span class=" mb-0 fs-2" >{{ $product['total'] }}FC</span></td>
                            <td class="border-bottom-0"><button class="btn btn-danger fs-2 p-2" wire:click="delete({{$index}})"  wire:confirm="Etes-vous sur de vouloir supprimer ce produit?"><i class="ti ti-trash"></i></button></td>
                        </tr>


                    @endforeach

                </tbody>
                @else
                    Pas de valeur
                @endif
            </table>

        </div>

    </div>

    @if ($products)
    <div class="col-md-12 mt-3 text-end">
        <button class="btn" wire:click="resetInvoice">Annuler</button>
        <button class="btn btn-primary" wire:click="save">Valider</button>
    </div>
    @endif

</div>




<!-- facture.blade.php -->
@script
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('imprimerFacture', function () {
            window.print(); // Lancer l'impression côté client
        });
    });
</script>
@endscript


