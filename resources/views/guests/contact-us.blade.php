@extends('guests.layouts.app')
@section('title', 'Contact Us')
@section('content')

<!-- breadcrumb content end -->
<!-- header end -->
<main>
    <!-- section content begin -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-center">
                    <div class="col-md-11 col-lg-8 mt-2">
                        <h1 class="pt-2 text-center">Have a <span class="text-highlight">questions?</span></h1>
                        <p class="pt-2 text-center text-success">{{ session('success') }}</p>
                        <p class="lead text-muted text-center">Let's get in touch</p>
                        <form action="{{ route('send.email') }}" method="post" class="row g-1 mt-2">
                            @csrf
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user fa-xs text-muted"></i></span>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Full name" aria-label="Full name" required="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope fa-xs text-muted"></i></span>
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Email address" aria-label="Email address" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-pen fa-xs text-muted"></i></span>
                                    <input class="form-control" id="subject" name="subject" type="text" placeholder="Subject" aria-label="Subject" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" id="message" name="message" placeholder="Message" rows="6" required=""></textarea>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-info" type="submit" name="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- success notification begin -->
        <div class="position-fixed bottom-0 end-0 p-4" style="z-index: 2">
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-body text-primary">
                    <i class="fas fa-check-circle me-1"></i>Your message has been sent successfully. Thank you!
                </div>
            </div>
        </div>
        <!-- success notification end -->
    </section>
    @endsection