@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Bienvenidos al Sistema Catastral de </h4>
        </div>
    </div>

    @can('dashboard')
        <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Fichas Individuales</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        <h3 class="mb-2">{{ $fichaindividual }}</h3>
                                        <div class="d-flex align-items-baseline">

                                            <p class="text-success">
                                                <span>Estado de Llenado</span>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Fichas Cotitularidades</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        <h3 class="mb-2">{{ $fichacotitularidad }}</h3>
                                        <div class="d-flex align-items-baseline">

                                            <p class="text-success">
                                                <span>Estado de Llenado</span>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <h6 class="card-title mb-0">Fichas Economicas</h6>
                                </div>
                                <div class="row">
                                    <div class="col-6 col-md-12 col-xl-5">
                                        <h3 class="mb-2">{{ $fichaeconomica }}</h3>
                                        <div class="d-flex align-items-baseline">

                                            <p class="text-success">
                                                <span>Estado de Llenado</span>
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-6 col-md-12 col-xl-7">
                                        <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Fichas por Sectores</h6>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-7">

                            </div>
                        </div>
                        <canvas id="chartjsGroupedBar" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-6 col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Fichas por Clasificacion</h6>
                        </div>

                        <canvas id="chartjsArea"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Fichas tipo de Titulares</h6>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-12">

                            </div>
                        </div>
                        <canvas id="chartjsDoughnut"></canvas>
                    </div>
                </div>
            </div>
        </div> <!-- row -->

        <div class="row">
            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Tipo de Fichas</h6>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-12">

                            </div>
                        </div>
                        <canvas id="chartjsBar" height="90"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Total Lotes Catastrados por Sector: {{ $totallotes }} </h6>
                        <div class="flot-chart-wrapper">
                            <div class="flot-chart" id="flotPie"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Porcentaje de Avance de Llenado</h6>
                        <div id="apexRadialBar"></div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Actividades Economicas</h6>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <canvas id="actividadeseconomicas" height="150"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-6 col-xl-6 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Cantidad Tipo de Vias</h6>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <canvas id="viasGrafico" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xl-6 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Niveles</h6>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <canvas id="nivelesGrafico" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xl-6 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Material</h6>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <canvas id="materialesGrafico" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-6 col-xl-6 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Conservacion</h6>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <canvas id="conservacionGrafico" height="150"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-xl-12 grid-margin stretch-card">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-4 mb-md-3">
                            <h6 class="card-title mb-0">Construccion</h6>
                        </div>
                        <div class="row align-items-start mb-2">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <canvas id="construccionGrafico" height="150"></canvas>
                    </div>
                </div>
            </div>

        </div> <!-- row -->
    @endcan
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        if ($('#customersChart').length) {
            var options1 = {
                chart: {
                    type: "line",
                    height: 60,
                    sparkline: {
                        enabled: !0
                    }
                },
                series: [{
                    name: '',
                    data: [<?php foreach ($fichaindividualestado as $ficha) {
                        echo '"' . $ficha->cantidad . '",';
                    } ?>]
                }],
                xaxis: {
                    type: 'name',
                    categories: [<?php foreach ($fichaindividualestado as $ficha) {
                        echo '"' . $ficha->estadollenado->desc_codigo . '",';
                    } ?>],
                },
                stroke: {
                    width: 2,
                    curve: "smooth"
                },
                markers: {
                    size: 0
                },
                colors: ['#289e4f'],
            };
            new ApexCharts(document.querySelector("#customersChart"), options1).render();
        }

        if ($('#ordersChart').length) {
            var options2 = {
                chart: {
                    type: "bar",
                    height: 60,
                    sparkline: {
                        enabled: !0
                    }
                },
                plotOptions: {
                    bar: {
                        borderRadius: 2,
                        columnWidth: "60%"
                    }
                },
                colors: ['#289e4f'],
                series: [{
                    name: '',
                    data: [<?php foreach ($fichacotitularidadestado as $ficha) {
                        echo '"' . $ficha->cantidad . '",';
                    } ?>]
                }],
                xaxis: {
                    type: 'name',
                    categories: [<?php foreach ($fichacotitularidadestado as $ficha) {
                        echo '"' . $ficha->estadollenado->desc_codigo . '",';
                    } ?>],
                },
            };
            new ApexCharts(document.querySelector("#ordersChart"), options2).render();
        }


        // Growth Chart
        if ($('#growthChart').length) {
            var options3 = {
                chart: {
                    type: "line",
                    height: 60,
                    sparkline: {
                        enabled: !0
                    }
                },
                series: [{
                    name: '',
                    data: [<?php foreach ($fichaeconomicaestado as $ficha) {
                        echo '"' . $ficha->cantidad . '",';
                    } ?>]
                }],
                xaxis: {
                    type: 'name',
                    categories: [<?php foreach ($fichaeconomicaestado as $ficha) {
                        echo '"' . $ficha->estadollenado->desc_codigo . '",';
                    } ?>],
                },
                stroke: {
                    width: 2,
                    curve: "smooth"
                },
                markers: {
                    size: 0
                },
                colors: ['#289e4f'],
            };
            new ApexCharts(document.querySelector("#growthChart"), options3).render();
        }
        // Growth Chart - END
        var fontFamily = "'Roboto', Helvetica, sans-serif"
        // Grouped Bar Chart
        if ($('#chartjsGroupedBar').length) {
            new Chart($('#chartjsGroupedBar'), {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($fichassectores as $ficha) {
                        echo '"' . $ficha->nomb_sector . '",';
                    } ?>],
                    datasets: [{
                            label: "Fichas",
                            backgroundColor: ["#68da3e", "#00c6ab", "#6aa3b4", "#416864", "#223026", "#ebb7ce",
                                "#b38471", "#5c5e36", "#1d3d33", "#0c181c", "#ebe6ea", "#e4c5c4", "#c8ad8d",
                                "#6f7357", "#273a2d", "#20c67a", "#3f8880", "#9dc09d", "#fef6cd", "#d6ebc1",
                                "#ff8862", "#be6167", "#7b3ea0", "#0076a1", "#3da3a7", "#ffd3ff", "#a83f6c",
                                "#a8a8ff", "#00c162", "#008bde", "#5749dd", "#70271c", "#a16f40", "#dccf6a",
                                "#51f68d", "#ecc402", "#e570be", "#db54a4", "#e0314a", "#ad0244", "#643d85",
                                "#a62fd6", "#939924", "#af9fec", "#e899d1", "#ff9177", "#fc8526"
                            ],
                            data: [<?php foreach ($fichassectores as $ficha) {
                                echo '"' . $ficha->cantidad . '",';
                            } ?>]
                        }

                    ]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: "#000",
                                font: {
                                    size: '13px',
                                    family: fontFamily
                                }
                            }
                        },
                    },
                    scales: {
                        x: {
                            display: true,
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        },
                        y: {
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        }


        // Bar chart
        if ($('#chartjsBar').length) {
            new Chart($("#chartjsBar"), {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($fichastipo as $ficha) {
                        if ($ficha->tipo_ficha == '01') {
                            echo '"Ficha Individual",';
                        }
                        if ($ficha->tipo_ficha == '02') {
                            echo '"Ficha Cotitularidad",';
                        }
                        if ($ficha->tipo_ficha == '03') {
                            echo '"Ficha Economica",';
                        }
                        if ($ficha->tipo_ficha == '04') {
                            echo '"Ficha Bien Comun",';
                        }
                        if ($ficha->tipo_ficha == '05') {
                            echo '"Ficha Bien Cultural",';
                        }
                        if ($ficha->tipo_ficha == '06') {
                            echo '"Ficha Rural",';
                        }
                    } ?>],
                    datasets: [{
                        label: "Fichas",
                        backgroundColor: ["#68da3e", "#00c6ab", "#6aa3b4", "#416864", "#223026", "#ebb7ce",
                            "#b38471", "#5c5e36", "#1d3d33", "#0c181c", "#ebe6ea", "#e4c5c4", "#c8ad8d",
                            "#6f7357", "#273a2d", "#20c67a", "#3f8880", "#9dc09d", "#fef6cd", "#d6ebc1",
                            "#ff8862", "#be6167", "#7b3ea0", "#0076a1", "#3da3a7", "#ffd3ff", "#a83f6c",
                            "#a8a8ff", "#00c162", "#008bde", "#5749dd", "#70271c", "#a16f40", "#dccf6a",
                            "#51f68d", "#ecc402", "#e570be", "#db54a4", "#e0314a", "#ad0244", "#643d85",
                            "#a62fd6", "#939924", "#af9fec", "#e899d1", "#ff9177", "#fc8526"
                        ],
                        data: [<?php foreach ($fichastipo as $ficha) {
                            echo '"' . $ficha->cantidad . '",';
                        } ?>],
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },
                    },
                    scales: {
                        x: {
                            display: true,
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        },
                        y: {
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        }


        if ($('#chartjsArea').length) {
            new Chart($("#chartjsArea"), {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($fichascalificacion as $ficha) {
                        echo '"' . $ficha->clasificacions->desc_codigo . '",';
                    } ?>],
                    datasets: [{
                        label: "",
                        backgroundColor: ["#68da3e", "#00c6ab", "#6aa3b4", "#416864", "#223026", "#ebb7ce",
                            "#b38471", "#5c5e36", "#1d3d33", "#0c181c", "#ebe6ea", "#e4c5c4", "#c8ad8d",
                            "#6f7357", "#273a2d", "#20c67a", "#3f8880", "#9dc09d", "#fef6cd", "#d6ebc1",
                            "#ff8862", "#be6167", "#7b3ea0", "#0076a1", "#3da3a7", "#ffd3ff", "#a83f6c",
                            "#a8a8ff", "#00c162", "#008bde", "#5749dd", "#70271c", "#a16f40", "#dccf6a",
                            "#51f68d", "#ecc402", "#e570be", "#db54a4", "#e0314a", "#ad0244", "#643d85",
                            "#a62fd6", "#939924", "#af9fec", "#e899d1", "#ff9177", "#fc8526"
                        ],
                        data: [<?php foreach ($fichascalificacion as $ficha) {
                            echo '"' . $ficha->cantidad . '",';
                        } ?>],
                    }]
                },
                options: {
                    indexAxis: 'y',
                    plugins: {
                        legend: {
                            display: false
                        },
                    },
                    scales: {
                        x: {
                            display: true,
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        },
                        y: {
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        }


        // Doughnut Chart
        if ($('#chartjsDoughnut').length) {
            new Chart($('#chartjsDoughnut'), {
                type: 'doughnut',
                data: {
                    labels: ["Natural", "Juridica"],
                    datasets: [{
                        label: "Tipo Persona Titular",
                        backgroundColor: ['#68da3e', "#00c6ab"],
                        borderColor: "#fff",
                        data: ['{{ $fichaspersona }}', '{{ $fichaspersona2 }}'],
                    }]
                },
                options: {
                    aspectRatio: 2,
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: "#000",
                                font: {
                                    size: '13px',
                                    family: fontFamily
                                }
                            }
                        },
                    }
                }
            });
        }



        var fontFamily = "'Roboto', Helvetica, sans-serif"

        // Pie Chart
        $.plot($('#flotPie'), [
            <?php foreach ($totallotessector as $ficha) {
                echo '{ label: "' . $ficha->nomb_sector . '",data:' . $ficha->cantidad . '},';
            } ?>
        ], {
            series: {
                shadowSize: 0,
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.5,
                    stroke: {
                        color: "#fff",
                        width: 3
                    },
                    label: {
                        show: true,
                        radius: 3 / 4,
                        background: {
                            opacity: 0.5
                        },

                        formatter: function(label, series) {
                            return '<div style="font-size:11px;text-align:center;color:white;">' + Math.round(
                                series.percent) + '%</div>';
                        }
                    }
                }
            },

            grid: {
                color: "#000",
                borderColor: "rgba(77, 138, 240, .15)",
                borderWidth: 1,
                hoverable: true,
                clickable: true
            },

            xaxis: {
                tickColor: "rgba(77, 138, 240, .15)"
            },
            yaxis: {
                tickColor: "rgba(77, 138, 240, .15)"
            },
            legend: {
                backgroundColor: "#fff"
            },
            colors: ["#68da3e", "#00c6ab", "#6aa3b4", "#416864", "#223026", "#ebb7ce", "#b38471", "#5c5e36",
                "#1d3d33", "#0c181c", "#ebe6ea", "#e4c5c4", "#c8ad8d", "#6f7357", "#273a2d", "#20c67a",
                "#3f8880", "#9dc09d", "#fef6cd", "#d6ebc1", "#ff8862", "#be6167", "#7b3ea0", "#0076a1",
                "#3da3a7", "#ffd3ff", "#a83f6c", "#a8a8ff", "#00c162", "#008bde", "#5749dd", "#70271c",
                "#a16f40", "#dccf6a", "#51f68d", "#ecc402", "#e570be", "#db54a4", "#e0314a", "#ad0244",
                "#643d85", "#a62fd6", "#939924", "#af9fec", "#e899d1", "#ff9177", "#fc8526"
            ]
        });

        // Apex Radialbar chart start
        if ($('#apexRadialBar').length) {
            var options = {
                chart: {
                    height: 300,
                    type: "radialBar",
                    parentHeightOffset: 0,
                    foreColor: "#000",
                    background: "#fff",
                    toolbar: {
                        show: false
                    },
                },
                theme: {
                    mode: 'light'
                },
                tooltip: {
                    theme: 'light'
                },
                colors: ["#68da3e", "#00c6ab", "#6aa3b4", "#416864", "#223026", "#ebb7ce", "#b38471", "#5c5e36",
                    "#1d3d33", "#0c181c", "#ebe6ea", "#e4c5c4", "#c8ad8d", "#6f7357", "#273a2d", "#20c67a",
                    "#3f8880", "#9dc09d", "#fef6cd", "#d6ebc1", "#ff8862", "#be6167", "#7b3ea0", "#0076a1",
                    "#3da3a7", "#ffd3ff", "#a83f6c", "#a8a8ff", "#00c162", "#008bde", "#5749dd", "#70271c",
                    "#a16f40", "#dccf6a", "#51f68d", "#ecc402", "#e570be", "#db54a4", "#e0314a", "#ad0244",
                    "#643d85", "#a62fd6", "#939924", "#af9fec", "#e899d1", "#ff9177", "#fc8526"
                ],
                fill: {

                },
                grid: {
                    padding: {
                        top: 10
                    }
                },
                plotOptions: {
                    radialBar: {
                        dataLabels: {
                            total: {
                                show: true,
                                label: 'TOTAL',
                                fontSize: '14px',
                                fontFamily: "'Roboto', Helvetica, sans-serif",
                            }
                        },
                        track: {
                            background: "rgba(77, 138, 240, .15)",
                            strokeWidth: '100%',
                            opacity: 1,
                            margin: 5,
                        },
                    }
                },
                series: [{{ $porcentajeindividual }}, {{ $porcentajeeconomica }}, {{ $porcentajecotitular }},
                    {{ $porcentajebiencomun }}
                ],
                labels: ["F. Individual", "F. Economica", "F. Cotitularidad", "F. Bien Comun"],
                legend: {
                    show: true,
                    position: "top",
                    horizontalAlign: 'center',
                    fontFamily: "'Roboto', Helvetica, sans-serif",
                    itemMargin: {
                        horizontal: 8,
                        vertical: 0
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#apexRadialBar"), options);
            chart.render();
            var chartAreaBounds = chart.w.globals.dom.baseEl.querySelector('.apexcharts-inner').getBoundingClientRect();
        }

        new Chart($("#actividadeseconomicas"), {
            type: 'bar',
            data: {
                labels: [<?php foreach ($fichaactividades as $ficha) {
                    echo '"' . $ficha->desc_actividad . '",';
                } ?>],
                datasets: [{
                    label: "Fichas",
                    backgroundColor: ["#68da3e", "#00c6ab", "#6aa3b4", "#416864", "#223026", "#ebb7ce",
                        "#b38471", "#5c5e36", "#1d3d33", "#0c181c", "#ebe6ea", "#e4c5c4", "#c8ad8d",
                        "#6f7357", "#273a2d", "#20c67a", "#3f8880", "#9dc09d", "#fef6cd", "#d6ebc1",
                        "#ff8862", "#be6167", "#7b3ea0", "#0076a1", "#3da3a7", "#ffd3ff", "#a83f6c",
                        "#a8a8ff", "#00c162", "#008bde", "#5749dd", "#70271c", "#a16f40", "#dccf6a",
                        "#51f68d", "#ecc402", "#e570be", "#db54a4", "#e0314a", "#ad0244", "#643d85",
                        "#a62fd6", "#939924", "#af9fec", "#e899d1", "#ff9177", "#fc8526"
                    ],
                    data: [<?php foreach ($fichaactividades as $ficha) {
                        echo '"' . $ficha->cantidad . '",';
                    } ?>],
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    },
                },
                scales: {
                    x: {
                        display: true,
                        grid: {
                            display: true,
                            color: "rgba(77, 138, 240, .15)",
                            borderColor: "rgba(77, 138, 240, .15)",
                        },
                        ticks: {
                            color: "#000",
                            font: {
                                size: 12
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: true,
                            color: "rgba(77, 138, 240, .15)",
                            borderColor: "rgba(77, 138, 240, .15)",
                        },
                        ticks: {
                            color: "#000",
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
        // Apex Radialbar chart end

        // Grafico Vias
        var fontFamily = "'Roboto', Helvetica, sans-serif"
        // Grouped Bar Chart
        if ($('#viasGrafico').length) {
            new Chart($('#viasGrafico'), {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($vias as $via) {
                        echo '"' . $via->tipo_via . '",';
                    } ?>],
                    datasets: [{
                            label: "Vias",
                            backgroundColor: ["#68da3e", "#00c6ab", "#6aa3b4", "#416864", "#223026", "#ebb7ce",
                                "#b38471", "#5c5e36", "#1d3d33", "#0c181c", "#ebe6ea", "#e4c5c4", "#c8ad8d",
                                "#6f7357", "#273a2d", "#20c67a", "#3f8880", "#9dc09d", "#fef6cd", "#d6ebc1",
                                "#ff8862", "#be6167", "#7b3ea0", "#0076a1", "#3da3a7", "#ffd3ff", "#a83f6c",
                                "#a8a8ff", "#00c162", "#008bde", "#5749dd", "#70271c", "#a16f40", "#dccf6a",
                                "#51f68d", "#ecc402", "#e570be", "#db54a4", "#e0314a", "#ad0244", "#643d85",
                                "#a62fd6", "#939924", "#af9fec", "#e899d1", "#ff9177", "#fc8526"
                            ],
                            data: [<?php foreach ($vias as $via) {
                                echo '"' . $via->total . '",';
                            } ?>]
                        }

                    ]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: "#000",
                                font: {
                                    size: '13px',
                                    family: fontFamily
                                }
                            }
                        },
                    },
                    scales: {
                        x: {
                            display: true,
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        },
                        y: {
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        }

        if ($('#nivelesGrafico').length) {
            new Chart($('#nivelesGrafico'), {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($niveles as $nivel) {
                        echo '"' . $nivel->max_nivel . '",';
                    } ?>],
                    datasets: [{
                            label: "Niveles",
                            backgroundColor: ["#68da3e", "#00c6ab", "#6aa3b4", "#416864", "#223026", "#ebb7ce",
                                "#b38471", "#5c5e36", "#1d3d33", "#0c181c", "#ebe6ea", "#e4c5c4", "#c8ad8d",
                                "#6f7357", "#273a2d", "#20c67a", "#3f8880", "#9dc09d", "#fef6cd", "#d6ebc1",
                                "#ff8862", "#be6167", "#7b3ea0", "#0076a1", "#3da3a7", "#ffd3ff", "#a83f6c",
                                "#a8a8ff", "#00c162", "#008bde", "#5749dd", "#70271c", "#a16f40", "#dccf6a",
                                "#51f68d", "#ecc402", "#e570be", "#db54a4", "#e0314a", "#ad0244", "#643d85",
                                "#a62fd6", "#939924", "#af9fec", "#e899d1", "#ff9177", "#fc8526"
                            ],
                            data: [<?php foreach ($niveles as $nivel) {
                                echo '"' . $nivel->cantidad_fichas . '",';
                            } ?>]
                        }

                    ]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: "#000",
                                font: {
                                    size: '13px',
                                    family: fontFamily
                                }
                            }
                        },
                    },
                    scales: {
                        x: {
                            display: true,
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        },
                        y: {
                            grid: {
                                display: true,
                                color: "rgba(77, 138, 240, .15)",
                                borderColor: "rgba(77, 138, 240, .15)",
                            },
                            ticks: {
                                color: "#000",
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        }

        new Chart($('#materialesGrafico'), {
        type: 'bar',
        data: {
            labels: [<?php echo implode(',', $uniquePisos->toArray()); ?>], // Eje X: representa los pisos
            datasets: [
                <?php foreach ($dataByMaterial as $dataset): ?>
                {
                    label: "<?php echo $dataset['label']; ?>",
                    backgroundColor: "<?php echo $dataset['backgroundColor']; ?>",
                    data: [<?php echo implode(',', $dataset['data']); ?>]
                },
                <?php endforeach; ?>
            ]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: "#000",
                        font: {
                            size: '13px',
                            family: fontFamily
                        }
                    }
                }
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Pisos',
                        color: "#000",
                        font: {
                            size: 14
                        }
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Cantidad de Niveles',
                        color: "#000",
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });

    new Chart($('#conservacionGrafico'), {
        type: 'bar',
        data: {
            labels: [<?php echo implode(',', $uniquePisosMateriales->toArray()); ?>], // Eje X: representa los pisos
            datasets: [
                <?php foreach ($dataByConservacion as $dataset): ?>
                {
                    label: "<?php echo $dataset['label']; ?>",
                    backgroundColor: "<?php echo $dataset['backgroundColor']; ?>",
                    data: [<?php echo implode(',', $dataset['data']); ?>]
                },
                <?php endforeach; ?>
            ]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: "#000",
                        font: {
                            size: '13px',
                            family: fontFamily
                        }
                    }
                }
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Pisos',
                        color: "#000",
                        font: {
                            size: 14
                        }
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Cantidad de Niveles',
                        color: "#000",
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });

    new Chart($('#construccionGrafico'), {
        type: 'bar',
        data: {
            labels: [<?php echo implode(',', $uniquePisosConstruccion->toArray()); ?>], // Eje X: representa los pisos
            datasets: [
                <?php foreach ($dataByConstrucciones as $dataset): ?>
                {
                    label: "<?php echo $dataset['label']; ?>",
                    backgroundColor: "<?php echo $dataset['backgroundColor']; ?>",
                    data: [<?php echo implode(',', $dataset['data']); ?>]
                },
                <?php endforeach; ?>
            ]
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        color: "#000",
                        font: {
                            size: '13px',
                            family: fontFamily
                        }
                    }
                }
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Pisos',
                        color: "#000",
                        font: {
                            size: 14
                        }
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Cantidad de Niveles',
                        color: "#000",
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });


    </script>
@endpush
