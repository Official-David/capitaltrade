@extends('users.layouts.app')
@section('title', 'Dashboard')
@section('pagecss')
@endsection
@section('content')
<!-- [ Sidebar Menu ] end -->
<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0 text-capitaize">Welcome {{ Auth::user()->full_name }}! 🖖</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-6 col-xxl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="avtar avtar-s bg-light-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.4" d="M13 9H7" stroke="#4680FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M22.0002 10.9702V13.0302C22.0002 13.5802 21.5602 14.0302 21.0002 14.0502H19.0402C17.9602 14.0502 16.9702 13.2602 16.8802 12.1802C16.8202 11.5502 17.0602 10.9602 17.4802 10.5502C17.8502 10.1702 18.3602 9.9502 18.9202 9.9502H21.0002C21.5602 9.9702 22.0002 10.4202 22.0002 10.9702Z" stroke="#4680FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M17.48 10.55C17.06 10.96 16.82 11.55 16.88 12.18C16.97 13.26 17.96 14.05 19.04 14.05H21V15.5C21 18.5 19 20.5 16 20.5H7C4 20.5 2 18.5 2 15.5V8.5C2 5.78 3.64 3.88 6.19 3.56C6.45 3.52 6.72 3.5 7 3.5H16C16.26 3.5 16.51 3.50999 16.75 3.54999C19.33 3.84999 21 5.76 21 8.5V9.95001H18.92C18.36 9.95001 17.85 10.17 17.48 10.55Z" stroke="#4680FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                            @role('user')
                            <div class="flex-grow-1 ms-3 row">
                                <h6 class="mb-0 col-md-8">Account Balance</h6>
                                <span class="btn btn-primary btn-sm col-md-4" width="1px" data-bs-toggle="modal" data-bs-target="#makeDeposit">Deposit</span>
                            </div>
                        </div>
                        <div class="bg-body p-3 mt-3 rounded">
                            <div class="mt-3 row align-items-center">
                                <h3 class="mb-1 text-center">$@convert(Auth::user()->account_balance ?? '0.00') </h3>
                                <div id="makeDeposit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Make Deposit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    <p class="mb-1">Amount</p>
                                                    <h3 id="output">$0.00</h3>
                                                </div>
                                                <form action="{{ route('deposit.store') }}" method="post">
                                                    @csrf
                                                    <div class="form-group row">
                                                        {{-- <label class="col-form-label col-lg-4 col-sm-12 text-lg-end">Default</label> --}}
                                                        <div class="col-lg-8 col-md-11 col-sm-12 mx-auto">
                                                            <div class="mb-3">
                                                                <select class="form-control" id="coin-select" onchange="showQrCode()" data-trigger name="wallet_name" id="choices-single-default" required>
                                                                    <option disabled value="" selected hidden>Select a coin
                                                                    </option>
                                                                    @foreach ($wallets as $wallet)
                                                                    <option value="{{ $wallet->name }}">
                                                                        {{ $wallet->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div id="coin-info">
                                                                <div class="col-lg-8 col-md-11 col-sm-12     mx-auto mb-3" id="qr_code">
                                                                </div>
                                                                <div id="sample">
                                                                <div class="col-lg-12 text-center col-md-11 col-sm-12 mx-auto mb-3 text-capitalize" id="wallet-address">
                                                                </div>
                                                                </div>
                                                                <i class="fas fa-copy text-center col-md-11 col-sm-12 mx-auto mb-4" style="font-size: 20px" onclick="CopyToClipboard('sample');return false;"></i>
                                                                
                                                                <style>
                                                                    #qr_code img {
                                                                        max-width: 200px;
                                                                        max-height: 200px;
                                                                    }
                                                                </style>
                                                            </div>
                                                            <input type="number" class="form-control mb-3" id="amount" placeholder="Amount" name="amount" autocomplete="off" required>
                                                            <input type="text" class="form-control mb-3" placeholder="Hash ID" name="hash" autocomplete="off" required>
                                                            <div class="d-grid">
                                                                <button type="submit" class="btn btn-primary">Confirm</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endrole
                        @role('admin')
                        <div class="flex-grow-1 ms-3 row">
                            <h6 class="mb-0 col-md-8">Total Users</h6>
                        </div>
                    </div>
                    <div class="bg-body p-3 mt-3 rounded">
                        <div class="mt-3 row align-items-center">
                            <h3 class="mb-1 text-center">{{ $users }}</h3>
                        </div>
                    </div>
                    @endrole

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-s bg-light-warning">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 7V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V7C3 4 4.5 2 8 2H16C19.5 2 21 4 21 7Z" stroke="#E58A00" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.6" d="M14.5 4.5V6.5C14.5 7.6 15.4 8.5 16.5 8.5H18.5" stroke="#E58A00" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.6" d="M8 13H12" stroke="#E58A00" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.6" d="M8 17H16" stroke="#E58A00" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            @role('user')
                            <h6 class="mb-0">Pending Deposit</h6>
                            @endrole
                            @role('admin')
                            <h6 class="mb-0">Pending Deposits</h6>
                            @endrole
                        </div>
                    </div>
                    <div class="bg-body p-3 mt-3 rounded">
                        <div class="mt-3 row align-items-center">
                            @role('user')
                            <h3 class="mb-1 text-center">$@convert(Auth::User()->active_deposit)</h3>
                            @endrole
                            @role('admin')
                            <h3 class="mb-1 text-center">{{ $pendingDeposits }}</h3>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3" id="btn-warning-apc">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-s bg-light-success">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 2V5" stroke="#2ca87f" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16 2V5" stroke="#2ca87f" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M3.5 9.08984H20.5" stroke="#2ca87f" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#2ca87f" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M15.6947 13.7002H15.7037" stroke="#2ca87f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M15.6947 16.7002H15.7037" stroke="#2ca87f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M11.9955 13.7002H12.0045" stroke="#2ca87f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M11.9955 16.7002H12.0045" stroke="#2ca87f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M8.29431 13.7002H8.30329" stroke="#2ca87f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M8.29395 16.7002H8.30293" stroke="#2ca87f" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            @role('user')
                            <h6 class="mb-0">Total Earned</h6>
                            @endrole
                            @role('admin')
                            <h6 class="mb-0">Ongoing Investments</h6>
                            @endrole
                        </div>
                    </div>
                    <div class="bg-body p-3 mt-3 rounded">
                        <div class="mt-3 row align-items-center">
                            @role('user')
                            <h3 class="mb-1 text-center">$@convert(Auth::User()->total_earned)</h3>
                            @endrole
                            @role('admin')
                            <h3 class="mb-1 text-center">{{ $ongoingInvestments }}</h3>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="avtar avtar-s bg-light-warning">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#DC2626" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path opacity="0.4" d="M8.4707 10.7402L12.0007 14.2602L15.5307 10.7402" stroke="#DC2626" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            @role('user')
                            <h6 class="mb-0">Total Withdrawals</h6>
                            @endrole
                            @role('admin')
                            <h6 class="mb-0">Ended Investments</h6>
                            @endrole
                        </div>
                    </div>
                    <div class="bg-body p-3 mt-3 rounded">
                        <div class="mt-3 row align-items-center">
                            @role('user')
                            <h3 class="mb-1 text-center">$@convert(Auth::User()->total_withdrawal)</h3>
                            @endrole
                            @role('admin')
                            <h3 class="mb-1 text-center">{{ $endedInvestments }}</h3>
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <div class="row justify-content-center align-items-center">
                    <!-- [ sample-page ] start -->
                    @foreach ($packages as $key => $package)
                    <div class="col-md-6 col-lg-3">
                        <div class="card price-card @if ($key == '1') price-popular @endif @if ($key == '2') price-popular @endif">
                            <div class="card-body">
                                <div class="price-head">
                                    @if ($key == 1)
                                    <span class="badge f-12 bg-success mb-3 ">Popular</span>
                                    @endif
                                    @if ($key == 2)
                                    <span class="badge f-12 bg-success mb-3 ">Popular</span>
                                    @endif
                                    <h5 class="mb-0">{{ $package->name }}</h5>
                                    <p class="text-muted">ROI - {{ $package->roi }}%</p>
                                    <div class="h3 mt-4">$@convert($package->minimum_deposit) - $@convert($package->maximum_deposit)</div>
                                    @role('user')
                                    <div class="d-grid"><a class="btn btn-outline-primary mt-4" href="{{ route('user.invest', [$package->name, $package->id]) }}">Invest</a></div>
                                    @endrole
                                </div>
                                <ul class="list-group list-group-flush product-list">
                                    <li class="list-group-item enable">{{ $package->duration }} day(s) Payout</li>
                                    <li class="list-group-item enable">Instant Withdrawal</li>
                                    <li class="list-group-item enable">100% Risk Free</li>
                                    <li class="list-group-item enable mb-2">24/7 Customer Support</li>
                                    @role('admin')
                                    <a href="{{ route('package.edit', [strToLower($package->name), $package->id]) }}" class="btn btn-secondary">Edit</a>
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
        <div class="col-lg-12 hidden-sm">
            <div class="card">
                <div class="card-body tradingview-widget-container">
                    <!-- TradingView Widget BEGIN -->
                    <div id="tradingview_34ada" class="table-responsive"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget({
                            "width": 1080,
                            "height": 400,
                            "symbol": "CRYPTOCAP:BTC",
                            "interval": "1",
                            "timezone": "Etc/UTC",
                            "theme": "light",
                            "style": "1",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "allow_symbol_change": true,
                            "container_id": "tradingview_34ada"
                        });
                    </script>
                    <!-- TradingView Widget END -->
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <iframe src="https://www.widgets.investing.com/top-cryptocurrencies?theme=darkTheme&roundedCorners=true" width="100%" height="400" title=""></iframe>
                    <div class="d-grid mt-3">
                    </div>
                </div>
            </div>
        </div> -->
        @role('user')
        <div class="col-md-12">
            <div class="card">
                <div class="card-body border-bottom pb-0">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-3">Transactions</h5>
                    </div>
                    <ul class="nav nav-tabs analytics-tab" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="analytics-tab-1" data-bs-toggle="tab" data-bs-target="#analytics-tab-1-pane" type="button" role="tab" aria-controls="analytics-tab-1-pane" aria-selected="true">Deposits</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="analytics-tab-2" data-bs-toggle="tab" data-bs-target="#analytics-tab-2-pane" type="button" role="tab" aria-controls="analytics-tab-2-pane" aria-selected="false">Investments</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="analytics-tab-3" data-bs-toggle="tab" data-bs-target="#analytics-tab-3-pane" type="button" role="tab" aria-controls="analytics-tab-3-pane" aria-selected="false">Withdrawals</button>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel" aria-labelledby="analytics-tab-1" tabindex="0">
                        <ul class="list-group list-group-flush">
                            @forelse($deposits as $deposit)
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <!-- <div class="flex-shrink-0">
                                            <div class="avtar avtar-s border"> AI </div>
                                        </div> -->
                                    <div class="flex-grow-1 ms-3">
                                        <div class="row g-1">
                                            <div class="col-6">

                                                <p class="@if (trim($deposit->status->value) == 'confirmed') text-success @elseif (trim($deposit->status->value) == 'declined') text-danger @else text-warning @endif mb-0"><i class="ti ti-arrow-up"></i>$@convert($deposit->amount)</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <h6 class="mb-1 @if (trim($deposit->status->value) == 'confirmed') text-success @elseif (trim($deposit->status->value) == 'declined') text-danger @else text-warning @endif">{{ $deposit->status }}</h6>
                                                <p class=" mb-0">
                                                    {{ $deposit->wallet_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="analytics-tab-2-pane" role="tabpanel" aria-labelledby="analytics-tab-2" tabindex="0">
                        <ul class="list-group list-group-flush">
                            @forelse($investments as $investment)
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <!-- <div class="flex-shrink-0">
                                            <div class="avtar avtar-s border"> AI </div>
                                        </div> -->
                                    <div class="flex-grow-1 ms-3">
                                        <div class="row g-1">
                                            <div class="col-6">

                                                <p class="@if (trim($investment->status->value) == 'confirmed') text-success @elseif (trim($investment->status->value) == 'declined') text-danger @elseif (trim($investment->status->value) == 'pending') text-warning @else text-secondary @endif mb-0"><i class="ti ti-arrow-right"></i>$@convert($investment->amount)</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <h6 class="mb-1 @if (trim($investment->status->value) == 'confirmed') text-success @elseif (trim($investment->status->value) == 'declined') text-danger @elseif (trim($investment->status->value) == 'pending') text-warning @else text-secondary @endif">{{ $investment->status }}</h6>
                                                <p class=" mb-0">
                                                    {{ $investment->packages->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="analytics-tab-3-pane" role="tabpanel" aria-labelledby="analytics-tab-3" tabindex="0">
                        <ul class="list-group list-group-flush">
                            @forelse($withdrawals as $withdrawal)
                            <li class="list-group-item">
                                <div class="d-flex align-items-center">
                                    <!-- <div class="flex-shrink-0">
                                            <div class="avtar avtar-s border"> AI </div>
                                        </div> -->
                                    <div class="flex-grow-1 ms-3">
                                        <div class="row g-1">
                                            <div class="col-6">

                                                <p class="text-danger mb-0"><i class="ti ti-arrow-down"></i>$@convert($withdrawal->amount)</p>
                                            </div>
                                            <div class="col-6 text-end">
                                                <h6 class="mb-1 @if (trim($deposit->status->value) == 'confirmed') text-success @elseif (trim($withdrawal->status->value) == 'declined') text-danger @else text-warning @endif">{{ $withdrawal->status }}</h6>
                                                <p class=" mb-0">
                                                    {{ $withdrawal->wallet_name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endrole
    </div>
    <!-- [ Main Content ] end -->
</div>
<script>
    window.addEventListener("load", (event) => {
        notifier.show(
            'Warning!',
            'The data presented here can be change.',
            'warning',
            '../assets/images/notification/medium_priority-48.png',
            4000
        );
    });
</script>
</div>
<!-- [ Main Content ] end -->
@endsection
@section('pagejs')
<script>
    const input = document.getElementById("amount");
    const output = document.getElementById("output");

    // input.addEventListener("keydown", function(event) {
    //     if(!isNaN(event.key)) { // check if the pressed key is a number
    //     output.textContent += event.key;
    //   }
    // });

    input.addEventListener("keydown", function(event) {
        if (event.key === "Backspace") {
            if (output.textContent.length > 1) {
                output.textContent = output.textContent.slice(0, -1);
                removeZeroIfPresent();
            }
        } else if (!isNaN(event.key)) {
            output.textContent += event.key;
        }
        removeZeroIfPresent();
        addZeroIfNoDigits();
    });

    input.addEventListener("paste", function(event) {
        const paste = (event.clipboardData || window.clipboardData).getData('text');
        const numbers = paste.match(/[0-9]+/g); // extract numbers from the pasted text
        if (numbers !== null) {
            input.value = numbers.join("");
            output.textContent += numbers.join("");
            removeZeroIfPresent();

        }
        event.preventDefault(); // prevent the default paste behavior
        addZeroIfNoDigits();
    });

    function addZeroIfNoDigits() {
        if (output.textContent.startsWith("$") && output.textContent.length === 1) {
            output.textContent += "0.00";
        }
    }

    function removeZeroIfPresent() {
        if (output.textContent.startsWith("$0.00")) {
            output.textContent = "$" + output.textContent.slice(5);
        }
    }



    function showQrCode() {
        var select = document.getElementById("coin-select");
        var selectedValue = select.options[select.selectedIndex].value;
        var qrCode = '';
        var address = '';

        // Loop through the $coins collection to find the selected coin and retrieve its image path
        @foreach($wallets as $wallet)
        if ("{{ $wallet->name }}" == selectedValue) {
            qrCode = "{{ $wallet->qr_code }}";
            walletAddress = "{{ $wallet->wallet_address }}";
        }
        @endforeach

        // Display the coin image in the #coin-image div
        if (qrCode) {
            var img = document.createElement("img");
            img.src = qrCode;
            img.style.width = "100%";
            img.style.height = "100%";
            document.getElementById("qr_code").innerHTML = "";
            document.getElementById("qr_code").appendChild(img);
        } else {
            document.getElementById("qr_code").innerHTML = "Please select a coin";
        }

        if (walletAddress) {
            document.getElementById("wallet-address").innerHTML = walletAddress;
        } else {
            document.getElementById("wallet-address").innerHTML = "Please select a coin";
        }
    }
</script>
<!-- [Page Specific JS] start -->
<script type="text/javascript" src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
<!-- tagify -->
<script src="{{ asset('assets/js/plugins/choices.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var genericExamples = document.querySelectorAll('[data-trigger]');
        for (i = 0; i < genericExamples.length; ++i) {
            var element = genericExamples[i];
            new Choices(element, {
                placeholderValue: 'This is a placeholder set in the config',
                searchPlaceholderValue: 'Search Coin'
            });
        }
    });
</script>

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
<!-- [Page Specific JS] end -->
@endsection