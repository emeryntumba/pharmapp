<div class="modal fade" id="Modal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modal2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editer le produit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du produit:</label>
                        <input type="text" class="form-control" id="nom" value="f">
                    </div>

                    <div class="mb-3">
                        <label for="forme" class="form-label">Forme Galenique</label>
                        <select id="forme" class="form-select">
                            <option value="comprimé" selected>Comprimé</option>
                            <option value="sirop">Sirop</option>
                            <option value="sirop">Injectable</option>
                            <option value="suppositoire">Suppositoire</option>
                            <option value="materiel">Materiel médical</option>
                            <option value="autres">Autres</option>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label for="dosage" class="form-label">Dosage :</label>
                        <input type="number" class="form-control" id="dosage"  step="1">
                    </div>

                    <div class="mb-3">
                        <label for="qte" class="form-label">Qté :</label>
                        <input type="number" class="form-control" id="qte"  step="1">
                    </div>

                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix unitaire en {{ session('devise') }}:</label>
                        <input type="number" class="form-control" id="prix"  step="50">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea class="form-control" id="description" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="fabricant" class="form-label">Fabricant:</label>
                        <input type="text" class="form-control" id="fabricant">
                    </div>

                    <div class="mb-3">
                        <label for="code" class="form-label">Code CIP</label>
                        <input type="text" class="form-control" id="code" ">
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date Peremption:</label>
                        <input type="date" class="form-control" id="date" >

                    </div>

                    <div class="modal-footer" >
                        <button type="button" class="btn" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" >Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('closeModal', function () {
            $('#Modal2').modal('hide');
        });
    </script>
@endpush
