@extends('layout.app')

@section('title', 'Finance')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour aujourd'hui</h5>
                    <p class="card-text">{{ number_format($totalJour, 0, ',', ' ') }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour cette semaine</h5>
                    <p class="card-text">{{ number_format($totalSemaine, 0, ',', ' ') }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour ce mois</h5>
                    <p class="card-text">{{ number_format($totalMois, 0, ',', ' ') }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour ce trimestre</h5>
                    <p class="card-text">{{ number_format($totalTrimestre, 0, ',', ' ') }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour cette année</h5>
                    <p class="card-text">{{ number_format($totalAnnee, 0, ',', ' ') }} {{ session('devise') }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <a href="{{route('finance.portefeuille')}}">
                    <div class="card-body">
                        <h5 class="card-title">Portefeuille</h5>
                        <p class="card-text">{{ number_format($etat_actuelle, 0, ',', ' ') }} {{ session('devise') }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
