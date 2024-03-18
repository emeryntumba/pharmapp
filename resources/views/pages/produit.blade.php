@extends('layout.app')

@section('title', 'Gestion Produit')

@section('content')
    <div class="container-fluid">
                @if (session('maj'))
                    <div class="alert alert-success">
                        {{ session('maj') }}
                    </div>
                @elseif (session('enregistrement'))
                    <div class="alert alert-success">
                        {{ session('enregistrement') }}
                    </div>
                @endif
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">

                <div class="card w-100">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Medicament Disponible</h5>
                    <div class="mb-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><span><i class="ti ti-plus"></i></span> Nouveau produit</button>
                    </div>
                    <livewire:produit-component/>
                  </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <livewire:formulaire-produit/>


@endsection
