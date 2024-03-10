@extends('layout.app')

@section('title', 'Vente')

@section('content')
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <!-- Monthly Earnings -->
                <div class="card">
                    <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold"> Monthly Earnings </h5>
                        <h4 class="fw-semibold mb-3">$6,820</h4>
                        <div class="d-flex align-items-center pb-1">
                            <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-down-right text-danger"></i>
                            </span>
                            <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                            <p class="fs-3 mb-0">last year</p>
                        </div>
                        </div>
                        <div class="col-4">
                        <div class="d-flex justify-content-end">
                            <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-currency-dollar fs-6"></i>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div id="earning"></div>
                </div>
            </div>

            

            <div class="col-md-4">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                    <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
                    <div class="row align-items-center">
                        <div class="col-8">
                        <h4 class="fw-semibold mb-3">$36,358</h4>
                        <div class="d-flex align-items-center mb-3">
                            <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                            </span>
                            <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                            <p class="fs-3 mb-0">last year</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                            </div>
                            <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
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
