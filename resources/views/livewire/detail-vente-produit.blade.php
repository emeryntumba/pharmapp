<div>
    <div class="row mb-2">
        <div class="col-md-4">
            <div class="row align-items-center">
                <div class="col-4">
                    <label for="afficher">Afficher</label>
                </div>
                <div class="col-8">
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

    <div class="d-flex align-items-stretch">
        <div class="card w-100 pb-4">
          <div class="card-body p-4">
            <div class="mb-4">
              <h5 class="card-title fw-semibold">Mouvement Récents</h5>
            </div>
            <ul class="timeline-widget mb-0 position-relative mb-n5">
            @foreach ($stockMovements as $stock)
                <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end">{{$stock->created_at->format('d/m/Y H:i')}}</div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                    <span class="timeline-badge border-2 border border-{{$stock->movement_type === 'in' ? 'success' : 'danger'}} flex-shrink-0 my-8"></span>
                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">{{$stock->motif === 'vente' ? 'Vente de ' . $stock->quantite . ' unité(s)' : 'Approvisionnement de ' . $stock->quantite . ' unité(s)'}}
                        <a
                        href="javascript:void(0)" class="text-primary d-block fw-normal">#{{$stock->user->name}}</a>
                    </div>
                </li>


            @endforeach
            </ul>
          </div>
        </div>
    </div>
</div>
