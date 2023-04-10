@extends('users.layouts.app')
@section('title', 'Request Withdrawal')
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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Request Withdrawal</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Request Withdrawal</h2>
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
                            <form action="{{ route('withdrawal.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Wallet Name</label>
                                            <input type="text" class="form-control" value="USDT" readonly disabled>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Wallet Address</label>
                                            <input type="text" class="form-control" name="address"
                                                placeholder="Enter Wallet Address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Amount</label>
                                            <input type="text" class="form-control" name="amount"
                                                placeholder="Enter Wallet Name" required>
                                        </div>
                                    </div>
                                    <div class="text-end btn-page mb-0 mt-4">
                                        <button type="submit" class="btn btn-primary">Request Withdrawal</button>
                                    </div>
                                </div>
                            </form>
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

    @error('withdrawalError')
        <script>
            swal("Insufficient Funds", "{{ $message }}", "error")
        </script>
    @enderror

    @if (\Session::has('withdrawalSuccess'))
        <script>
            swal("Submited", "{!! \Session::get('success') !!}", "success")
        </script>
    @endif

@endsection
