@extends('admin.layouts.main')

@section('title', 'Coach Review')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Coach Management</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.coach.list') }}">Coach</a>
                                    </li>
                                    <li class="breadcrumb-item active">Review Coach</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <!-- Information Cards -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="info-box d-flex">
                            <div class="info-icon primary">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="info-content">
                                <h6>Coach Information</h6>
                                <p>All details about coach</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box d-flex">
                            <div class="info-icon warning">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="info-content">
                                <h6>Security Settings</h6>
                                <p>Can change login credentials</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box d-flex">
                            <div class="info-icon success">
                                <i class="fas fa-image"></i>
                            </div>
                            <div class="info-content">
                                <h6>Coach Review</h6>
                                <p>Assign leader to coach</p>
                            </div>
                        </div>
                    </div>
                </div>

                <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">
                                        <i class="fas fa-user-plus me-2 text-primary"></i>
                                        Review The Coach
                                    </h4>
                                    <span class="badge bg-primary">Coach Update</span>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{ route('admin.coach.update')}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        
                                        <!-- Personal Information Section -->
                                        <div class="form-section">
                                            <h5 class="section-title">
                                                <i class="fas fa-user-circle me-2 text-primary"></i>
                                                Personal Information
                                            </h5>
                                            <input type="hidden" name="coach_id" value="{{$coach->id}}">
                                            <div class="row">
                                                {{-- Name --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">
                                                            <i class="fas fa-user text-primary"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Enter full name"  value="{{ old('name', $coach->name) }}"
                                                            required>
                                                    </div>
                                                    <div class="form-text">Coach's full legal name</div>
                                                    @error('name') 
                                                        <div class="text-danger small mt-1">
                                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- Email --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Email Address <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">
                                                            <i class="fas fa-envelope text-primary"></i>
                                                        </span>
                                                        <input type="email" class="form-control" name="email"
                                                            placeholder="john.doe@example.com" value="{{ old('email', $coach->email) }}"
                                                            readonly>
                                                    </div>
                                                    <div class="form-text">This will be used for login and notifications</div>
                                                    @error('email') 
                                                        <div class="text-danger small mt-1">
                                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- Phone Number --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">
                                                            <i class="fas fa-phone text-primary"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="phone"
                                                            placeholder="0909090909" value="{{ old('phone', $coach->phone) }}"
                                                            readonly>
                                                    </div>
                                                    <div class="form-text">Include country code if international</div>
                                                    @error('phone') 
                                                        <div class="text-danger small mt-1">
                                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                    @if($coach->cv_path)
                                                        <label class="form-label">Coach's CV <span class="text-danger">*</span></label>
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
                                                                                    Created on
                                                                                    {{ \Carbon\Carbon::parse($coach->created_at)->format('F j, Y') }}
                                                                                </small>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mt-3 mt-md-0"> 
                                                                            <a href="{{ Storage::url($coach->cv_path) }}" target="_blank"
                                                                                class="btn btn-outline-primary btn-sm mr-2">
                                                                                <i class="bi bi-eyeglasses mr-1"></i> View
                                                                            </a>

                                                                            <a href="{{ Storage::url($coach->cv_path) }}" download
                                                                                class="btn btn-primary btn-sm">
                                                                                <i class="bi bi-cloud-arrow-down mr-1"></i> Download
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    @else
                                                        <label class="form-label">Coach's CV <span class="text-danger">*</span></label>
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
                                                                                   CV Not Uploaded
                                                                                </small>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mt-3 mt-md-0"> 
                                                                            
                                                                            <a href="" 
                                                                                class="btn btn-primary btn-sm">
                                                                                <i class="bi bi-cloud-arrow-down mr-1"></i> Not Available
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                        <!-- Security Section -->
                                        <div class="form-section">
                                            <h5 class="section-title">
                                                <i class="fas fa-shield-alt me-2 text-primary"></i>
                                                Security Settings
                                            </h5>
                                            <div class="row">
                                                {{-- Password --}}
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Password <span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">
                                                            <i class="fas fa-key text-primary"></i>
                                                        </span>
                                                        <input type="password" class="form-control" name="password"
                                                            placeholder="Create secure password" required
                                                            id="password" value="{{ old('password', $coach->textPassword) }}">
                                                        <button type="button" class="btn btn-outline-secondary toggle-password" 
                                                                data-target="password">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </div>
                                                    <div class="form-text">Minimum 8 characters with letters and numbers</div>
                                                    @error('password') 
                                                        <div class="text-danger small mt-1">
                                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                {{-- Status --}}
                                               <div class="col-md-6 mb-3">
                                                    <label class="form-label">
                                                        Status <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">
                                                            <i class="fas fa-toggle-on text-primary"></i>
                                                        </span>

                                                        <select name="status" class="form-select" required>
                                                            <option value="">-- Select Status --</option>
                                                            <option value="1"
                                                                {{ old('status', $coach->status) == 1 ? 'selected' : '' }}>
                                                                Active
                                                            </option>
                                                            <option value="0"
                                                                {{ old('status', $coach->status) === 0 || old('status', $coach->status) === '0' ? 'selected' : '' }}>
                                                                Inactive
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-text">
                                                        Can make coach active and inactive
                                                    </div>

                                                    @error('status')
                                                        <div class="text-danger small mt-1">
                                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        
                                       <!-- Assign Leader Section -->
                                        <div class="form-section">
                                            <h5 class="section-title">
                                                <i class="fas fa-user-tie me-2 text-primary"></i>
                                                Assign Leader to Coach
                                            </h5>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">
                                                        Select Leader(s) <span class="text-danger">*</span>
                                                    </label>

                                                    <div class="input-group">
                                                        <span class="input-group-text bg-light">
                                                            <i class="fas fa-users text-primary"></i>
                                                        </span>

                                                        <select name="leader_ids[]" class="form-select" multiple 
                                                        {{ $coach->last_login_at === null ? 'disabled' : '' }} >
                                                            @foreach ($leaders as $leader)
                                                                <option value="{{ $leader->id }}"
                                                                    {{ in_array($leader->id, old('leader_ids', [])) ? 'selected' : '' }}>
                                                                    {{ $leader->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-text">
                                                        You can select one or multiple leaders
                                                    </div>
                                                    @if($coach->last_login_at == null)
                                                        <div class="form-text">
                                                            Can't assign leaders untill coach login atleast once
                                                        </div>
                                                    @endif

                                                    @error('leader_ids')
                                                        <div class="text-danger small mt-1">
                                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Action Buttons -->
                                        <div class="row mt-4">
                                            <div class="col-12">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="{{ route('admin.coach.list') }}" class="btn btn-outline-secondary">
                                                        <i class="fas fa-arrow-left me-1"></i> Back to Coach List
                                                    </a>
                                                    <div class="d-flex gap-2">
                                                      
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-user-plus me-1"></i> Update Coach
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

@section('styles')
    <style>
        :root {
            --primary: #7367f0;
            --primary-dark: #5e50ee;
            --success: #28c76f;
            --danger: #ea5455;
            --warning: #ff9f43;
            --info: #00cfe8;
            --dark: #1e1e2d;
            --light: #f8f8f8;
            --gray: #6e6b7b;
            --border: #d8d6de;
        }
        
        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 4px 25px 0 rgba(34, 41, 47, 0.15);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid var(--border);
            padding: 1.5rem;
            border-radius: 0.5rem 0.5rem 0 0 !important;
        }
        
        .card-title {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0;
            font-size: 1.25rem;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-select {
            border: 1px solid var(--border);
            border-radius: 0.357rem;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 3px 10px 0 rgba(34, 41, 47, 0.1);
        }
        
        .input-group-text {
            background-color: #f8f8f8;
            border: 1px solid var(--border);
            color: var(--gray);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 0.786rem 1.5rem;
            font-weight: 500;
            border-radius: 0.357rem;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px 0 rgba(115, 103, 240, 0.4);
        }
        
        .text-danger {
            color: var(--danger) !important;
        }
        
        .form-section {
            margin-bottom: 1.5rem;
            padding: 1.5rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 2px 8px 0 rgba(34, 41, 47, 0.05);
            border: 1px solid var(--border);
        }
        
        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--border);
            color: var(--dark);
        }
        
        .info-box {
            background: #f0f2f5;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            flex-shrink: 0;
        }
        
        .info-icon.primary {
            background-color: rgba(115, 103, 240, 0.12);
            color: var(--primary);
        }
        
        .info-icon.warning {
            background-color: rgba(255, 159, 67, 0.12);
            color: var(--warning);
        }
        
        .info-icon.success {
            background-color: rgba(40, 199, 111, 0.12);
            color: var(--success);
        }
        
        .info-content h6 {
            margin-bottom: 0.25rem;
            font-weight: 600;
        }
        
        .info-content p {
            margin-bottom: 0;
            color: var(--gray);
            font-size: 0.875rem;
        }
        
        .form-text {
            font-size: 0.75rem;
            color: var(--gray);
            margin-top: 0.25rem;
        }
        
        .password-strength .progress {
            background-color: #e9ecef;
        }
        
        .file-upload-area {
            position: relative;
        }
        
        .image-preview {
            border: 2px dashed var(--border);
            border-radius: 0.5rem;
            padding: 1rem;
            background-color: #f8f9fa;
        }
        
        .toggle-password {
            border-left: none;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 1rem;
            }
            
            .form-section {
                padding: 1rem;
            }
            
            .info-box {
                text-align: center;
            }
            
            .info-icon {
                margin: 0 auto 0.5rem;
            }
        }
    </style>
@endsection

@section('script')
    <script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('admin/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/core/app.js')}}"></script>
    <script src="{{ asset('admin/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>
    
    <!-- Font Awesome for icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    
    <script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });

        // Password visibility toggle
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function() {
                const target = this.getAttribute('data-target');
                const input = document.getElementById(target);
                const icon = this.querySelector('i');
                
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });


    </script>
@endsection