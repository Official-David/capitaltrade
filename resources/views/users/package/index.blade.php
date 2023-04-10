@extends('users.layouts.app')
@section('title', 'Packages')
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
                <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page">Packages</li>
              </ul>
            </div>
            {{-- <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Pricing </h2>
              </div>
            </div> --}}
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <div class="card border-0 shadow-none bg-transparent">
       
      </div>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
          
          <div class="row justify-content-center align-items-center">
            <!-- [ sample-page ] start -->
            @foreach($packages as $key => $package)
            <div class="col-md-6 col-lg-3">
              <div class="card price-card @if($key == '1') price-popular @endif @if($key == '2') price-popular @endif">
                <div class="card-body">
                  <div class="price-head">
                    @if($key == 1)
                    <span class="badge f-12 bg-success mb-3 ">Popular</span>
                    @endif
                    @if($key == 2)
                    <span class="badge f-12 bg-success mb-3 ">Popular</span>
                    @endif
                    <h5 class="mb-0">{{ $package->name }}</h5>
                    <p class="text-muted">ROI - {{ $package->roi }}%</p>
                    <div class="h3 mt-4">$@convert($package->minimum_deposit) - $@convert($package->maximum_deposit)</div>
                    <div class="d-grid"><a class="btn btn-outline-primary mt-4" href="#">Invest</a></div>
                  </div>
                  <ul class="list-group list-group-flush product-list">
                    <li class="list-group-item enable">{{ $package->duration }} Payout</li>
                    <li class="list-group-item enable">Instant Withdrawal</li>
                    <li class="list-group-item enable">100% Risk Free</li>
                    <li class="list-group-item enable mb-2">24/7 Customer Support</li>
                    @role('admin')
                    <a href="{{ route('package.edit',[strToLower($package->name), $package->id]) }}" class="btn btn-secondary">Edit</a>
                    @endrole
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
            <!-- [ sample-page ] end -->
          </div>
          
        </div>
        
      </div>

      <!-- [ Main Content ] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->
@endsection