@extends('users.auth/layouts.app')
@section('title', 'Register')
@section('content')
    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <a href="{{ route('/') }}"><img src="../assets/images/logo-dark.png" width="180" alt="img"></a>

                        </div>

                        <h4 class="text-center f-w-500 mb-3">Sign up with your work email.</h4>
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <input type="text"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                                            @error('first_name')
                                    <div class="alertalert-danger">{{ $message }}</div>
                                @enderror
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <input type="text"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                                            @error('last_name')
                                    <div class="alertalert-danger">{{ $message }}</div>
                                @enderror
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" placeholder="Username">
                                    @error('username')
                                <div class="alertalert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Email Address">
                                    @error('email')
                                <div class="alertalert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password">
                                    @error('password')
                                <div class="alertalert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                <div class="alertalert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            
                            <div class="d-flex mt-1 justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1"
                                        checked="">
                                    <label class="form-check-label text-muted" for="customCheckc1">I agree to all the
                                        Terms
                                        & Condition</label>
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <h6 class="f-w-500 mb-0">Already have an Account?</h6>
                            <a href="{{ route('login') }}" class="link-primary">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection