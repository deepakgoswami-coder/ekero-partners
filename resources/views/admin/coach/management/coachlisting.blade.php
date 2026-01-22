@extends('admin.layouts.main')

@section('title', 'Dashboard')
<style>
    .leader-table-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        overflow: hidden;
    }
    .table-header-custom {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px 25px;
        border-bottom: none;
    }
    .table-header-custom h4 {
        margin: 0;
        font-weight: 600;
    }
    .table-custom {
        margin: 0;
    }
    .table-custom thead {
        background-color: #f8f9fa;
    }
    .table-custom thead th {
        border-bottom: 2px solid #e9ecef;
        padding: 15px 12px;
        font-weight: 600;
        color: #495057;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .table-custom tbody tr {
        transition: all 0.3s ease;
        border-bottom: 1px solid #f1f3f4;
    }
    .table-custom tbody tr:hover {
        background-color: #f8f9ff;
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    .table-custom tbody td {
        padding: 16px 12px;
        vertical-align: middle;
        color: #4a5568;
        font-size: 0.9rem;
    }
    .leader-name {
        font-weight: 600;
        color: #2d3748;
    }
    .leader-name a {
        color: #4a5568;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .leader-name a:hover {
        color: #667eea;
    }
    .group-name {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-block;
    }
    .group-name a {
        color: white;
        text-decoration: none;
    }
    .contact-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .email-cell, .phone-cell {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
    }
    .email-cell i, .phone-cell i {
        color: #667eea;
        font-size: 0.9rem;
    }
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
    }
    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-edit {
        background: rgba(102, 126, 234, 0.1);
        color: #667eea;
    }
    .btn-edit:hover {
        background: #667eea;
        color: white;
        transform: translateY(-2px);
    }
    .btn-delete {
        background: rgba(229, 62, 62, 0.1);
        color: #e53e3e;
    }
    .btn-delete:hover {
        background: #e53e3e;
        color: white;
        transform: translateY(-2px);
    }
    .status-badge {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .status-active {
        background: rgba(72, 187, 120, 0.1);
        color: #48bb78;
    }
    .status-inactive {
        background: rgba(229, 62, 62, 0.1);
        color: #e53e3e;
    }
    .pagination-container {
        background: white;
        padding: 20px;
        border-top: 1px solid #e9ecef;
    }
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #a0aec0;
    }
    .empty-state i {
        font-size: 3rem;
        margin-bottom: 16px;
        color: #cbd5e0;
    }
    .stats-summary {
        display: flex;
        gap: 15px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    .stat-card {
        flex: 1;
        min-width: 200px;
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        border-left: 4px solid #667eea;
    }
    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3748;
        line-height: 1;
    }
    .stat-label {
        font-size: 0.875rem;
        color: #718096;
        margin-top: 8px;
    }
    @media (max-width: 768px) {
        .table-responsive {
            border: 1px solid #e9ecef;
            border-radius: 8px;
        }
        .stats-summary {
            flex-direction: column;
        }
        .stat-card {
            min-width: 100%;
        }
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
                            <h2 class="content-header-title float-start mb-0">Coach</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active">Coach </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="content-body">
                <!-- Stats Summary -->
                <div class="stats-summary">
                    <div class="stat-card">
                        <div class="stat-value">{{$coachesCount->active}}</div>
                        <div class="stat-label">Active Coach</div>
                    </div>
                     <div class="stat-card">
                        <div class="stat-value">{{$coachesCount->inactive}}</div>
                        <div class="stat-label">Inactive Coach</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">{{$coachesCount->total}}</div>
                        <div class="stat-label">Total Coach</div>
                    </div>
                   
                   
                </div>

                <!-- Leaders Table -->
                <div class="leader-table-container">
                    <div class="table-header-custom">
                        <h4><i class="bi bi-people-fill me-2"></i>Coach </h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-custom table-hover">
                            <thead>
                                <tr>
                                    <th width="60">#</th>
                                    <th>Coach Name</th>
                                    <th>Contact</th>
                                    <th>Coach From</th>
                                
                                    <th>Leaders</th>
                                    <th>Status</th>
                                      <th>Last Login</th>
                                    <th>Action</th>
                                    
                                    {{--
                                        <th width="120">DELETE</th>
                                    --}}
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($coaches as $key => $val)
                                    <tr>
                                        <td class="fw-semibold">
                                            {{ $key + 1 + ($coaches->currentPage() - 1) * $coaches->perPage() }}
                                        </td>

                                        {{-- Applicant --}}
                                        <td>
                                            <div class="leader-name">
                                                {{Str::limit($val->name , 15) ?? 'N/A' }}
                                            </div>
                                        </td>

                                        {{-- Contact --}}
                                        <td>
                                            <div class="contact-info">
                                                <div class="email-cell">
                                                    <i class="bi bi-envelope"></i>
                                                    {{  Str::limit($val->email , 20 )?? 'N/A' }}
                                                </div>
                                                <div class="phone-cell">
                                                    <i class="bi bi-telephone"></i>
                                                    {{ $val->phone ?? 'N/A' }}
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Message 
                                        <td>
                                            {{ Str::limit($val->about_candidate, 30) ?? '—' }}
                                        </td>
                                        --}}

                                        {{-- Applied Date --}}
                                        <td>
                                            {{ $val->created_at ? $val->created_at->format('M d, Y') : 'N/A' }}
                                        </td>
                                        <!-- last login time  -->
                                       

                                        <td>
                                            <a href="{{route('admin.coach.leaders' , encrypt($val->id) )}}">
                                                    <span class="status-badge status-active">
                                                        Leaders
                                                    </span>
                                            </a>
                                        </td>

                                        {{-- Status --}}
                                        <td>
                                             <span class="status-badge {{ $val->status == 1 ? 'status-active' : 'status-inactive' }}">
                                                {{ $val->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>

                                       

                                         <td>
                                           {{ $val->last_login_at
                                            ? \Carbon\Carbon::parse($val->last_login_at)->format('d M , g:i')
                                            : 'N/A'
                                        }}
                                        </td>
                                        

                                        {{--Action --}}
                                        <td>
                                            {{-- Mark Reviewed --}}
                                            <div class="action-buttons mt-1">
                                                <form action="{{route('admin.coach.review')}}"
                                                    method="GET" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="coach_id" value="{{$val->id}}">
                                                    <button type="submit"
                                                            class="btn-action btn-edit"
                                                            title="Mark as Reviewed">
                                                        <i class="bi bi-check-circle"></i>
                                                    </button>
                                                </form>

                                                <form action="{{route('admin.coach.delete')}}"
                                                    method="GET"
                                                    style="display:inline;"
                                                    onsubmit="return confirm('Are you sure you want to delete this application?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="coach_id" value="{{$val->id}}">
                                                    <button type="submit"
                                                            class="btn-action btn-delete "
                                                            title="Delete Application">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                        

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">
                                            <div class="empty-state">
                                                <i class="bi bi-file-earmark-text"></i>
                                                <h4>No Coach Found</h4>
                                                <p>No coach job applications have been made coach yet.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-end mt-2">
                            {{ $coaches->links() }}
                        </div>

                    </div>

                    <!-- Pagination -->
                  
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
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });

     

        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation to table rows
            const tableRows = document.querySelectorAll('.table-custom tbody tr');
            tableRows.forEach((row, index) => {
                row.style.animationDelay = `${index * 0.05}s`;
            });
        });
    </script>
@endsection