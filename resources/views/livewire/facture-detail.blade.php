<div class="position-sticky top-0 card d-flex align-items-stretch">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Facture N°{{$facture->id}}</h5>
      <div class="col-md-12">
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle table-hover">
                <thead class="text-dark fs-4">
                    <tr>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Produit</h6>
                        </th>

                        <th class="border-bottom-0" >
                            <h6 class="fw-semibold mb-0">Prix</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Qté</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Total</h6>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($ligneCommandes as $ligneCommande)


                        <tr  data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{$ligneCommande->produit->forme_galenique}} de {{$ligneCommande->produit->dosage}}">
                            <td class="border-bottom-0"><p class="mb-0 fs-2">{{ $ligneCommande->produit->nom}}</p></td>
                            <td class="border-bottom-0"><h6 class=" mb-0 fs-2">{{ $ligneCommande->prix }}FC</h6></td>
                            <td class="border-bottom-0"><p class="px-2 fs-2">{{$ligneCommande->quantite}}</p></td>
                            <td class="border-bottom-0"><span class=" mb-0 fs-2" >{{ $ligneCommande->total }}FC</span></td>

                        </tr>


                    @endforeach



                </tbody>

            </table>
            <p class="text-right mt-2">Total General: <span class="fw-semibold">{{$facture->montant_total}} FC</span></p>


        </div>

    </div>

    </div>
    <button class="btn btn-primary m-3 mt-0" wire:click="print()">Imprimer</button>
</div>
