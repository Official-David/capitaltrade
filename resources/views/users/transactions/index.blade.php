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
                        <div class="table-responsive">
                            <table id="table-style-hover" class="table table-striped table-hover table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Amount</th>
                                        <th>Coin</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        @role('admin')
                                        <th class="text-center">Actions</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $key => $transaction)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>$ @convert($transaction->amount)</td>
                                        <td>@if (trim($transaction->type) == trim(App\Enums\TransactionType::Deposit->value)) {{ $transaction->wallet_name . ' - ' . $transaction->hash}}  @elseif (trim($transaction->type) == trim(App\Enums\TransactionType::Withdrawal->value)) {{ $transaction->wallet_name . ' - ' . $transaction->address}} @else {{ $transaction->wallet_name }} @endif</td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>{{ $transaction->status }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                        <td class="text-center">
                                            <ul class="list-inline me-auto mb-0">
                                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
                                                    <a href="#" class="avtar avtar-xs btn-link-secondary btn-pc-default" data-bs-toggle="modal" data-bs-target="#cust-modal{{ $key }}">
                                                        <i class="ti ti-eye f-18"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                        <div class="modal fade" id="cust-modal{{ $key }}" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0 pb-0">
                                                        <h5 class="mb-0">Approve transaction</h5>
                                                        <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default" data-bs-dismiss="modal">
                                                            <i class="ti ti-x f-20"></i>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('transaction.update', $transaction->id) }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">User's Full Name</label>
                                                                        <input type="text" class="form-control" value="{{ $transaction->users->full_name }}" disabled readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">Amount</label>
                                                                        <input type="text" class="form-control" value="{{ $transaction->amount }}" disabled readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Coin</label>
                                                                        <input type="text" class="form-control" value="{{ $transaction->wallet_name }}" disabled readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">Status</label>
                                                                        <select class="form-select form-control text-capitalize" name="status" @if ( trim($transaction->status->value) == 'confirmed' || trim($transaction->status->value) == 'declined') disabled readonly @endif>
                                                                            <option hidden disabled>Select</option>
                                                                            @foreach (App\Enums\TransactionStatus::cases() as $status)
                                                                            <option value="{{ $status->value }}" @if (trim($transaction->status->value) == $status->value) selected @endif>{{ $status->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="text-end btn-page mb-0 mt-4">
                                                                        <button type="submit" class="btn btn-primary" @if ( trim($transaction->status->value) == 'confirmed' || trim($transaction->status->value) == 'declined') disabled readonly @endif>Update transaction Status</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
<!-- [Page Specific JS] end -->
@endsection