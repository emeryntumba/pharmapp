<div class="card w-100">
    @if($commandes)
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">Factures</h5>
      <div class="table-responsive ">
        <table class="table table-hover text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Id Facture</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Client</h6>
              </th>

              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Caissier</h6>
              </th>

              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Total Payé</h6>
              </th>

              <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Mode paiement</h6>
                </th>

              <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Date</h6>
              </th>

            </tr>
          </thead>
          <tbody>
              @foreach ($commandes as $commande)

              <tr wire:click="onItemClicked({{$commande->id}})">
                  <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{$commande->id}}</h6></td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{$commande->client->nom}}</h6>
                      <span class="fw-normal">Tel: {{$commande->client->telephone}}</span>
                  </td>

                  <td class="border-bottom-0">
                    <p class="mb-0 fw-normal">{{ $commande->gestionnaire->prenom }}</p>
                  </td>

                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">{{$commande->montant_total}} FC</h6>
                  </td>

                  <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary rounded-3 fw-semibold">{{$commande->mode_paiement}}</span>
                      </div>
                    </td>

                  <td class="border-bottom-0">
                      <h6 class="mb-0 fw-normal">{{$commande->updated_at->format('d/m/Y H:i')}}</h6>
                  </td>

              </tr>

              @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @else
        <p>Pas de factures enregistrées</p>
    @endif
  </div>