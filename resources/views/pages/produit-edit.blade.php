@extends('layout.app')

@section('title', 'Editer le produit')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="{{route('produit.update', $produit->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom du produit:</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="{{$produit->nom}}">
                </div>

                <div class="mb-3">
                    <label for="forme" class="form-label">Forme Galenique</label>
                    <select id="forme" class="form-select" name="forme_galenique">
                        <option value="{{$produit->forme_galenique}}" selected>Comprimé</option>
                        <option value="comprimé">Comprimé</option>
                        <option value="sirop">Sirop</option>
                        <option value="sirop">Injectable</option>
                        <option value="suppositoire">Suppositoire</option>
                        <option value="materiel">Materiel médical</option>
                        <option value="autres">Autres</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="dosage" class="form-label">Dosage :</label>
                    <input type="text" name="dosage" class="form-control" id="dosage"  step="1" value="{{$produit->dosage}}">
                </div>

                <div class="mb-3">
                    <label for="qte" class="form-label">Stock actuel :</label>
                    <div class="d-flex align-items-center"> <!-- Utilisation de flexbox pour regrouper les éléments -->
                        <input type="number" disabled class="form-control me-3" value="{{$produit->stock_state}}"> <!-- Utilisation de "me-3" pour ajouter un espace à droite -->
                        <label for="qte" class="form-label me-2">Ajouter</label> <!-- Utilisation de "me-2" pour ajouter un petit espace à droite -->
                        <input type="number" class="form-control" name="qte" step="1">
                    </div>
                </div>


                <div class="mb-3">
                    <label for="prix" class="form-label">Prix unitaire:</label>
                    <input type="number" name="prix" class="form-control" id="prix"  step="50" value="{{$produit->prix}}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description :</label>
                    <textarea class="form-control" name="description" id="description" >{{$produit->description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="fabricant" class="form-label">Fabricant:</label>
                    <input type="text" name="fabricant" class="form-control" id="fabricant" value="{{$produit->fabricant}}">
                </div>

                <div class="mb-3">
                    <label for="code" class="form-label">Code CIP</label>
                    <input type="text" class="form-control" name="code_CIP" id="code" value="{{$produit->code_CIP}}">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Date Peremption:</label>
                    <input type="date" class="form-control" name="date_peremption" id="date" value="{{$produit->date_peremption}}">

                </div>

                <div class="modal-footer" >
                    <a href="{{route('produit')}}"><button type="button" class="btn">Annuler</button></a>
                    <button type="submit" class="btn btn-primary" >Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
