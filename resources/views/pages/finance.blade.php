@extends('layout.app')

@section('title', 'Finance')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour aujourd'hui</h5>
                    <p class="card-text">{{ $totalJour }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour cette semaine</h5>
                    <p class="card-text">{{ $totalSemaine }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour ce mois</h5>
                    <p class="card-text">{{ $totalMois }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour ce trimestre</h5>
                    <p class="card-text">{{ $totalTrimestre }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total des ventes pour cette année</h5>
                    <p class="card-text">{{ $totalAnnee }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
