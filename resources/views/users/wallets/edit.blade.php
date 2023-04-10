@extends('users.layouts.app')
@section('title', 'Edit Wallet')
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
                                <li class="breadcrumb-item"><a href="{{ route('wallets') }}">Wallets</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Edit Wallet</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Edit {{ $wallet->name }} Wallet</h2>
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
                            <form action="{{ route('wallet.update', $wallet->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Wallet Name</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name', $wallet->name) }}" placeholder="Enter Wallet Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ old('address', $wallet->wallet_address) }}"
                                                placeholder="Enter Wallet Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select class="form-select text-capitalize" name="status">
                                                <option hidden disabled selected>Select</option>
                                                @foreach (App\Enums\WalletStatus::cases() as $status)
                                                    <option value="{{ $status }}"
                                                        @if ($wallet->status == $status) selected @endif>
                                                        {{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <p><span class="text-danger">*</span> Recommended resolution is 640*640 with
                                                file size</p>
                                            <input type="file" id="flupld"
                                                value="{{ old('qr_code', $wallet->qr_code) }}"
                                                class="form-control ti ti-upload me-2" name="qr_code">
                                        </div>
                                        <div class="text-end btn-page mb-0 mt-4">
                                            <button type="submit" class="btn btn-primary">Update Wallet</button>
                                        </div>
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
