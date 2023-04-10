@extends('users.auth/layouts.app')
@section('title', 'Forgot Password')
@section('content')
    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <a href="{{ route('/') }}"><img src="../assets/images/logo-dark.png" width="180" class="mb-4 img-fluid"
                                alt="img"></a>
                        <div class="d-flex justify-content-between align-items-end mb-4">
                            <h3 class="mb-0"><b>Forgot Password</b></h3>
                            <a href=" {{route('login')}} " class="link-primary">Back to Login</a>
                        </div>
                        @error('email')
                            <h4 class="text-center text-mute text-danger f-w-500 mb-3">{{ $message }}</h4>
                        @enderror
                            <h4 class="text-center text-mute text-success f-w-500 mb-3">{{ session('status') }}</h4>
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="floatingInput" placeholder="Email Address">
                            </div>
                            <p class="mt-4 text-sm text-muted">Do not forgot to check SPAM box.</p>
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-primary">Send Password Reset Email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection