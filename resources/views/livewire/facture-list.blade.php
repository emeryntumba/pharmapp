<div>
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="row align-items-center">

                <div class="col-md-12">
                    <input type="text" id="search" class="form-control" wire:model.live="search" placeholder="Rechercher par numero de facture">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <label for="afficher">Afficher</label>
                </div>
                <div class="col-md-6">
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
    <div class="card">
        @if(count($commandes) != 0)
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
                        <h6 class="fw-semibold mb-0 fs-4">{{ $commande->montant_total }} {{ session('devise') }}
                        </h6>
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
            <p class="text-center m-3">Pas d'infos</p>
        @endif
      </div>

</div>
