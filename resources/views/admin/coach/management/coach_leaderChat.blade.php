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
                            <h2 class="content-header-title float-start mb-0">Chat</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.coach.list') }}">Coach</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.coach.leaders' ,encrypt($coach->id) ) }}">Leaders</a></li>
                                    <li class="breadcrumb-item active">Coach & Leader Chat </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

             <div class="content-wrapper container-xxl p-0">
        <div class="content-body">

            <!-- Header -->
            <div class="card mb-2">
                <div class="card-body d-flex justify-content-between">
                    <div>
                        <h5 class="mb-0">{{ $coach->name }}</h5>
                        <small class="text-muted">Coach</small>
                    </div>
                    <div>
                        <h5 class="mb-0">{{ $leader->name }}</h5>
                        <small class="text-muted">Leader</small>
                    </div>
                </div>
            </div>

            <!-- Chat Box -->
            <div class="card">
                <div class="card-body chat-box" style="height:450px; overflow-y:auto">

                    @foreach($messages as $message)

                        @php
                            $isCoach = $message->sender_id == $coach->id;
                        @endphp

                        <div class="d-flex mb-1 {{ $isCoach ? 'justify-content-start' : 'justify-content-end' }}">
                            <div class="chat-message {{ $isCoach ? 'bg-light' : 'bg-primary text-white' }}"
                                 style="max-width:70%; padding:10px; border-radius:8px">

                                {{-- Text Message --}}
                                @if($message->chat)
                                    <p class="mb-0">{{ $message->chat }}</p>
                                @endif

                                {{-- File Message --}}
                                @if($message->file)
                                
                                    <div class="mt-1">
                                        
                                            @if(in_array(strtolower($message->file_type), ['jpg','jpeg','png','image']))
                                                <div class="text-center">
                                                    <img src="{{ asset('storage/'.$message->file) }}"
                                                        class="img-fluid rounded chat-download-img"
                                                        style="max-height:150px; cursor:pointer;"
                                                        ondblclick="downloadImage('{{ asset('storage/'.$message->file) }}')">

                                                    <small class="d-block text-muted mt-25">
                                                        Double click to download
                                                    </small>
                                                </div>
                                            @else

                                            <a href="{{ asset('storage/'.$message->file) }}"
                                               target="_blank"
                                               class="text-decoration-underline {{ $isCoach ? '' : 'text-white' }}">
                                                View Attachment
                                            </a>
                                        @endif
                                    </div>
                                @endif

                                <small class="d-block mt-1 text-muted text-end">
                                    {{ $message->created_at->format('d M Y, h:i A') }}
                                </small>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

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

        
     
    function downloadImage(url) {
        const a = document.createElement('a');
        a.href = url;
        a.download = '';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
    }


     

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