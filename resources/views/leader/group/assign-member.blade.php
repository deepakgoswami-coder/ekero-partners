@extends('leader.layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">

        <div class="content-header row mb-3">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2 class="text-primary mb-0">{{ $group->name }} Members</h2>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm">
                    <i data-feather="home" class="me-1"></i> Home
                </a>
            </div>
        </div>

        <div class="content-body card ">
            <div class="row">
            <div class="row g-3">
                @foreach ($groupMember as $key => $val)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm rounded-4 border-0" style="background: linear-gradient(135deg, #f6d365, #fda085);">
                        <div class="card-body text-white">
                            <h5 class="card-title">{{ $val->member->name ?? 'N/A' }}</h5>
                            <p class="mb-1"><strong>Phone:</strong> {{ $val->member->phone ?? 'N/A' }}</p>
                            <p class="mb-1"><strong>Email:</strong> {{ $val->member->email ?? 'N/A' }}</p>
                            <p class="mb-1"><strong>Group Share:</strong> {{ $val->group_sare ?? 'N/A' }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-white border-top-0">
                            <a href="{{ route('leader.member.details', $val->user_id) }}" class="btn btn-sm btn-light text-primary">
                                <i data-feather="eye"></i> View
                            </a>
                            <form action="{{ route('portal.members.remove', [$val->user_id, $val->group_id]) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to remove this member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i data-feather="trash-2"></i> Remove
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $groupMember->links() }}
            </div>
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
            feather.replace({ width: 14, height: 14 });
        }
    })
</script>
@endsection
