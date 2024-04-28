@extends('layout.app')

@section('title', 'Finance')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Total des ventes pour aujourd'hui</h5>
                    <p class="card-text fw-bolder fs-5">{{ number_format($totalJour, 0, ',', ' ') }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Total des ventes pour cette semaine</h5>
                    <p class="card-text fw-bolder fs-5">{{ number_format($totalSemaine, 0, ',', ' ') }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Total des ventes pour ce mois</h5>
                    <p class="card-text fw-bolder fs-5">{{ number_format($totalMois, 0, ',', ' ') }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Total des ventes pour ce trimestre</h5>
                    <p class="card-text fw-bolder fs-5">{{ number_format($totalTrimestre, 0, ',', ' ') }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white">
                <div class="card-body">
                    <h5 class="card-title text-white">Total des ventes pour cette année</h5>
                    <p class="card-text fw-bolder fs-5">{{ $totalAnnee }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success">
                <a href="{{route('finance.portefeuille')}}">
                    <div class="card-body text-white">
                        <h5 class="card-title text-white">Portefeuille</h5>
                        <p class="card-text fw-bolder fs-5">{{ $etat_actuelle }} {{ session('devise') }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
