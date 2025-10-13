@extends('user.layouts.main')

@section('title', 'Group Details')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row"></div>
        <div class="content-body">

            <!-- 🟢 Group & Portal Info -->
            <section class="mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Your Group Details :</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Portal Info -->
                            <div class="col-md-4">
                                <h5>Portal Name:</h5>
                                <p>{{ $portal->name }}</p>

                                <h5>Group Number:</h5>
                                <p>{{ $group->group_number }}</p>

                                <h5>Start Date:</h5>
                                <p>{{ \Carbon\Carbon::parse($portal->start_date)->format('d M Y') }}</p>
                            </div>

                            <!-- Group Info -->
                            <div class="col-md-4">
                                <h5>Group Name:</h5>
                                <p>{{ $group->name }}</p>

                                <h5>Total Members:</h5>
                                <p>{{ $groupMembers->count() ?? 0 }}</p>

                                <h5>End Date:</h5>
                                <p>{{ \Carbon\Carbon::parse($portal->end_date)->format('d M Y') }}</p>
                            </div>

                            <!-- Leader Info -->
                            <div class="col-md-4">
                                
                                <h5>Leader Name:</h5>
                                <p>{{ $leader->name }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- 🟢 Project Info -->
                @php
                    use Carbon\Carbon;

                    $currentDate = Carbon::now(); // Current date
                    $startDate = Carbon::parse($portal->start_date);
                    $endDate   = Carbon::parse($portal->end_date);
                    $diffInDays = $startDate->diffInDays($endDate);
                    $diffInDays = $startDate->diffInDays($currentDate);
                    $numberOfWeeks = floor($diffInDays / 7);
                    $currentWeek = ceil(($diffInDays + 1) / 7);
                @endphp

<!-- <p>Current Date: {{ $currentDate->format('d M Y') }}</p>
<p>Portal Start Date: {{ $startDate->format('d M Y') }}</p>
<p>Current Week: {{ $currentWeek }}</p> -->


                <div class="row mt-3">
                    <div class="col-md-4">
                        <h5>Date:</h5>
                        <p>{{ \Carbon\Carbon::now()->format('d M Y') }}</p>
                    </div>

                    <div class="col-md-4">
                        <h5>Week Amount:</h5>
                        <p>{{ number_format($weekAmount ?? 0, 2) }}</p>
                    </div>

                    <div class="col-md-4">
                        <h5>Payment:</h5>
                        <!-- Pay Button -->
                        <form action="{{ route('user.my.contribution.pay')}}" method="POST">
                            @csrf
                            <input type="hidden" name="group_id" value="{{$group->id}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="hidden" name="amount" value="{{ $weeklyCommitment }}">
                            <input type="hidden" name="transaction_id" value="1123456">
                            <input type="hidden" name="week_number" value="{{ $currentWeek }}">
                            <button type="submit" class="btn btn-primary">
                                Pay Now
                            </button>
                        </form>
                    </div>
                </div>


                    </div>
                </div>
            </section>

            <!-- 🟢 Weekly Stats Cards -->
           

            <section class="row">
                <!-- Weekly Current Amount -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bolder">{{ number_format($group->current_amount, 2) }}</h3>
                                <span>Weekly Current Amount</span>
                            </div>
                            <div class="avatar bg-light-danger p-50">
                                <i data-feather="target" class="font-medium-4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Weekly Target -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bolder">{{ number_format($group->target_amount, 2) }}</h3>
                                <span>Weekly Target</span>
                            </div>
                            <div class="avatar bg-light-primary p-50">
                                <i data-feather="trending-up" class="font-medium-4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Current Amount -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bolder">{{ number_format($group->current_amount, 2) }}</h3>
                                <span>Total Current Amount</span>
                            </div>
                            <div class="avatar bg-light-success p-50">
                                <i data-feather="dollar-sign" class="font-medium-4"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Target (All Weeks) -->
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="fw-bolder">{{ number_format($group->target_amount * $numberOfWeeks, 2) }}</h3>
                                <span>Total Target ({{ $numberOfWeeks }} Weeks)</span>
                            </div>
                            <div class="avatar bg-light-warning p-50">
                                <i data-feather="calendar" class="font-medium-4"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

  
            <div>

            </div>


        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                

            </div>
            <div class="content-body card ">
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                        <h4 class="card-title mb-0">My All Contributions</h4>
                    </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Week No.</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Txn Id</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach ($contributions as $contribution)

                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $contribution->week_number }}</td>
                                                    <td>{{ $contribution->amount }}</td>
                                                    <td>{{ $contribution->contribution_date }}</td>
                                                    <td>{{ $contribution->transaction_id }}</td>
                                                </tr>
                                            
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>


                                <!-- Pagination links -->
                                <div class="d-flex justify-content-center">
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
