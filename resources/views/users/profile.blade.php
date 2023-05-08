@extends('users.layouts.app')
@section('title', 'Profile')
@section('content')
    <!-- [ Sidebar Menu ] end -->

    <!-- [ Main Content ] start -->
    <style type="text/css">
        .ajax-load {
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Account Profile</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Account Profile</h2>
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
                        <div class="card-body py-0">
                            <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                                @role('user')
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                        role="tab" aria-selected="true">
                                        <i class="ti ti-user me-2"></i>Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2"
                                        role="tab" aria-selected="true">
                                        <i class="ti ti-file-text me-2"></i>Personal Details
                                    </a>
                                </li>
                                @endrole
                                <!-- <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#profile-3" role="tab" aria-selected="true">
                                            <i class="ti ti-id me-2"></i>My Account
                                        </a>
                                    </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-4" data-bs-toggle="tab" href="#profile-4"
                                        role="tab" aria-selected="true">
                                        <i class="ti ti-lock me-2"></i>Change Password
                                    </a>
                                </li> -->
                                @role('admin')
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-5" data-bs-toggle="tab" href="#profile-5"
                                            role="tab" aria-selected="true">
                                            <i class="ti ti-users me-2"></i>Users
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" id="profile-tab-6" data-bs-toggle="tab" href="#profile-6"
                                            role="tab" aria-selected="true">
                                            <i class="ti ti-settings me-2"></i>Settings
                                        </a>
                                    </li> -->
                                @endrole
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        @role('user')
                        <div class="tab-pane show" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                            <div class="row">
                                <div class="col-lg-4 col-xxl-3">
                                    <div class="card">
                                        <div class="card-body position-relative">
                                            <div class="position-absolute end-0 top-0 p-3">
                                                <span
                                                    class="badge @if (trim(Auth::User()->status->value) == 'active') bg-success @elseif (trim(Auth::User()->status->value) == 'blocked') bg-danger @else bg-secondary @endif text-capitalize">{{ Auth::User()->status }}</span>
                                            </div>
                                            <div class="text-center mt-3">
                                                <div class="chat-avtar d-inline-flex mx-auto">
                                                    <img class="rounded-circle img-fluid wid-70"
                                                        src="../assets/images/user/avatar-5.jpg" alt="User image">
                                                </div>
                                                <h5 class="mb-0">{{ Auth::user()->full_name }}</h5>
                                                <p class="text-muted text-sm text-capitalize">{{ Auth::User()->status }}</p>
                                                <hr class="my-3 border border-secondary-subtle">
                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <h5 class="mb-0">{{ count(Auth::user()->referrals)  ?? '0' }}</h5>
                                                        <small class="text-muted">Referral(s)</small>
                                                    </div>
                                                </div>
                                                <hr class="my-3 border border-secondary-subtle">
                                                <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-mail me-2"></i>
                                                    <p class="mb-0">{{ Auth::user()->email }}</p>
                                                </div>
                                                <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-phone me-2"></i>
                                                    <p class="mb-0">{{ Auth::user()->phone_number ?? 'Not set' }}</p>
                                                </div>
                                                <!-- <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-map-pin me-2"></i>
                                                    <p class="mb-0 text-capitalize">{{ Auth::user()->country->name ?? 'Not set' }}</p>
                                                </div>
                                                <div class="d-inline-flex align-items-center justify-content-start w-100">
                                                    <i class="ti ti-link me-2"></i>
                                                    <a href="#" class="link-primary">
                                                        <a href="{{ Auth::user()->referral_link ?? '#' }}" class="mb-0">{{ Auth::user()->referral_link ?? 'Not set' }}
                                                        </a>
                                                    </a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-xxl-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>About me</h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="mb-0">{{ Auth::User()->bio ?? 'Tell Us About Yourself...' }}</p>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Personal Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">First Name</p>
                                                            <p class="mb-0">{{ Auth::user()->first_name }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Last Name</p>
                                                            <p class="mb-0">{{ Auth::user()->last_name }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Phone</p>
                                                            <p class="mb-0">{{ Auth::user()->phone_number ?? 'Not set' }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Country</p>
                                                            <p class="mb-0">
                                                                {{ Auth::user()->country->name ?? 'Not set' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Email</p>
                                                            <p class="mb-0">{{ Auth::user()->email }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Gender</p>
                                                            <p class="mb-0 text-capitalize">{{ Auth::user()->gender ?? 'Not set' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <p class="mb-1 text-muted">Address</p>
                                                    <p class="mb-0">{{ Auth::user()->address ?? 'Not set' }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Wallets</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                @forelse($userWallets as $userWallet)
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Name</p>
                                                            <p class="mb-0">{{ $userWallet->wallet_name }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Address</p>
                                                            <p class="mb-0">{{ $userWallet->address }}</p>
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
                        </div>
                        <div class="tab-pane show active" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Personal Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('user-profile-information.update') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-sm-12 text-center mb-3">
                                                        <div class="user-upload wid-75">
                                                            <img src="../assets/images/user/avatar-4.jpg" alt="img"
                                                                class="img-fluid">
                                                            {{-- <label for="" class="img-avtar-upload">
                                                                <i class=""></i>
                                                                <span>Upload</span>
                                                            </label> --}}
                                                            {{-- <input type="file" name="avatar" id=""
                                                                class="d-none @error('avatar') is-invalid @enderror"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">First Name</label>
                                                            <input type="text"
                                                                class="form-control @error('first_name') is-invalid @enderror"
                                                                name="first_name"
                                                                value="{{ old('first_name', Auth::user()->first_name) }}">
                                                            <input type="hidden" name="email"
                                                                value="{{ Auth::User()->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Last Name</label>
                                                            <input type="text"
                                                                class="form-control @error('last_name') is-invalid @enderror"
                                                                name="last_name"
                                                                value="{{ old('last_name', Auth::user()->last_name) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-groupl">
                                                            <label class="form-label">Gender</label>
                                                            <select class="form-control text-capitalize" name="gender">
                                                                <option hidden readonly disabled>Select</option>
                                                                @foreach (App\Enums\UserGender::cases() as $gender)
                                                                    <option value="{{ $gender }}"
                                                                        @if (Auth::User()->gender == $gender) selected @endif>
                                                                        {{ $gender }}</option>
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Country</label>
                                                            <input type="text" class="form-control" value="New York">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Bio</label>
                                                            <textarea class="form-control" name="bio">{{ old('bio', Auth::user()->bio) }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-end btn-page">
                                                    <button type="submit" class="btn btn-primary btn-sm">Update Personal
                                                        Information</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Contact Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('user-profile-information.update') }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Contact Phone</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ old('phone_number', Auth::User()->phone_number) }}" name="phone_number">
                                                                <input type="hidden" name="first_name"
                                                                value="{{ Auth::User()->first_name }}">
                                                                <input type="hidden" name="last_name"
                                                                value="{{ Auth::User()->last_name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Email <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="email" readonly class="form-control"
                                                                value="{{ Auth::User()->email }}" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label class="form-label">Address</label>
                                                            <textarea class="form-control" name="address">{{ old('address', Auth::user()->address) }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-end btn-page">
                                                    <button type="submit" class="btn btn-primary btn-sm">Update Contact
                                                        Information</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Wallet Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('user.wallet.store') }}" method="post">
                                                @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Name<span
                                                                class="text-danger">*</span></label>
                                                        <select type="text" class="form-control text-capitalize" name="wallet_name">
                                                            <option hidden readonly disabled selected>Select</option>
                                                            @forelse ($wallets as $wallet)
                                                                <option value="{{ $wallet->name }}">{{ $wallet->name }}</option>
                                                                @empty
                                                                <option>No Wallet Available</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Address <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="address"
                                                            value="{{ old('address') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end btn-page">
                                                <button class="btn btn-primary btn-sm">Add Wallet</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endrole
                        <div class="tab-pane" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>General Settings</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Username <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                            value="Ashoka_Tano_16">
                                                        <small class="form-text text-muted">Your Profile URL:
                                                            https://pc.com/Ashoka_Tano_16</small>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Account Email <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                            value="demo@sample.com">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Language</label>
                                                        <select class="form-control">
                                                            <option>Washington</option>
                                                            <option>India</option>
                                                            <option>Africa</option>
                                                            <option>New York</option>
                                                            <option>Malaysia</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Sign in Using</label>
                                                        <select class="form-control">
                                                            <option>Password</option>
                                                            <option>Face Recognition</option>
                                                            <option>Thumb Impression</option>
                                                            <option>Key</option>
                                                            <option>Pin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Advance Settings</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <p class="mb-1">Secure Browsing</p>
                                                            <p class="text-muted text-sm mb-0">Browsing Securely ( https )
                                                                when it's necessary</p>
                                                        </div>
                                                        <div class="form-check form-switch p-0">
                                                            <input class="form-check-input h4 position-relative m-0"
                                                                type="checkbox" role="switch" checked="">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <p class="mb-1">Login Notifications</p>
                                                            <p class="text-muted text-sm mb-0">Notify when login attempted
                                                                from other place</p>
                                                        </div>
                                                        <div class="form-check form-switch p-0">
                                                            <input class="form-check-input h4 position-relative m-0"
                                                                type="checkbox" role="switch" checked="">
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div>
                                                            <p class="mb-1">Login Approvals</p>
                                                            <p class="text-muted text-sm mb-0">Approvals is not required
                                                                when login from
                                                                unrecognized devices.</p>
                                                        </div>
                                                        <div class="form-check form-switch p-0">
                                                            <input class="form-check-input h4 position-relative m-0"
                                                                type="checkbox" role="switch" checked="">
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Recognized Devices</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="me-2">
                                                            <p class="mb-2">Celt Desktop</p>
                                                            <p class="mb-0 text-muted">4351 Deans Lane</p>
                                                        </div>
                                                        <div class="">
                                                            <div class="text-success d-inline-block me-2">
                                                                <i class="fas fa-circle f-10 me-2"></i>
                                                                Current Active
                                                            </div>
                                                            <a href="#!" class="text-danger"><i
                                                                    class="feather icon-x-circle"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="me-2">
                                                            <p class="mb-2">Imco Tablet</p>
                                                            <p class="mb-0 text-muted">4185 Michigan Avenue</p>
                                                        </div>
                                                        <div class="">
                                                            <div class="text-muted d-inline-block me-2">
                                                                <i class="fas fa-circle f-10 me-2"></i>
                                                                Active 5 days ago
                                                            </div>
                                                            <a href="#!" class="text-danger"><i
                                                                    class="feather icon-x-circle"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="me-2">
                                                            <p class="mb-2">Albs Mobile</p>
                                                            <p class="mb-0 text-muted">3462 Fairfax Drive</p>
                                                        </div>
                                                        <div class="">
                                                            <div class="text-muted d-inline-block me-2">
                                                                <i class="fas fa-circle f-10 me-2"></i>
                                                                Active 1 month ago
                                                            </div>
                                                            <a href="#!" class="text-danger"><i
                                                                    class="feather icon-x-circle"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Active Sessions</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="me-2">
                                                            <p class="mb-2">Celt Desktop</p>
                                                            <p class="mb-0 text-muted">4351 Deans Lane</p>
                                                        </div>
                                                        <button class="btn btn-link-danger">Logout</button>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="me-2">
                                                            <p class="mb-2">Moon Tablet</p>
                                                            <p class="mb-0 text-muted">4185 Michigan Avenue</p>
                                                        </div>
                                                        <button class="btn btn-link-danger">Logout</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button class="btn btn-outline-dark ms-2">Clear</button>
                                    <button class="btn btn-primary">Update Profile</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Change Password</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Old Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">New Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5>New password must contain:</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><i
                                                        class="ti ti-circle-check text-success f-16 me-2"></i> At least 8
                                                    characters</li>
                                                <li class="list-group-item"><i
                                                        class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                    lower letter (a-z)</li>
                                                <li class="list-group-item"><i
                                                        class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                    uppercase letter(A-Z)</li>
                                                <li class="list-group-item"><i
                                                        class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                    number (0-9)</li>
                                                <li class="list-group-item"><i
                                                        class="ti ti-circle-check text-success f-16 me-2"></i> At least 1
                                                    special characters</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end btn-page">
                                    <div class="btn btn-outline-secondary">Cancel</div>
                                    <div class="btn btn-primary">Update Profile</div>
                                </div>
                            </div>
                        </div>
                        @role('admin')
                            <div class="tab-pane" id="profile-5" role="tabpanel" aria-labelledby="profile-tab-5">
                                <div class="row">
                                    <!-- [ sample-page ] start -->
                                    <div class="col-sm-12">
                                        <div class="card table-card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover" id="pc-dt-simple">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-end">#</th>
                                                                <th>Name</th>
                                                                <th>Role</th>
                                                                <th>Status</th>
                                                                <th>Joined</th>
                                                                <!-- <th class="text-center">Actions</th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($users as $key => $user)
                                                                <tr>
                                                                    <td class="text-end">{{ ++$key }}</td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="{{ $user->avatar ?? asset('assets/images/user/avatar-2.jpg') }}"
                                                                                    alt="user-image" class="wid-40 rounded">
                                                                            </div>
                                                                            <div class="col">
                                                                                <p class="text-muted f-12 mb-0">
                                                                                    {{ $user->full_name }}</p>
                                                                                <h6 class="mb-1">{{ $user->email }}</h6>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-capitalize">{{ trim($user->getRoleNames()[0]) }}</td>
                                                                    <td><span
                                                                            class="badge bg-light-success  f-12 text-capitalize">lol</span>
                                                                    </td>
                                                                    <td class="text-capitalize">{{ $user->created_at }}</td>
                                                                    <td class="text-center">
                                                                        <ul class="list-inline me-auto mb-0">
                                                                            <li class="list-inline-item align-bottom"
                                                                                data-bs-toggle="tooltip" title="View">
                                                                                <a href="{{ route('referred.users', $user->id) }}"
                                                                                    class="avtar avtar-xs btn-link-secondary btn-pc-default">
                                                                                    <i class="ti ti-eye f-18"></i>
                                                                                </a>
                                                                            </li>
                                                                            <!-- <li class="list-inline-item align-bottom"
                                                                                data-bs-toggle="tooltip" title="Edit">
                                                                                <a href="ecom_product-add.html"
                                                                                    class="avtar avtar-xs btn-link-success btn-pc-default">
                                                                                    <i class="ti ti-edit-circle f-18"></i>
                                                                                </a>
                                                                            </li>
                                                                            <li class="list-inline-item align-bottom"
                                                                                data-bs-toggle="tooltip" title="Delete">
                                                                                <a href="#"
                                                                                    class="avtar avtar-xs btn-link-danger btn-pc-default">
                                                                                    <i class="ti ti-trash f-18"></i>
                                                                                </a>
                                                                            </li> -->
                                                                        </ul>
                                                                    </td>
                                                                    <!-- <div class="modal fade" id="cust-modal"
                                                                        data-bs-keyboard="false" tabindex="-1"
                                                                        aria-hidden="true">
                                                                        <div
                                                                            class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header border-0 pb-0">
                                                                                    <h5 class="mb-0">{{ $user->full_name }}
                                                                                    </h5>
                                                                                    <a href="#"
                                                                                        class="avtar avtar-s btn-link-danger btn-pc-default"
                                                                                        data-bs-dismiss="modal">
                                                                                        <i class="ti ti-x f-20"></i>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-sm-4">
                                                                                            <div
                                                                                                class="bg-light rounded position-relative">
                                                                                                <div class="text-center">
                                                                                                    <div
                                                                                                        class="chat-avtar d-inline-flex mx-auto">
                                                                                                        <img class="img-fluid rounded"
                                                                                                            src="../assets/images/application/img-prod-4.jpg"
                                                                                                            alt="User image">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="position-absolute end-0 top-0 p-3">
                                                                                                    <span
                                                                                                        class="badge bg-success">{{ $user->status }}</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <p class="text-muted text-center">
                                                                                                {{ $user->address }}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->
                                                                </tr>
                                                            @empty
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- [ sample-page ] end -->
                                </div>
                            </div>

                            <div class="tab-pane" id="profile-6" role="tabpanel" aria-labelledby="profile-tab-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Email Settings</h5>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="mb-4">Setup Email Notification</h6>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">Email Notification</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch" checked="">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">Send Copy To Personal Email</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Updates from System Notification</h5>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="mb-4">Email you with?</h6>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">News about PCT-themes products and feature
                                                            updates</p>
                                                    </div>
                                                    <div class="form-check p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch" checked="">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">Tips on getting more out of PCT-themes</p>
                                                    </div>
                                                    <div class="form-check p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch" checked="">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">Things you missed since you last logged
                                                            into PCT-themes</p>
                                                    </div>
                                                    <div class="form-check  p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">News about products and other services</p>
                                                    </div>
                                                    <div class="form-check p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">Tips and Document business products</p>
                                                    </div>
                                                    <div class="form-check p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Activity Related Emails</h5>
                                            </div>
                                            <div class="card-body">
                                                <h6 class="mb-4">When to email?</h6>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">Have new notifications</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch" checked="">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">You're sent a direct message</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">Someone adds you as a connection</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch" checked="">
                                                    </div>
                                                </div>
                                                <hr class="my-4 border border-secondary-subtle">
                                                <h6 class="mb-4">When to escalate emails?</h6>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">Upon new order</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch" checked="">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">New membership approval</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch">
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <div>
                                                        <p class="text-muted mb-0">Member registration</p>
                                                    </div>
                                                    <div class="form-check form-switch p-0">
                                                        <input class="m-0 form-check-input h5 position-relative"
                                                            type="checkbox" role="switch" checked="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-end btn-page">
                                        <div class="btn btn-outline-secondary">Cancel</div>
                                        <div class="btn btn-primary">Update Profile</div>
                                    </div>
                                </div>
                            </div>
                        @endrole
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

    <!-- [Page Specific JS] start -->
    <script src="../assets/js/plugins/simple-datatables.js"></script>
    <script>
        const dataTable = new simpleDatatables.DataTable('#pc-dt-simple', {
            sortable: false,
            perPage: 5
        });
    </script>
    <!-- [Page Specific JS] end -->

@endsection
