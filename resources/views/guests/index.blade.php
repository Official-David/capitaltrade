@extends('guests.layouts.app')
@section('title', 'Home')
@section('content')
<main>
    <!-- slideshow content begin -->
    <section>
        <div id="main-slideshow" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row gx-md-5 align-items-md-center">
                                <div class="col-md-8 col-xl-6 order-first">
                                    <h1 class="fw-bold display-5">Investment environment with the best ROI</h1>
                                    <p class="lead mt-3 mb-4 d-none d-xl-block">Get the best ROI with us. Invest
                                        smarter, grow faster!</p>
                                    <a href="{{ route('login') }}" class="btn btn-warning">Start investing<i class="fas fa-bolt ms-1"></i></a>
                                    <a href="{{ route('login') }}" class="btn btn-link ms-3 d-none d-xl-inline"><i class="fas fa-arrow-right"></i>Get started now</a>

                                </div>
                                <div class="col-md-4 col-xl-6 order-last">
                                    <div class="in-carousel-image">
                                        <img src="{{ asset('app/img/in-cirro-slide-3.jpg') }}" alt="slide" width="856" height="570" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row gx-md-5 align-items-md-center">
                                <div class="col-md-8 col-xl-6 order-first">
                                    <h1 class="fw-bold display-5">Get referral commission</h1>
                                    <p class="lead mt-3 mb-4 d-none d-xl-block">Refer a friend and earn a
                                        commission! Spread the word about our product or service and earn money for
                                        every referral. It's that easy! Sign up now and start earning commission
                                        today.</p>
                                    <a href="{{ route('login') }}" class="btn btn-warning">Start investing<i class="fas fa-bolt ms-1"></i></a>
                                    <a href="{{ route('login') }}" class="btn btn-link ms-3 d-none d-xl-inline"><i class="fas fa-arrow-right"></i>Get started now</a>

                                </div>
                                <div class="col-md-4 col-xl-6 order-last">
                                    <div class="in-carousel-image">
                                        <img src="{{ asset('app/img/in-cirro-slide-2.jpg') }}" alt="slide" width="856" height="570" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row gx-md-5 align-items-md-center">
                                <div class="col-md-8 col-xl-6 order-first">
                                    <h1 class="fw-bold display-5">Access a wealth of trading opportunities</h1>
                                    <p class="lead mt-3 mb-3 d-none d-xl-block">With access to a wealth of options,
                                        you'll have the power to grow your portfolio and reach your financial goals.
                                        Invest smarter, not harder, with us.</p>
                                    <a href="{{ route('login') }}" class="btn btn-warning">Start investing<i class="fas fa-bolt ms-1"></i></a>
                                    <a href="{{ route('login') }}" class="btn btn-link ms-3 d-none d-xl-inline"><i class="fas fa-arrow-right"></i>Get started now</a>

                                </div>
                                <div class="col-md-4 col-xl-6 order-last">
                                    <div class="in-carousel-image">
                                        <img src="{{ asset('app/img/in-cirro-slide-1.jpg') }}" alt="slide" width="856" height="570" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-indicators"></div>
            <button class="carousel-control-prev" type="button" data-bs-target="#main-slideshow" data-bs-slide="prev"></button>
            <button class="carousel-control-next" type="button" data-bs-target="#main-slideshow" data-bs-slide="next"></button>
        </div>
    </section>
    <!-- slideshow content end -->
    <!-- section content begin -->
    <section class="py-5 bg-primary text-white in-cirro-12">
        <div class="container">
            <div class="row d-flex align-items-center mb-md-2 mb-lg-0 gy-3 gy-lg-0 gx-lg-5">
                <div class="col-12 col-lg-4">
                    <h1 class="text-white">Why {{ config('app.name') }} is a <span class="text-info">trusted</span> investment broker</h1>
                    <p class="mb-0">Experience, transparency, and results. Trust us with your investments.</p>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="row row-cols-1 row-cols-md-2 gy-4">
                        <div class="col d-flex align-items-center">
                            <img src="{{ asset('app/img/in-cirro-2-icon-1.svg') }}" alt="icon" width="54" height="54" />
                            <div class="ms-2">
                                <p class="mb-0">Wide Range of Investments</p>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center">
                            <img src="{{ asset('app/img/in-cirro-2-icon-4.svg') }}" alt="icon" width="54" height="54" />
                            <div class="ms-2">
                                <p class="mb-0">Unparalleled Investing Conditions</p>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center">
                            <img src="{{ asset('app/img/in-cirro-2-icon-3.svg') }}" alt="icon" width="54" height="54" />
                            <div class="ms-2">
                                <p class="mb-0">Globally Licensed & Regulated</p>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center">
                            <img src="{{ asset('app/img/in-cirro-2-icon-6.svg') }}" alt="icon" width="54" height="54" />
                            <div class="ms-2">
                                <p class="mb-0">Committed to Satisfying Clients</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-5 in-cirro-13">
        <div class="container mt-3">
            <div class="row d-flex align-items-center gx-5 mb-3">
                <div class="col-md-12 col-lg-5">
                    <h1>Experience superior trading conditions</h1>
                    <p class="lead mb-3">Maximize your investment potential with our superior conditions. From low
                        fees to cutting-edge technology and expert advice, we provide everything you need for
                        successful investing. Don't settle for average conditions, experience the best with us.</p>
                </div>
                <div class="col-md-12 col-lg-7 mt-3 mt-lg-0">
                    <div class="card card-body ms-lg-5">
                        <div id="tradingview-widget"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-5 in-cirro-14" style="background: url(img/in-cirro-14-background.png) no-repeat bottom, linear-gradient(0deg, #F5F7F9 50%, #fff 100%);">
        <div class="container my-2">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 mt-1">
                    <h1 class="text-center">Our Investment Packages</h1>
                    <p class="text-center">Access 40,000+ trading instruments and professional asset management on
                        <span class="text-highlight">award-winning platforms.</span>
                    </p>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 gy-2 g-md-2 gx-lg-2 text-center mt-3">
                        @foreach ($packages as $package)
                        <div class="col d-flex align-items-stretch">
                            <div class="card">
                                <div class="card-body">
                                    <img class="mt-2" src="{{ asset('app/img/in-cirro-2-icon-1.svg') }}" alt="icon" width="54" height="54" />
                                    <h5 class="fw-bold mt-2 mb-1">{{ $package->name }}</h5>
                                    <h6 class="">$@convert($package->minimum_deposit) - $@convert($package->maximum_deposit)</h6>
                                    <h6 class="">ROI: {{ $package->roi }}%</h6>
                                    <p>Payout in {{ $package->duration }} day(s)</p>
                                    <p>Earn 10% Referral commission on every deposit your referral make on the
                                        platform.</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section content end -->
    <!-- section content begin -->

    <!-- section content end -->
    <!-- section content begin -->
    <section class="py-3 in-cirro-16">
        <div class="container-fluid">
            <!-- TradingView Widget BEGIN -->
            <div class="card">
                <div class="card-body tradingview-widget-container">
                    <!-- TradingView Widget BEGIN -->
                    <div id="tradingview_34ada" class="table-responsive"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget({
                            "width": 1200,
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
            <!-- TradingView Widget END -->
        </div>
    </section>
    <!-- section content end -->

    <section class="py-5 in-cirro-14">
        <div class="justify-content-center row d-flex">
            <!-- <h5 class="text-center
        ">Hello</h5> -->
            <div class="col-md-12 col-lg-4">
                <h4 class="fw-bold">LIVE: Latest Deposit</h4>
                <table class="table table-striped mt-n1 mb-2">
                    {{-- <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Wallet name</th>
                            <th class="text-center">Amount</th>
                        </tr>
                    </thead> --}}
                    <tbody>
                        @forelse($deposits as $deposit)
                        <tr>
                            <td class="text-center">{{ $deposit->users->username}}</td>
                            <td class="text-center">{{ $deposit->wallet_name}}</td>
                            <td class="text-center">$@convert($deposit->amount)</td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 col-lg-4">
                <h4 class="fw-bold">LIVE: Latest Withdrawal</h4>
                <table class="table table-striped mt-n1 mb-2">
                    {{-- <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Walet Name</th>
                            <th class="text-center">Amount</th>
                        </tr>
                    </thead> --}}
                    <tbody>
                        @forelse($withdrawals as $withdrawal)
                        <tr>
                            <td class="text-center">{{ $withdrawal->users->username }}</td>
                            <td class="text-center">{{ $withdrawal->wallet_name }}</td>
                            <td class="text-center">$@convert($withdrawal->amount)</td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <!-- <a href="#" class="link-primary text-decoration-none"><small>See Full Shares Table</small></a> -->
            </div>
        </div>
    </section>


</main>
@endsection