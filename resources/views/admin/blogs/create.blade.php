@extends('admin.layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Blogs</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Blogs</a>
                                    </li>
                                    
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Blogs</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                              <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
                                            <label for="formFile" class="form-label">Image</label>
                                            <input class="form-control" name="image" type="file" id="formFile" />
                                            @error('image')
                                                <div class="text text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                           <div class="col-6">
                                                <div class="mb-1 row">
                                                        <label class="col-form-label" for="first-name"> Title</label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="first-name" class="form-control" name="title" placeholder="Title" />
                                                    </div>
                                                     @error('title')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                             <div class="col-6">
                                                <div class="mb-1 row">
                                                        <label class="col-form-label" for="first-name">Description</label>
                                                    <div class="col-md-12">
                                                        <input type="text" id="first-name" class="form-control" name="description" placeholder="Sescription" />
                                                    </div>
                                                     @error('description')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 ">
                                                <button type="submit" class="btn btn-primary me-1">Submit</button>
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
@endsection