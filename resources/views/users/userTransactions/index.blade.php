@extends('users.layouts.app')
@section('title', 'Transactions')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Transactions</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Transactions</h2>
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
                                        <th>Coin</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deposits as $key => $deposit)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>$ @convert($deposit->amount)</td>
                                        <td>{{ $deposit->wallet_name }}</td>
                                        <td>{{ $deposit->type }}</td>
                                        <td>{{ $deposit->status }}</td>
                                        <td>{{ $deposit->created_at }}</td>
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
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="../assets/js/plugins/dataTables.bootstrap5.min.js"></script>
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
@endsection