@extends('admin.layouts.main')
@section('title', 'Dashboard')
<style>
    .card{
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
                        <div class="dropdown">
                            <a href="{{ route('groups.create') }}" class=" btn btn-primary " >Add Group</a>
                         
                        </div>
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
                                        <th>Name</th>
                                        <th>Leader</th>
                                        <th>Contribution Amount</th>
                                        <th>Frequency</th>
                                        <th>Total Cycles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            @foreach ($groups as $key => $val)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><a href="{{ route('groups.assign.member',$val->id) }}">{{ $val->name ?? '' }}</a></td>
                                    <td>{{ $val->leader->name ?? '' }}</td>
                                    <td>{{ $val->contribution_amount ?? '' }}
                                    <td>{{ $val->frequency == 1 ? 'Weekly' : 'Monthly' }}
                                    <td>{{ $val->total_cycles ?? '' }}
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('groups.edit',$val->id) }}"><img width="20px" src="{{ asset('admin/icons/edit.png') }}" alt=""></a>
                                            <form action="{{ route('groups.destroy', $val->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this groups?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="border: none; background: transparent; padding: 0;">
                                                    <img width="20px" src="{{ asset('admin/icons/delete.png') }}" alt="Delete">
                                                </button>
                                            </form>
                                    </td>
                                </tr>
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
@endsection