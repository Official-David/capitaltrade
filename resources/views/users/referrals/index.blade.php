@extends('users.layouts.app')
@section('title', 'Referrals')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Referrals</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Referrals</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="row">
            <h4>Your referral link is: <span style="color:blue;" id="sample">{{ Auth::user()->referral_link ?? 'Not set' }}</span> <i class="fas fa-copy" onclick="CopyToClipboard('sample');return false;">copy</i>
            </h4>
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-1">$@convert(Auth::User()->referral_earnings)</h3>
                                <p class="text-muted mb-0">All Referral Earnings</p>
                            </div>
                            <div class="col-4 text-end">
                                <i class="ti ti-chart-bar text-secondary f-36"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-1">{{ count(Auth::user()->referrals)  ?? '0' }}</h3>
                                <p class="text-muted mb-0">Referred User</p>
                            </div>
                            <div class="col-4 text-end">
                                <i class="ti ti-calendar-event text-success f-36"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class=" table-responsive">
                        <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($referrals as $key => $referral)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $referral->full_name }}</td>
                                    <td>{{ $referral->username }}</td>
                                    <td>{{ $referral->email }}</td>
                                    <td>@if ($referral->total_deposit > 0) Deposited @else No Deposit Yet @endif</td>
                                    <td>{{ $referral->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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

<script>
    function CopyToClipboard(id) {
        var r = document.createRange();
        r.selectNode(document.getElementById(id));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(r);
        document.execCommand('copy');
        window.getSelection().removeAllRanges();
    }
</script>
@endsection