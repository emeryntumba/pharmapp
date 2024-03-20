@extends('layout.app')

@section('title', 'Vente')

@section('content')
      <div class="container-fluid">

        <div class="row">
            <div class="col-lg-7 d-flex align-items-stretch">
                <div class="card w-100">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Medicament Disponible</h5>
                    <livewire:test-component/>
                  </div>
                </div>
              </div>
            <div class="card col-lg-5 d-flex align-items-stretch">
              <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Facture</h5>
                <livewire:facture-component/>
              </div>
            </div>
          </div>
        </div>


@endsection
