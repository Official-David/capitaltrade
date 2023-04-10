@extends('users.layouts.app')
@section('title', 'Edit')
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
                <li class="breadcrumb-item"><a href="{{ route('packages') }}">Packages</a></li>
                <li class="breadcrumb-item" aria-current="page"></li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Edit {{ $package->name }} Package</h2>
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
            <form action="{{ route('package.update', $package->id) }}" method="post">
                  @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Package Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $package->name) }}">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Duration</label>
                    <input type="text" class="form-control" name="duration" value="{{ old('duration', $package->duration) }}" placeholder="Enter Product Description">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Minimum Deposit</label>
                    <input type="text" class="form-control" name="minimum_deposit" value="{{ old('minimum_deposit', $package->minimum_deposit) }}" placeholder="Enter Product Category">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Maximum Deposit</label>
                    <input type="text" class="form-control" name="maximum_deposit" value="{{ old('maximum_deposit', $package->maximum_deposit) }}" placeholder="Enter Product Category">
                  </div>
                  <div class="form-group">
                    <label class="form-label">Return of Investment (%)</label>
                    <input type="text" class="form-control" name="roi" value="{{ old('roi', $package->roi) }}" placeholder="Enter Product Category">
                  </div>
                </div><div class="text-end btn-page mb-0 mt-4">
                    <button type="submit" class="btn btn-primary btn-sm">Update Package</button>
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