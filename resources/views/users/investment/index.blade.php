@extends('users.layouts.app')
@section('title', 'Investments')
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
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Investments</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Investments</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- Base style - Hover table start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class=" table-responsive">
                            <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Amount</th>
                                        <th>Package</th>
                                        <th>Status</th>
                                        <th>Days</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($investments as $key => $investment)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $investment->amount }}</td>
                                        <td>{{ $investment->packages->name }}</td>
                                        <td>{{ $investment->status }}</td>
                                        <td>{{ $investment->status_count ?? 0 }}</td>
                                        <td>{{ $investment->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Base style - Hover table end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
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
@if (session('investmentSuccess'))
<script>
    swal("Success", "{{ session('investmentSuccess') }}", "success")
</script>
@endif
<!-- [Page Specific JS] end -->
@endsection