@extends('users.layouts.app')
@section('title', 'Make Investment')
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
                <li class="breadcrumb-item"><a href="{{ route('investments') }}">Investment</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Invest</a></li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Invest</h2>
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
              <form action="{{ route('user.invest.store', [$package->name, $package->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Investment Package</label>
                    <input type="text" class="form-control" value="{{ $package->name }}" readonly disabled>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Investment Range</label>
                    <input type="text" class="form-control" value="$@convert($package->minimum_deposit) - $@convert($package->maximum_deposit)" readonly disabled>
                  </div>
                </div>
                <div class="col-md-6"><div class="form-group">
                    <label class="form-label">ROI</label>
                    <input type="text" class="form-control" value="{{ $package->roi }}" readonly disabled>
                  </div>
                  <div class="form-group">
                  <label class="form-label">Duration</label>
                    <input type="text" class="form-control" value="{{ $package->duration }} day(s)" readonly disabled>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Amount</label>
                    <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" placeholder="Enter Amount">
                  </div>
                </div>
                <div class="text-end btn-page mb-0 mt-4">
                    <button type="submit" class="btn btn-primary">Invest</button>
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

@error('investmentError')
<script>
    swal("Insufficient Funds", "{{ $message }}", "error")
</script>
@enderror

@error('minimumInvestmentError')
<script>
    swal("Something went wrong", "{{ $message }}", "warning")
</script>
@enderror

@error('maximumInvestmentError')
<script>
    swal("Something went wrong", "{{ $message }}", "warning")
</script>
@enderror

@endsection