@extends('layout.app')


@section('title', 'Enregistrement Produit')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form action="{{route('produit.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom du produit:</label>
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>

                <div class="mb-3">
                    <label for="forme" class="form-label">Forme Galenique</label>
                    <select name="forme_galenique" id="forme" class="form-select">
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
                    <input type="number" class="form-control" id="dosage" name="dosage" step="1" required>

                </div>

                <div class="mb-3">
                    <label for="qte" class="form-label">Qté :</label>
                    <input type="number" class="form-control" id="qte" name="qte" step="1" required>

                </div>

                <div class="mb-3">
                    <label for="prix" class="form-label">Prix unitaire:</label>
                    <input type="number" class="form-control" id="prix" name="prix"  required>

                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description :</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="fabricant" class="form-label">Fabricant:</label>
                    <input type="text" class="form-control" id="fabricant" name="fabricant">
                </div>

                <div class="mb-3">
                    <label for="code" class="form-label">Code CIP</label>
                    <input type="text" class="form-control" id="code" name="code_CIP">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date Peremption:</label>
                    <input type="date" class="form-control" id="date" name="date_peremption" required>

                </div>

                <div class="modal-footer" >
                    <a href="{{route('produit')}}"><button type="button" class="btn">Annuler</button></a>
                    <button type="submit" class="btn btn-primary mx-2">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
