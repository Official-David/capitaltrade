@extends('users.auth/layouts.app')
@section('title', 'Verify Email')
@section('content')

    <div class="auth-main">
        <div class="auth-wrapper v2">
            <div class="auth-sidecontent">
                <img src="../assets/images/authentication/img-auth-sideimg.jpg" alt="images" class="img-fluid img-auth-side">
            </div>
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <a href="#"><img src="../assets/images/logo-dark.png" width="180" class="mb-4 img-fluid"
                                alt="img"></a>
                        <div class="mb-4">
                            @if (session('status') == 'verification-link-sent')
                                <h4 class="text-center text-mute text-success f-w-500 mb-3">A new email verification link
                                    has been emailed to you!</h4>
                            @endif
                            <h3 class="mb-2"><b>Hi, verify your email address</b></h3>
                            <p class="text-muted">Before proceeding, please check your email for a verification link. If you
                                did not receive the email, kindly click the resend email button.</p>
                        </div>
                        <div class="d-grid mt-3">
                            <form action="{{ route('verification.send') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary form-control">Resend Email</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
