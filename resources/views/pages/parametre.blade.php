@extends('layout.app')

@section('title', 'Paramètres')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <div class="accordion" id="accordionView">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsOne" aria-expanded="true" aria-controls="collapsOne">
                                Etablissement Infos
                            </button>
                        </h2>
                    </div>
                    <div id="collapsOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionView">
                        <div class="accordion-body">
                            @if (session('success-param'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success-param') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{ route('parametre.update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="etablissement">Nom de l'établissement <span class="text-danger fw-4">*</span></label>
                                            <input type="text" class="form-control" id="etablissement" name="nom_etablissement" value="{{ $etablissement->nom_etablissement }}" >
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="rccm">RCCM</label>
                                            <input type="text" class="form-control" id="rccm" name="rccm" value="{{ $etablissement->rccm }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="idNat">ID Nat</label>
                                            <input type="text" class="form-control" id="idNat" name="id_nat" value="{{ $etablissement->id_nat }}">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="impot">N° Impôt</label>
                                            <input type="text" class="form-control" id="impot" name="num_impot" value="{{ $etablissement->num_impot }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="ordreOperation">Ordre d'opération</label>
                                            <input type="text" class="form-control" id="ordreOperation" name="ordre_operation" value="{{ $etablissement->ordreOperation }}">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="tva">TVA</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="per">%</span>
                                                <input type="text" class="form-control" id="tva" name="tva" value="{{ $etablissement->tva }}" aria-label="tva" aria-describedby="per">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="devise">Devise Symbole</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="devise"><i class="ti ti-cash"></i></span>
                                                <input type="text" class="form-control" id="devise" name="devise" value="{{ $etablissement->devise }}" aria-label="devise" aria-describedby="devise">
                                            </div>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="adresse">Adresse</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="adr"><i class="ti ti-map-pin"></i></span>
                                                <textarea class="form-control" id="adresse" name="adresse" aria-label="adresse" aria-describedby="adr">{{ $etablissement->adresse }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
                            </form>

                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsTwo" aria-expanded="true" aria-controls="collapsTwo">
                                Gérer les utilisateurs
                            </button>
                        </h2>
                    </div>

                    <div id="collapsTwo" class="accordion-collapse show collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionView">
                        <div class="accordion-body">
                            <livewire:users-control/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
