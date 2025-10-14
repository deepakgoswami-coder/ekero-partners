@extends('leader.layouts.main')
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
                            <h2 class="content-header-title float-start mb-0">Groups</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Groups</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <!-- <div class="dropdown">
                            <a href="{{ route('leader.groups.create') }}" class=" btn btn-primary ">Add Group</a>

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
                                <table class="table table-bordered  table table-hover table-bordered align-middle text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Portal Name</th>
                                            <th>Leader</th>
                                            <th>Target Amount</th>
                                            <th>Group Number</th>
                                            <th>Current Amount</th>
                                            <!-- <th>Status</th> -->
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($groups as $key => $val)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    <a href="{{route( 'leader.contribution.list',$val->id) }}">
                                                        {{ $val->name ?? '' }}
                                                    </a>
                                                    @if($val->project_name)
                                                        <br><small class="text-muted">{{ $val->project_name }}</small>
                                                    @endif
                                                </td>
                                                <td>{{ $val->leader->name ?? 'Not Assigned' }}</td>
                                                <td>${{ number_format($val->target_amount, 2) }}</td>
                                                <td>
                                                    <span class="badge bg-primary">#{{ $val->group_number }}</span>
                                                </td>
                                              <td>
                                ${{ number_format($val->current_amount, 2) }}<br>
                                @if($val->target_amount > 0)
                                <div class="progress" style="height: 8px; width:100%; margin-top:4px;">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: {{ ($val->current_amount / $val->target_amount) * 100 }}%">
                                    </div>
                                </div>
                                <small>{{ number_format(($val->current_amount/$val->target_amount)*100,1) }}%</small>
                                @endif
                            </td>
                                                <!-- <td>
                                                    @if($val->is_active)
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-secondary">Inactive</span>
                                                    @endif
                                                    <br>
                                                    <small class="text-muted">
                                                        {{ date('M d, Y', strtotime($val->start_date)) }} -
                                                        {{ date('M d, Y', strtotime($val->end_date)) }}
                                                    </small>
                                                </td>
                                               <td>
                                <div class="d-flex flex-column gap-1">
                                    <a href="{{ route('leader.groups.edit', $val->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i data-feather="edit"></i> Edit
                                    </a>
                                    <button class="btn btn-sm btn-primary"data-bs-toggle="modal" data-bs-target="#inviteModal">
                                        <i data-feather="user-plus"></i> Invite
                                    </button>
                                    <button class="btn btn-sm btn-warning text-white" data-bs-toggle="modal" data-bs-target="#addNewCard{{ $val->id }}">
                                        <i data-feather="user-check"></i> Assign
                                    </button>
                                </div>
                            </td> -->
                                                  

                                                <!-- Invite Modal -->
                                                <div class="modal fade" id="inviteModal" tabindex="-1"
                                                    aria-labelledby="inviteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content rounded-3">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="inviteModalLabel">Invite Member
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <p>Share this link to invite a new member:</p>
                                                                <div class="input-group">
                                                                    <input type="text" id="inviteLink" class="form-control"
                                                                        readonly value="{{ route('user.register',$val->invite_link)}}">
                                                                    <button class="btn btn-outline-primary" id="copyBtn">
                                                                        <i class="bi bi-clipboard"></i> Copy
                                                                    </button>
                                                                </div>
                                                                <small class="text-success mt-2 d-none"
                                                                    id="copiedMsg">Copied to clipboard!</small>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                            <div class="modal fade" id="addNewCard{{ $val->id }}" tabindex="-1"
                                                aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-transparent">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body px-sm-5 mx-50 pb-5">
                                                            <h1 class="text-center mb-1" id="addNewCardTitle">Assign Member</h1>
                                                            <p class="text-center">Add member in group</p>

                                                            <form method="post" action="{{ route('leader.group.member.assign') }}"
                                                                class="row gy-1 gx-2 mt-75">
                                                                @csrf
                                                                <div class="row">
                                                                         <input type="hidden" name="group_id"
                                                                        value="{{ $val->id }}">
                                                                    <div class="col-12">
                                                                        <div class="mb-1 mt-1">
                                                                            <label class="form-label" for="basicSelect">
                                                                                Member</label>
                                                                            <select required class="form-select" name="user_id"
                                                                                id="basicSelect">
                                                                                <option value="">Select Member</option>
                                                                                @foreach ($member as $val)
                                                                                    <option value="{{ $val->id }}">{{ $val->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('leader_id')<div class="text text-danger">
                                                                                {{ $message }}
                                                                            </div> @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="mb-1 mt-1">
                                                                            <label class="form-label" for="basicSelect">
                                                                                Weekly Commitment</label>
                                                                            <input type="text" required class="form-control" name="weekly_commitment"
                                                            placeholder="Weekly Commitment"
                                                            value="{{ old('weekly_commitment') }}">
                                                                            @error('weekly_commitment')<div class="text text-danger">
                                                                                {{ $message }}
                                                                            </div> @enderror
                                                                        </div>
                                                                    </div>
                                                                    


                                                                <div class="col-12 text-center">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mt-1">Submit</button>
                                                                    <button type="reset" class="btn btn-outline-secondary mt-1"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        Cancel
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Pagination links -->
                                <div class="d-flex justify-content-center">
                                    {{ $groups->links() }}
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
    </script>
     <script>
document.getElementById('copyBtn').addEventListener('click', function() {
    const linkInput = document.getElementById('inviteLink');
    linkInput.select();
    linkInput.setSelectionRange(0, 99999); // for mobile
    navigator.clipboard.writeText(linkInput.value);
    
    const copiedMsg = document.getElementById('copiedMsg');
    copiedMsg.classList.remove('d-none');
    setTimeout(() => copiedMsg.classList.add('d-none'), 2000);
});
</script>
@endsection