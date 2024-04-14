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
                <div class="row alig n-items-start">
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
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <div class="mb-4">
              <h5 class="card-title fw-semibold">Recent Transactions</h5>
            </div>
            <ul class="timeline-widget mb-0 position-relative mb-n5">
              <li class="timeline-item d-flex position-relative overflow-hidden">
                <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                  <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                </div>
                <div class="timeline-desc fs-3 text-dark mt-n1">Payment received from John Doe of $385.90</div>
              </li>
              <li class="timeline-item d-flex position-relative overflow-hidden">
                <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                  <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                </div>
                <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
                    href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
                </div>
              </li>
              <li class="timeline-item d-flex position-relative overflow-hidden">
                <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                  <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                </div>
                <div class="timeline-desc fs-3 text-dark mt-n1">Payment was made of $64.95 to Michael</div>
              </li>
              <li class="timeline-item d-flex position-relative overflow-hidden">
                <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                  <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                </div>
                <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
                    href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
                </div>
              </li>
              <li class="timeline-item d-flex position-relative overflow-hidden">
                <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                  <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                </div>
                <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival recorded
                </div>
              </li>
              <li class="timeline-item d-flex position-relative overflow-hidden">
                <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                  <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                </div>
                <div class="timeline-desc fs-3 text-dark mt-n1">Payment Done</div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Id</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Assigned</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Name</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Priority</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Budget</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">1</h6></td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                        <span class="fw-normal">Web Designer</span>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">Elite Admin</p>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-primary rounded-3 fw-semibold">Low</span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">$3.9</h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">2</h6></td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">Andrew McDownland</h6>
                        <span class="fw-normal">Project Manager</span>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">Real Homes WP Theme</p>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-secondary rounded-3 fw-semibold">Medium</span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">$24.5k</h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">3</h6></td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">Christopher Jamil</h6>
                        <span class="fw-normal">Project Manager</span>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">MedicalPro WP Theme</p>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-danger rounded-3 fw-semibold">High</span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">$12.8k</h6>
                    </td>
                  </tr>
                  <tr>
                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">4</h6></td>
                    <td class="border-bottom-0">
                        <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                        <span class="fw-normal">Frontend Engineer</span>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">Hosting Press HTML</p>
                    </td>
                    <td class="border-bottom-0">
                      <div class="d-flex align-items-center gap-2">
                        <span class="badge bg-success rounded-3 fw-semibold">Critical</span>
                      </div>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">$2.4k</h6>
                    </td>
                  </tr>
                </tbody>
              </table>
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
