<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulaire d'enregistrement du Produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du produit:</label>
                        <input type="text" class="form-control" id="nom" wire:model="nom">
                        <div>
                            @error('nom') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="forme" class="form-label">Forme Galenique</label>
                        <select wire:model="forme_galenique" id="forme" class="form-select">
                            <option value="comprimé" selected>Comprimé</option>
                            <option value="sirop">Sirop</option>
                            <option value="sirop">Injectable</option>
                            <option value="suppositoire">Suppositoire</option>
                            <option value="materiel">Materiel médical</option>
                            <option value="autres">Autres</option>
                        </select>
                        <div>
                            @error('forme_galenique') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="dosage" class="form-label">Dosage :</label>
                        <input type="number" class="form-control" id="dosage" wire:model="dosage" step="1">
                        <div>
                            @error('dosage') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="qte" class="form-label">Qté :</label>
                        <input type="number" class="form-control" id="qte" wire:model="qte" step="1">
                        <div>
                            @error('qte') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix unitaire:</label>
                        <input type="number" class="form-control" id="prix" wire:model="prix" step="50">
                        <div>
                            @error('prix') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea class="form-control" id="description" wire:model="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="fabricant" class="form-label">Fabricant:</label>
                        <input type="text" class="form-control" id="fabricant" wire:model="fabricant">
                    </div>

                    <div class="mb-3">
                        <label for="code" class="form-label">Code CIP</label>
                        <input type="text" class="form-control" id="code" wire:model="code_CIP">
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date Peremption:</label>
                        <input type="date" class="form-control" id="date" wire:model="date_peremption">
                        <div>
                            @error('date_peremption') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="modal-footer" >
                        <button type="button" class="btn" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" wire:click="save" >Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('closeModal', function () {
            $('#exampleModal').modal('hide');
        });
    </script>
@endpush
