@extends('leader.layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="app-content content ">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">

<div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">User Portal </h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('leader.dashboard') }}">Home</a>
                                    </li>
                                    
                                    <li class="breadcrumb-item active">User Portal Form </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Group Details Card -->
            <div class="card">
                <div class="card-header py-2">
                    <h5 class="m-0 font-weight-bold">Group Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mt-2">
                            <div class="detail-item">
                                <div class="detail-label">Group Name</div>
                                <div class="detail-value">{{ $group->name ?? 'NA' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Group Number</div>
                                <div class="detail-value">{{ $group->group_number ?? 'NA' }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Weekly Target</div>
                                <div class="detail-value">${{ number_format($group->target_amount ?? '00', 2) }}</div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <div class="detail-item">
                                <div class="detail-label">Number of Shares</div>
                                <div class="detail-value">{{ number_format($portalSet->number_of_shares?? '00') }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Price Per Share</div>
                                <div class="detail-value">${{ number_format($portalSet->share_price ?? '00', 2) }}</div>
                            </div>
                            <div class="detail-item">
                                <div class="detail-label">Total Value</div>
                                <div class="detail-value">${{ number_format(($portalSet->number_of_shares ?? 00) * ($portalSet->share_price ?? 00.00), 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Share Purchase Form -->
            <div class="card">
                <div class="card-header py-2">
                    <h5 class="m-0 font-weight-bold">Purchase Shares</h5>
                </div>
                <div class="card-body">
                    <form id="sharePurchaseForm" action="{{ route ('leader.user.portal.store')}}" method="POST">
                        @csrf
                        <div class="mb-3 mt-2">
                            <label for="sharesPerWeek" class="form-label">Number of shares to buy every week</label>
                            <input type="number" class="form-control" id="sharesPerWeek" name="shares_per_week" min="1" required>
                            <div class="form-text">Minimum purchase: 1 share per week</div>
                        </div>
                        <div class="mb-3">
                            <label for="investmentAmount" class="form-label">Estimated weekly investment</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" id="investmentAmount" name="weekly_commitment" readonly>
                            </div>
                            <div class="form-text">Calculated based on current share price</div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit Purchase Request</button>
                        <div class="form-text">Submit purchase Request And Go To Your User Portal</div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

                    

</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<style>
    .detail-item {
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #e3e6f0;
    }
    .detail-label {
        font-weight: 600;
        color: #5a5c69;
    }
    .detail-value {
        color: #858796;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }
    .card-header {
        background-color: #4e73df;
        color: white;
        border-radius: 10px 10px 0 0 !important;
    }
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2e59d9;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sharesInput = document.getElementById('sharesPerWeek');
        const investmentAmount = document.getElementById('investmentAmount');
        const sharePrice = {{ $portalSet->share_price ?? 00.00 }};
        
        sharesInput.addEventListener('input', function() {
            const shares = parseInt(this.value) || 0;
            const total = shares * sharePrice;
            investmentAmount.value = total.toFixed(2);
        });
        
        investmentAmount.value = (1 * sharePrice).toFixed(2);
    });
</script>

@endsection