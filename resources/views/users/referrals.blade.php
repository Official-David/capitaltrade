@extends('users.layouts.app')
@section('title', 'Referred Users')
@section('pagecss')
<!-- [Page specific CSS] start -->
<!-- data tables css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/scroller.bootstrap5.min.css') }}">
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
<!-- [Page specific CSS] end -->
@endsection
@section('content')

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Referred Users</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Referred Users</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            <div class="row">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $key => $user)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $user->full_name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td><span
                                                        class="badge bg-light-success  f-12 text-capitalize">@if ($user->total_deposit > 0) Deposited @else No Deposit Yet @endif</span>
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- [ Main Content ] end -->
@endsection

@section('pagejs')

    <!-- [Page Specific JS] start -->
  <!-- datatable Js -->
  <script src="../../../../cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/dataTables.bootstrap5.min.js')}}"></script>
  <script>
      // [ base style ]
      $('#base-style').DataTable();
  
      // [ no style ]
      $('#no-style').DataTable();
  
      // [ compact style ]
      $('#compact').DataTable();
  
      // [ hover style ]
      $('#table-style-hover').DataTable();
  </script>
    <!-- [Page Specific JS] end -->

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this wallet!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        form.submit();
                        swal("Deleted!", "Your wallet has been deleted.", "success");
                    } else {
                        swal("Cancelled", "Your wallet is safe :)", "error");
                    }
                });
        });
    </script>
@endsection