@extends('layout.app')

@section('title', 'Mouvements du produit')

@section('content')

<div class="container-fluid">
    <div class="row">
        <h1 class="">{{$produit->nom}}</h1>
        <div class="col-md-6">
            <livewire:detail-vente-produit :produit="$produit"/>
        </div>


        <div class="col-md-4 mt-5">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
                <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Résumé</h5>
                <div class="row align-items-center">
                    <div class="col-8">
                    <h4 class="fw-semibold mb-3">{{$produit->prix * $totalVendu}} FC</h4>
                    <div class="d-flex align-items-center mb-3">
                        <span
                        class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                        <i class="ti ti-arrow-left text-success"></i>
                        </span>
                        <p class="text-dark me-1 fs-3 mb-0">+{{$totalEntree}}</p>
                        <p class="fs-3 mb-0">mois en cours</p>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <span
                        class="me-1 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                        <i class="ti ti-arrow-right text-danger"></i>
                        </span>
                        <p class="text-dark me-1 fs-3 mb-0">-{{$totalVendu}}</p>
                        <p class="fs-3 mb-0">mois en cours</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="me-4">
                        <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                        <span class="fs-2">{{now()->locale('fr_FR')->format('F')}}</span>
                        </div>
                        <div>
                        <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                        <span class="fs-2">{{now()->locale('fr_FR')->year}}</span>
                        </div>
                    </div>
                    </div>
                    <div class="col-4">
                    <div class="d-flex justify-content-center">
                        <div id="breakup"></div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
    </div>
</div>

@endsection
