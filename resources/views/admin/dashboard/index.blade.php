@extends('admin.layouts.main')
 
@section('title', 'Dashboard')
 
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        
        
                <div class="row">
                    <!-- Stat cards  member -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="card w-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $groupCount ?? '00'}}</h3>
                                    <span>Total Group</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                    <span class="avatar-content"><i data-feather="users"
                                            class="font-medium-4"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- week count -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="card w-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $groupMember ?? 00 }}</h3>
                                    <span>Total Member</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content"><i data-feather="loader"
                                            class="font-medium-4"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
 
                    <!-- start date  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="card w-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ $contribution ?? '' }}</h3>
                                    <span>Contribution</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content"><i data-feather="calendar"
                                            class="font-medium-4"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
 
                    <!-- end date -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="card w-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                  <h3 class="fw-bolder mb-75">
    {{ \Carbon\Carbon::parse($portalSet->end_date)->format('M j, Y') ?? '0000-00-00' }}
</h3>

                                    <span>End Date</span>
                                </div>
                                <div class="avatar bg-light-danger p-50">
                                    <span class="avatar-content"><i data-feather="calendar"
                                            class="font-medium-4"></i></span>
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
                <!-- <div class="row mt-4">
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
                </div> -->
 
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