@extends('user.layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">
            <section id="dashboard-ecommerce">
                <div class="row">
                    <!-- Stat cards -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="card w-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75"></h3>
                                    <span>Total Astrologer</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                    <span class="avatar-content"><i data-feather="user"
                                            class="font-medium-4"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card w-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75"></h3>
                                    <span>Total User</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content"><i data-feather="user-plus"
                                            class="font-medium-4"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card w-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75"></h3>
                                    <span>Total Blog</span>
                                </div>
                                <div class="avatar bg-light-success p-50">
                                    <span class="avatar-content"><i data-feather="user-check"
                                            class="font-medium-4"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card w-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75"></h3>
                                    <span>Total News</span>
                                </div>
                                <div class="avatar bg-light-warning p-50">
                                    <span class="avatar-content"><i data-feather="user-x"
                                            class="font-medium-4"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart -->
                <div class="row">
                    <div class="col-md-6 col-lg-7">
                        <div class="card h-100 ">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="card-title mb-0">
                                    <h5 class="mb-1">Shipment statistics</h5>
                                    <p class="card-subtitle">Total number of Users </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="height:320px; position:relative;">
                                    <canvas id="shipmentsChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5">

                        <div class="card h-100 w-100">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="card-title mb-0">
                                    <h5 class="mb-1">Astrologers vs Users</h5>
                                    <p class="card-subtitle">Distribution of registered accounts</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="height:320px; position:relative;">
                                    <canvas id="astrologerUserChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table Data -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card w-100">
                            <h5 class="card-header">E Books</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@endsection

@section('script')
<script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{ asset('admin/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset('admin/app-assets/js/core/app.js')}}"></script>

{{-- ⚠ remove dashboard-ecommerce.js if it conflicts --}}
{{--
    <script src="{{ asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }

    const ctx = document.getElementById('shipmentsChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul','Aug','Sept','Oct','Nov','Dec'],
            datasets: [{
                label: 'Shipments',
                data: 
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 800,
                easing: 'easeOutQuart'
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 500
                    }
                }
            }
        }
    });
});


const ctxPie = document.getElementById('astrologerUserChart').getContext('2d');

new Chart(ctxPie, {
    type: 'pie',
    data: {
        labels: ['Astrologers', 'Users'],
        datasets: [{
            data: ,
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
<script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
@endsection