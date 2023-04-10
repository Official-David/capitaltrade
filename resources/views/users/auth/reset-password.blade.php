@extends('users.auth/layouts.app')
@section('title', 'Reset Password')
@section('content')
<div class="auth-main">
  <div class="auth-wrapper v1">
    <div class="auth-form">
      <div class="card my-5">
        <div class="card-body">
          <a href="{{ route('/') }}"><img src="../assets/images/logo-dark.png" width="180" class="mb-4 img-fluid" alt="img"></a>
          <div class="mb-4">
            <h3 class="mb-2"><b>Reset Password</b></h3>
            <p class="text-muted">Please choose your new password</p>
          </div>
          <h4 class="text-center text-mute text-success f-w-500 mb-3">{{ session('status') }}</h4>
          <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ request()->token }}">
            <div class="form-group mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="Email">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingInput" placeholder="Password">
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="floatingInput1" placeholder="Confirm Password">
            </div>
            <div class="d-grid mt-4">
              <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection