@extends('admin.layouts.main')
@section('title', 'Dashboard')
<style>
    .card {
        padding: 10px !important;
    }
</style>
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Contribution</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Contribution</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <!-- <div class="dropdown">
                                            <a href="{{ route('groups.create') }}" class=" btn btn-primary ">Add Group</a>

                                        </div> -->
                    </div>
                </div>
            </div>
            <div class="content-body card ">

                <!-- Basic table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Member Name</th>
                                            <th>Phone</th>
                                            <th>Group Name</th>
                                            <th>Contribution Amount</th>
                                            <th>Status</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contribution as $key => $val)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $val->user->name ?? '' }}</td>
                                                <td>{{$val->user->phone ?? '' }}</td>
                                                <td>{{ $val->group->name ?? '' }}</td>
                                                <td>{{ $val->contributionamount ?? '' }}</td>
                                                <td>
                                                    @if ($val->status == 'pending')
                                                        <span class="badge bg-warning text-dark">Pending</span>
                                                    @elseif ($val->status == 'completed')
                                                        <span class="badge bg-success">Approved</span>
                                                    @elseif ($val->status == 'failed')
                                                        <span class="badge bg-danger">Rejected</span>
                                                    @else
                                                        <span class="badge bg-secondary">Unknown</span>
                                                    @endif
                                                </td>

                                                <!-- <td>
                                                    @if ($val->status == 'pending')
                                                        <button onclick="confirmStatusChange('completed', {{ $val->id }})"
                                                            class="btn btn-success btn-sm">
                                                            Approve
                                                        </button>
                                                        <button onclick="confirmStatusChange('failed', {{ $val->id }})"
                                                            class="btn btn-danger btn-sm">
                                                            Reject
                                                        </button>
                                                    @elseif ($val->status == 'completed')
                                                        <span class="badge bg-success">Approved</span>
                                                    @elseif ($val->status == 'failed')
                                                        <span class="badge bg-danger">Rejected</span>
                                                    @else
                                                        <span class="badge bg-secondary">Unknown</span>
                                                    @endif
                                                </td> -->

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Pagination links -->
                                <div class="d-flex justify-content-center">
                                    {{ $contribution->links() }}
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
    <script src="{{ asset('admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    <script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        function confirmStatusChange(status, id) {
    if (confirm(`Are you sure you want to ${status === 'completed' ? 'approve' : 'reject'} this?`)) {
        changeStatus(status, id);
    }
}

        function changeStatus(status, id) {
            $.ajax({
                url: "{{ route('contribution.status') }}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id,
                    status: status,
                },
                success: function (response) {
                    if (response == 'completed') {
                        showToast('status changes to approve', 'success'); // success toast
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        showToast('status changes to reject', 'success'); // success toast
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function (xhr) {
                    alert("Something went wrong!");
                }
            });
        }
    </script>
@endsection