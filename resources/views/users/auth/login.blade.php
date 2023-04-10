@extends('users.auth/layouts.app')
@section('title', 'Login')
@section('content')
    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <a href="{{ route('/') }}"><img src="../assets/images/logo-dark.png" width="180"
                                    alt="img"></a>
                        </div>
                        @error('email')
                            <h4 class="text-center text-mute text-danger f-w-500 ">{{ $message }}</h4>
                        @enderror
                        <h4 class="text-center f-w-500 mb-3">Sign in with your work email.</h4>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="floatingInput" name="email" value="{{ old('email') }}"
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="floatingInput1" name="password" placeholder="Password">
                            </div>
                            <div class="d-flex mt-1 justify-content-between align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" name="remember"
                                        id="customCheckc1" checked="">
                                    <label class="form-check-label text-muted" for="customCheckc1">Remember
                                        me?</label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-secondary f-w-400 mb-0">Forgot
                                    Password?</a>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <h6 class="f-w-500 mb-0">Don't have an Account?</h6>
                            <a href="{{ route('register') }}" class="link-primary">Create Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
