<div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Entrées</h5>
                    <p class="card-text">{{  $total_entree }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Sorties</h5>
                    <p class="card-text">{{ $total_sortie }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form wire:submit="save">

                <label for="type_transaction">Type Transaction</label>
                <select wire:model="type_transaction" id="type_transaction" class="form-select my-2">
                    <option value="entree_caisse">Entree caisee</option>
                    <option value="sortie_caisse">Sortie caisse</option>
                </select>

                <input type="text" class="form-control my-2" wire:model="raison" id="" placeholder="Motif de la transaction">
                <input type="number" class="form-control my-2" wire:model="montant" placeholder="Spécifier le montant">
                <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
            </form>
        </div>
    </div>

</div>
