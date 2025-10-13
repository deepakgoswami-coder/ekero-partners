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
                <div class="content-header-left col-md-6 col-12 mb-2">
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


                <div class="content-header-right text-md-end col-md-6 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <!-- <div class="dropdown">
                                <a href="{{ route('leader.create') }}" class=" btn btn-primary ">Add leader</a>

                            </div> -->
                    </div>
                </div>
            </div>
            <div class="content-body card ">
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Name</th>
                                                <th>Target Amount</th>
                                                <th>start_date</th>
                                                <th>End date</th>
                                                <th>Total Cycles</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><a
                                                        href="{{ route('groups.assign.member', $group->id) }}">{{ $group->name ?? '' }}</a>
                                                </td>
                                                <td>{{ $group->target_amount ?? '' }}</td>
                                                <td>{{ $portalSet->start_date ?? '' }}</td>
                                                <td>{{ $portalSet->end_date ?? '' }}</td>
                                                <td>{{ $portalSet->total_portals ?? '' }}</td>
                                                <!-- Invite Member Link -->
                                                <td><a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#inviteModal">Invite
                                                        Member</a></td>

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
                                                                        readonly value="{{ route('user.register',$group->invite_link)}}">
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
        function toggleButton(id) {
            $.ajax({
                url: "{{ route('leader.toggle_user_status') }}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    id: id,
                },
                success: function (response) {
                    if (response == 1) {
                        showToast('status changes to active', 'success'); // success toast
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        showToast('status changes to inactive', 'success'); // success toast
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