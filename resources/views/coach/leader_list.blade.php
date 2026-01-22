@extends('coach.layouts.main')

@section('title', 'Leader List')
<style>
    .card {
        padding: 10px !important;
    }
    .bg-lights {
        background: #f8fafc;
        border-left: 1px solid rgba(0, 0, 0, .06);
    }

    .leader-modal{
  border-radius: 18px;
  overflow: hidden;
}

.leader-modal-header{
  padding: 16px 18px;
   border-bottom: 1px solid #cccc;
}

.leader-icon{
  width: 42px;
  height: 42px;
  border-radius: 14px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background: rgba(255,255,255,.16);
  border: 1px solid rgba(255,255,255,.18);
  color: #000000ff;
}

.leader-card{
  box-shadow: 0 .35rem 1rem rgba(0,0,0,.04);
}

.leader-avatar{
  width: 46px;
  height: 46px;
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(106,78,233,.10);
  border: 1px solid rgba(106,78,233,.20);
  color: #6a4ee9;
  font-size: 20px;
}

.leader-table{
  border: 1px solid rgba(0,0,0,.08);
  border-radius: 14px;
  overflow: hidden;
}

.leader-table th,
.leader-table td{
  padding: .85rem .9rem;
  border-color: rgba(0,0,0,.08);
  background: #fff;
}

.leader-table tr:nth-child(odd) th,
.leader-table tr:nth-child(odd) td{
  background: #fbfbfd;
}
 .task-modal-topbar {
        padding: 16px 18px;
        border-bottom: 1px solid #cccc;
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
                            <h2 class="content-header-title float-start mb-0">Leader</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">leader</a>
                                    </li>

                                </ol>
                            </div>
                        </div>
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
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>SR NO.</th>
                                                        <th>NAME</th>
                                                        <th>EMAIL</th>
                                                        <th>PHONE</th>
                                                        <th>CREATED AT</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($leaders as $key => $val)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $val->name ?? '' }}</td>
                                                            <td>{{ $val->email ?? '' }}</td>
                                                            <td>{{ $val->phone ?? '' }}</td>
                                                            <td>{{ $val->created_at->format('d-M-Y') ?? '' }}</td>
                                                            <td>
                                                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $val->id }}">
                                                                    View
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        @foreach ($leaders as $val)
                                            <div class="modal fade" id="viewModal{{ $val->id }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow leader-modal">

      <!-- Header -->
      <div class="task-modal-topbar leader-modal-header d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-2">
          <span class="leader-avatar">
            <i class="bi bi-person-badge"></i>
          </span>
          <div class="lh-sm">
            <h5 class="modal-title mb-0 text-black">Leader Details</h5>
            <small class="text-black">{{ $val->name }}</small>
          </div>
        </div>

        <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body -->
      <div class="modal-body px-3 px-sm-4 py-1">
        <!-- Leader summary card -->
        <div class="p-1 rounded-4 border bg-lights leader-card mb-3">
          <div class="d-flex align-items-center gap-3">
            <div class="leader-avatar">
              <i class="bi bi-person-fill"></i>
            </div>

            <div class="flex-grow-1">
              <div class="text-muted small text-uppercase" style="letter-spacing:.08em;">Leader Name</div>
              <div class="fw-semibold text-dark fs-6">{{ $val->name }}</div>
            </div>

            <span class="badge rounded-pill text-black border">Active</span>
          </div>
        </div>

        <!-- Group details -->
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="mb-0 fw-semibold text-dark">Assigned Group Details</h6>
          <span class="small text-muted">Overview</span>
        </div>

        @if($val->group)
          <div class="table-responsive">
            <table class="table table-sm align-middle mb-0 leader-table">
              <tbody>
                <tr>
                  <th class="text-muted w-50">Group Name</th>
                  <td class="fw-semibold">{{ $val->group->name }}</td>
                </tr>
                <tr>
                  <th class="text-muted">Group Number</th>
                  <td>{{ $val->group->group_number }}</td>
                </tr>
                <tr>
                  <th class="text-muted">Target Amount</th>
                  <td>{{ $val->group->target_amount }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        @else
          <div class="alert alert-warning mb-0 d-flex align-items-start gap-2" role="alert">
            <i class="bi bi-exclamation-triangle mt-1"></i>
            <div>
              <div class="fw-semibold">Not assigned</div>
              <div class="small">He is not assigned to any group.</div>
            </div>
          </div>
        @endif
      </div>

      <!-- Footer -->
      <div class="modal-footer border-0 px-3 px-sm-4 pb-3 pb-sm-4 pt-0">
        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

                                        @endforeach
                                    </table>
                                </div>

                                <!-- Pagination links -->
                                <div class="d-flex justify-content-center">
                                    {{ $leaders->links() }}
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