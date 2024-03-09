@extends('layout.app')

@section('title', 'Gestion Produit')

@section('content')
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Medicament en dispo</h5>
                    <livewire:create-produit/>
                    <livewire:produit-component/>
                  </div>
                </div>
              </div>
          </div>
        </div>




@endsection
