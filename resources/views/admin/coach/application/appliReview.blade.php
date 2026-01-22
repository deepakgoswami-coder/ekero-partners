@extends('admin.layouts.main')

@section('title', 'Application Review')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Application Review</h1>
                        </div>
                        <div class="col-sm-12 px-0">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{route('coach.applicationList')}}">Applications</a>
                                </li>
                                <li class="breadcrumb-item active">Review</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-10 col-lg-12">
                            <div class="card shadow-sm">
                                <div
                                    class="card-header d-flex align-items-center justify-content-between border-bottom border-[#cccc]">
                                    <!-- <div class="d-flex justify-content-between align-items-center"> -->
                                    <div class="">
                                        <h5 class="card-title mb-0">Candidate Details</h5>
                                        <small class="card-subtitle">Application ID: {{ $application->id }}</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <span class="avatar-initial rounded badge bg-label-warning me-3" style="padding: 10px 20px;">&nbsp;&nbsp;
                                            <i class="bi bi-calendar-event mr-1"></i>
                                            {{ \Carbon\Carbon::parse($application->created_at)->format('M d, Y') }}
                                        </span>
                                        @if($application->status == 'reviewed')
                                            <span class="badge rounded bg-label-warning" style="padding: 10px 20px;">Reviewed</span>
                                        @elseif($application->status == 'accepted')
                                            <span class="badge rounded bg-label-success" style="padding: 10px 20px;">Accepted</span>
                                        @elseif($application->status == 'rejected')
                                            <span class="badge rounded bg-label-danger" style="padding: 10px 20px;">Rejected</span>
                                        @else
                                            <span class="badge rounded bg-label-info" style="padding: 10px 20px;">{{ ucfirst($application->status) }}</span>
                                        @endif
                                    </div>
                                    <!-- </div> -->
                                </div>

                                <div class="card-body pt-3">
                                    <div class="row">
                                        <!-- Full Name -->
                                        <div class="col-md-4 mb-3">
                                            <div class="border rounded p-1 h-auto">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="mr-2 text-primary">
                                                        <i class="bi bi-person  me-1"></i>
                                                    </span>
                                                    <small class="text-muted font-weight-bold text-uppercase">Full
                                                        Name</small>
                                                </div>
                                                <div class="font-weight-medium h5 mb-0">
                                                    {{ $application->full_name }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Contact Number -->
                                        <div class="col-md-4 mb-3">
                                            <div class="border rounded p-1 h-auto">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="mr-2 text-primary">
                                                        <i class="bi bi-telephone me-1"></i>
                                                    </span>
                                                    <small class="text-muted font-weight-bold text-uppercase">Contact
                                                        Number</small>
                                                </div>
                                                <div class="font-weight-medium h5 mb-0">
                                                    {{ $application->mobile }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Email Address -->
                                        <div class="col-md-4 mb-3">
                                            <div class="border rounded p-1 h-auto">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="mr-2 text-primary">
                                                        <i class="bi bi-envelope  me-1"></i>
                                                    </span>
                                                    <small class="text-muted font-weight-bold text-uppercase">Email
                                                        Address</small>
                                                </div>
                                                <div class="font-weight-medium h5 mb-0">
                                                    {{ $application->email }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- CV -->
                                        @if($application->cv_path)
                                            <div class="col-12 mb-4">
                                                <div class="border rounded p-1 shadow-none">
                                                    <div
                                                        class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                                                        <div class="d-flex align-items-baseline gap-1">
                                                            <div class="mr-3 text-danger">
                                                                <i class="bi bi-filetype-pdf fa-2x"></i>
                                                            </div>

                                                            <div>
                                                                <div class="font-weight-bold mb-0">Curriculum Vitae</div>
                                                                <small class="text-muted">
                                                                    Uploaded on
                                                                    {{ \Carbon\Carbon::parse($application->created_at)->format('F j, Y') }}
                                                                </small>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3 mt-md-0">
                                                            <a href="{{ Storage::url($application->cv_path) }}" target="_blank"
                                                                class="btn btn-outline-primary btn-sm mr-2">
                                                                <i class="bi bi-eyeglasses mr-1"></i> View
                                                            </a>

                                                            <a href="{{ Storage::url($application->cv_path) }}" download
                                                                class="btn btn-primary btn-sm">
                                                                <i class="bi bi-cloud-arrow-down mr-1"></i> Download
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- About -->
                                        <div class="col-12">
                                            <div class="border rounded shadow-sm">
                                                <!-- Title strip -->
                                                <div
                                                    class="d-flex align-items-center justify-content-between px-3 py-2 border-bottom bg-white">
                                                    <div class="d-flex align-items-center">
                                                        <span class="mr-2 text-primary">
                                                            <i class="fas fa-user-edit"></i>
                                                        </span>
                                                        <h6 class="mb-0 font-weight-bold">About Candidate</h6>
                                                    </div>
                                                    <small class="text-muted">Profile Note</small>
                                                </div>

                                                <!-- Content -->
                                                <div class="p-1 bg-white px-3">
                                                    <p class="mb-0">{{ $application->about_candidate }}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <!-- <div class="card-footer bg-white border-top py-3">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <a href="{{ route('coach.applicationList') }}" class="btn btn-outline-secondary">
                                            <i class="fas fa-arrow-left mr-1"></i> Back to List
                                        </a>

                                        <div class="d-flex">

                                            @if($application->status == 'shortlisted' && $application->status != 'selected')
                                                <form action="{{route('coach.application.makeCoach')}}" method="GET"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to make Coach for application?')">
                                                    @csrf
                                                    @method('post')
                                                    <input type="hidden" name="application_id" value="{{$application->id}}">
                                                    <button type="submit" class="btn btn-success mr-2 btn-action btn-delete "
                                                        data-toggle="modal" data-target="#rejectModal"
                                                        title="Delete Application">
                                                        <i class="fas fa-times mr-1">make Coack
                                                    </button>
                                                </form>
                                            @endif

                                            @if($application->status != 'selected')
                                                <form action="{{route('coach.application.accept')}}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to shortlist this application?')">
                                                    @csrf
                                                    @method('post')
                                                    <input type="hidden" name="application_id" value="{{$application->id}}">
                                                    <button type="submit" class="btn btn-success mr-2 btn-action btn-delete "
                                                        data-toggle="modal" data-target="#rejectModal"
                                                        title="Delete Application">
                                                        <i class="fas fa-times mr-1">Accept
                                                    </button>
                                                </form>
                                                <form action="{{route('coach.application.reject')}}" method="POST"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to reject this application?')">
                                                    @csrf
                                                    @method('post')
                                                    <input type="hidden" name="application_id" value="{{$application->id}}">
                                                    <button type="submit" class="btn btn-danger mr-2 btn-action btn-delete "
                                                        data-toggle="modal" data-target="#rejectModal"
                                                        title="Delete Application">
                                                        <i class="fas fa-times mr-1">Reject
                                                    </button>
                                                </form>

                                            @endif
                                            <form action="{{route('coach.application.delete')}}" method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('Are you sure you want to delete this application?')">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="application_id" value="{{$application->id}}">
                                                <button type="submit" class="btn btn-danger mr-2 btn-action btn-delete "
                                                    data-toggle="modal" data-target="#rejectModal"
                                                    title="Delete Application">
                                                    <i class="fas fa-times mr-1">Delete
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div> -->
                                <div class="card-footer bg-white border-top py-1 ">
                                  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center ">
                                    <!-- Left: Back -->
                                    <div class="mb-2 mb-md-0">
                                      <a href="{{ route('coach.applicationList') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-left-circle mr-1"></i> Back to List
                                      </a>
                                    </div>

                                    <!-- Right: Actions -->
                                    <div class="d-flex flex-wrap justify-content-md-end gap-1">
                                      @if($application->status == 'shortlisted' && $application->status != 'selected')
                                        <form
                                          action="{{route('coach.application.makeCoach')}}"
                                          method="GET"
                                          class="mr-2 mb-2 mb-2 mb-md-0"
                                          style="display:inline;"
                                          onsubmit="return confirm('Are you sure you want to make Coach for application?')"
                                        >
                                          @csrf
                                          @method('post')
                                          <input type="hidden" name="application_id" value="{{$application->id}}">
                                          <button type="submit" class="btn btn-success btn-action btn-delete">
                                            <i class="bi bi-patch-check mr-1"></i> Make Coach
                                          </button>
                                        </form>
                                      @endif

                                      @if($application->status != 'selected')
                                        @if($application->status != 'shortlisted')
                                            <form
                                            action="{{route('coach.application.accept')}}"
                                            method="POST"
                                            class="mr-2 mb-2 mb-2 mb-md-0"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to shortlist this application?')"
                                            >
                                            @csrf
                                            @method('post')
                                            <input type="hidden" name="application_id" value="{{$application->id}}">
                                            <button type="submit" class="btn btn-success btn-action btn-delete mr-2">
                                                <i class="bi bi-patch-check mr-1"></i> Accept
                                            </button>
                                            </form>
                                        @endif

                                        @if($application->status != 'rejected')
                                            <form
                                            action="{{route('coach.application.reject')}}"
                                            method="POST"
                                            class="mr-2 mb-2 mb-2 mb-md-0"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to reject this application?')"
                                            >
                                            @csrf
                                            @method('post')
                                            <input type="hidden" name="application_id" value="{{$application->id}}">
                                            <button type="submit" class="btn btn-outline-danger btn-action btn-delete mr-2">
                                                <i class="bi bi-x-circle mr-1"></i> Reject
                                            </button>
                                            </form>
                                        @endif

                                    @endif

                                      <form
                                        action="{{route('coach.application.delete')}}"
                                        method="POST"
                                        class="mr-2 mb-2 mb-2 mb-md-0 ml-2"
                                        style="display:inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this application?')"
                                      >
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="application_id" value="{{$application->id}}">
                                        <button type="submit" class="btn btn-danger btn-action btn-delete mr-2">
                                          <i class="bi bi-trash3 mr-1"></i> Delete
                                        </button>
                                      </form>
                                    </div>
                                  </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


@endsection

@section('styles')
    <style>
        .card {
            border: 1px solid #e3e6f0;
            border-radius: 0.5rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        }

        .card-header {
            padding: 1rem 1.5rem;
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        .card-body {
            padding: 1.5rem;
        }

        .font-weight-medium {
            font-weight: 500;
        }

        .badge-warning {
            background-color: #f6c23e;
            color: #ffffff;
        }

        .btn-outline-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
            color: #fff;
        }

        .modal-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
            border-radius: 0.3rem 0.3rem 0 0;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }

        .h5 {
            color: #5a5c69;
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app.js')}}"></script>

    <script>
        @if(session('success'))
            toastr.success('{{ session('success') }}', 'Success', {
                positionClass: 'toast-top-right',
                progressBar: true,
                timeOut: 5000
            });
        @endif

        @if(session('error'))
            toastr.error('{{ session('error') }}', 'Error', {
                positionClass: 'toast-top-right',
                progressBar: true,
                timeOut: 5000
            });
        @endif

        // PDF viewer handler
        document.querySelectorAll('[data-pdf-view]').forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                const pdfUrl = this.href;
                window.open(pdfUrl, '_blank', 'width=800,height=600');
            });
        });
    </script>
@endsection