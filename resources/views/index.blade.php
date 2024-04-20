@extends('layout.app')

@section('title', 'Bienvenue dans PharmaApp')

@section('content')

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">

            <div id="chart"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Total vente mois en cours:</h5>
                <div class="row align-items-center">
                  <div class="col-8">
                    <h4 class="fw-semibold mb-3" id="moyenne_mois"></h4>
                    <div class="d-flex align-items-center mb-3">
                      <span id="icon"
                        class="me-1 rounded-circle  round-20 d-flex align-items-center justify-content-center">
                        <i class="ti "></i>
                      </span>
                      <p class="text-dark me-1 fs-3 mb-0" id="difference"></p>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="me-4">
                        <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                        <span class="fs-2">{{ now()->year }}</span>
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
          <div class="col-lg-12">
            <!-- Monthly Earnings -->
            <div class="card">
              <div class="card-body">
                <div class="row align-items-start">
                  <div class="col-8">
                    <h5 class="card-title mb-9 fw-semibold"> Produit le plus vendu</h5>
                    <h4 class="fw-semibold mb-3" id="mostselled">product.name</h4>
                    <div class="d-flex align-items-center pb-1">
                      <span
                        class="me-2 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                        <i class="ti ti-arrow-up-left text-success"></i>
                      </span>
                      <p class="text-dark me-1 fs-3 mb-0" id="selled_quantity"></p>
                      <p class="fs-3 mb-0">unités vendues</p>
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
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <div class="mb-4">
              <h5 class="card-title fw-semibold">Ventes récentes</h5>
            </div>
            <ul class="timeline-widget mb-0 position-relative mb-n5">
              @forelse ($factures as $facture)

              <li class="timeline-item d-flex position-relative overflow-hidden">
                <div class="timeline-time text-dark flex-shrink-0 text-end">{{ $facture->updated_at->format('d/m H:i') }}</div>
                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                  <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                </div>
                <div class="timeline-desc fs-3 text-dark mt-n1">Achat par {{ $facture->client->nom }} pour un total de {{ number_format($facture->montant_total, 0, ',', ' ') }} {{ session('devise') }} </div>
              </li>

              @empty
              No data
              @endforelse
            </ul>
          </div>

        <div class="text-center mt-5 mb-4">
            <a href="{{route('facture')}}" class="text-primary">Voir plus...</a>
        </div>

        </div>
      </div>
      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Mouvement du stock</h5>
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0"><input type="checkbox" name="" id=""></h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Agent</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Produit</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Motif</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Quantité</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($movements as $movement)

                  <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><input type="checkbox"></h6></td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">{{ $movement->user->name }}</h6>
                        <span class="fw-normal">Agent</span>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{ $movement->produit->nom }}</p>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-{{$movement->movement_type === 'in' ? 'primary' : 'success'}} rounded-3 fw-semibold">{{ $movement->motif }}</span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ $movement->quantite }} unités</h6>
                    </td>
                  </tr>

                  @empty

                  No Data

                  @endforelse

                </tbody>
              </table>
            <div class="text-center">
                <a href="{{route('stock')}}" class="text-primary">Voir plus...</a>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

@endsection

@push('scripts')
  <script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        axios.get('/chart/sell-evolution')
            .then(response => {
            const data = response.data.map(commande => ({
                x: new Date(commande.date).getTime(),
                y: commande.total
            }));

            const options = {
                chart: {
                type: 'line',
                },
                series: [{
                name: 'Ventes',
                data: data
                }],
                xaxis: {
                type: 'datetime'
                }
            };

            const chart = new ApexCharts(document.getElementById('chart'), options);
            chart.render();
            })
            .catch(error => {
            console.error('Error fetching chart data:', error);
            });

            axios.get('/chart/moyenne-mois')
                .then(response => {
                    const data = response.data;
                    document.querySelector('#moyenne_mois').innerHTML = data.vente + data.devise;
                    document.querySelector('#difference').innerHTML = data.difference + "%";
                    const iconElement = document.querySelector('#icon');
                    if (data.difference > 0) {
                        iconElement.classList.remove('bg-light-danger');
                        iconElement.classList.add('bg-light-success');
                        iconElement.querySelector('i').classList.remove('ti-arrow-down-left', 'text-danger');
                        iconElement.querySelector('i').classList.add('ti-arrow-up-left', 'text-success');
                    } else if (data.difference < 0) {
                        iconElement.classList.remove('bg-light-success');
                        iconElement.classList.add('bg-light-danger');
                        iconElement.querySelector('i').classList.remove('ti-arrow-up-left', 'text-success');
                        iconElement.querySelector('i').classList.add('ti-arrow-down-left', 'text-danger');
                    }
                })

                .catch(error => {
                    console.error('Error fetching chart data:', error);
                });
            axios.get('/chart/mostselled')
                .then(response => {
                    const data = response.data;
                    document.querySelector('#mostselled').innerHTML = data.produit;
                    document.querySelector('#selled_quantity').innerHTML = data.quantite;
                })


            axios.get('/chart/moyenne-annee')
                .then(response => {
                    const data = response.data;

                    const options = {
                        chart: {
                            type: 'donut',
                            width: 180,
                            fontFamily: "Plus Jakarta Sans', sans-serif",
                            foreColor: "#adb0bb",
                        },
                        series: data.series,
                        labels: data.labels,
                        plotOptions: {
                            pie: {
                                startAngle: 0,
                                endAngle: 360,
                                donut: {
                                    size: '75%',
                                },
                            },
                        },
                        stroke: {
                            show: false,
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        legend: {
                            show: false,
                        },
                        colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],
                        responsive: [
                                {
                                    breakpoint: 991,
                                    options: {
                                    chart: {
                                        width: 150,
                                    },
                                    },
                                },
                        ],
                        tooltip: {
                            theme: "dark",
                            fillSeriesColor: false,
                        },
                    };

                const chart = new ApexCharts(document.querySelector("#breakup"), options);
                chart.render();
                })
                .catch(error => {
                    console.error('Error fetching chart data:', error);
                });

        });
  </script>


@endpush
