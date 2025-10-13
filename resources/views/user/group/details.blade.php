@extends('user.layouts.main')

@section('title', 'Group Details')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">

            <!-- Group & Portal Info -->
            <section class="mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Your Group Details :</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Portal -->
                            <div class="col-md-4">
                                <h5>Portal Name:</h5>
                                <p>{{ $portal->name }}</p>
                                <h5>Group Number:</h5>
                                <p>{{ $group->group_number }}</p>
                                <h5>Start Date :</h5>
                                <p>{{ $portal->start_date}}</p>
                            </div>
                            <!-- Group -->
                            <div class="col-md-4">
                                <h5>Group Name:</h5>
                                <p>{{ $group->name }}</p>
                                <h5>Total Member:</h5>
                                <p>{{ $groupMembers->count() }}</p>
                                <h5>End Date :</h5>
                                <p>{{ $portal->end_date}}</p>
                                <!-- <h5>Current Amount:</h5>
                                <p>{{ number_format($group->current_amount, 2) }}</p> -->
                            </div>
                            <!-- Leader -->
                            <div class="col-md-4">
                                <h5>Leader Name:</h5>
                                <p>{{ $leader->name }}</p>
                                <h5>Leader's Email:</h5>
                                <p>{{ $leader->email }}</p>
                                <h5>Leader's Phone:</h5>
                                <p>{{ $leader->phone }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Project Info -->
                        <div class="row mt-3">
                            <div class="col-md-6">
                                 <h5>Group tittle:</h5>
                                <p>{{ $group->project_name }}</p>
                                <h5>Project Description:</h5>
                                <p>{{ $group->project_description }}</p>
                            </div>
                            <div class="col-md-6">
                                @if($group->logo_path)
                                <h5>Logo:</h5>
                                <img src="{{ asset('storage/'.$group->logo_path) }}" alt="Group Logo" class="img-fluid">
                                @endif

                                @if($group->video_path)
                                <h5>Video:</h5>
                                <video controls class="w-100">
                                    <source src="{{ asset('storage/'.$group->video_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Stats Cards -->
            @php
                    use Carbon\Carbon;

                    $startDate = Carbon::parse($portal->start_date);
                    $endDate   = Carbon::parse($portal->end_date);
                    $diffInDays = $startDate->diffInDays($endDate);
                    // Convert days to weeks (rounded down)
                    $numberOfWeeks = floor($diffInDays / 7);
            @endphp
            <section class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bolder">{{ $group->current_amount }}</h3>
                                <span>Weekly Current Amt</span>
                            </div>
                            <div class="avatar bg-light-danger p-50">
                                <i data-feather="target" class="font-medium-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            
                            <div>
                                <h3 class="fw-bolder">{{ $group->target_amount}}</h3>
                                <span>Total Weekly target</span>
                            </div>
                            <div class="avatar bg-light-primary p-50">
                                <i data-feather="trending-up" class="font-medium-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bolder">{{ $totalBlog ?? 0 }}</h3>
                                <span>Total Current Amount</span>
                            </div>
                            <div class="avatar bg-light-success p-50">
                                <i data-feather="user-check" class="font-medium-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            
                            <div>
                                <h3 class="fw-bolder">{{ ($group->target_amount)* $numberOfWeeks  }}</h3>
                                <span>Total Target Amount</span>
                            </div>
                            <div class="avatar bg-light-warning p-50">
                                <i data-feather="user-x" class="font-medium-4"></i>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    if (feather) feather.replace({ width: 14, height: 14 });
});
</script>
@endsection
