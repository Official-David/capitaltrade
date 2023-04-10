
@extends('users.auth/layouts.app')
@section('title', '404')
@section('content')
  <div class="maintenance-block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="card error-card">
            <div class="card-body">
              <div class="error-image-block">
                <img class="img-fluid" src="../assets/images/pages/img-error-404.svg" alt="img">
              </div>
              <div class="text-center">
                <h1 class="mt-5"><b>Page Not Found</b></h1>
                <p class="mt-2 mb-4 text-muted">The page you are looking was moved, removed,<br>  renamed, or might never exist!</p>
                <a href="{{ route('/') }}" class="btn btn-primary mb-3">Go to home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection