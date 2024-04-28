<div class="card w-100">
    @if(count($stocks) !== 0)
    <div class="card-body p-4">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title fw-semibold mb-4">Vos opérations</h5>
            </div>

            <div class="col-md-6">
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

      <div class="table-responsive ">
        <table class="table table-hover text-nowrap mb-0 align-middle">
          <thead class="text-dark fs-4">
            <tr>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Produit</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Agent</h6>
              </th>
              <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Quantité</h6>
              </th>

              <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Motif</h6>
                </th>

              <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Date</h6>
              </th>

            </tr>
          </thead>
          <tbody>
              @foreach ($stocks as $stock)

              <tr>
                  <td class="border-bottom-0">
                    <h6 class="mb-0 fw-semibold">{{ $stock->produit->nom }}</h6>
                  </td>
                  <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{$stock->user->name}}</h6>

                  </td>
                  <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0 fs-4">{{ $stock->quantite }}</h6>
                  </td>

                  <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-{{$stock->movement_type === 'in' ? 'danger' : 'success'}} rounded-3 fw-semibold">{{  Str::limit($stock->motif, 7, '...')}}</span>
                      </div>
                    </td>

                  <td class="border-bottom-0">
                      <h6 class="mb-0 fw-normal">{{$stock->created_at->format('d/m/Y H:i')}}</h6>
                  </td>

              </tr>

              @endforeach
          </tbody>
        </table>
        <div class="mt-3">
            {{ $stocks->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </div>
    @else
    <div class="card-body p-4 text-center">
        <h5 class="card-title fw-semibold mb-4">Pas de mouvement de stock enregistré !</h5>
    </div>
    @endif
  </div>
