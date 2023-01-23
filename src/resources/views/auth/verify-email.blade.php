@extends('layouts.app')

@section('title')
    Verify Email
@endsection

@section('content')
    <section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center form-bg-image p-md-10"
                data-background-lg="{{ Vite::asset('resources/images/signin.svg') }}">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="bg-white shadow border-0 rounded p-4 p-lg-5 w-100 fmxw-500">
                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success text-center" role="alert">
                                A verification link has been emailed to you!
                            </div>
                        @endif
                        <div class="text-center text-md-center mb-4 mt-md-0">
                            <h1 class="h3">Hello, {{ Auth::user()->name }}!</h1>
                            <p class="text-gray">Please verify your email to continue.</p>
                        </div>
                        <form action="{{ route('verification.send') }}" method="POST">
                            @csrf
                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-gray-800">Resend Email Verification</button>
                            </div>
                        </form>
                        <div class="d-grid mt-3">
                            <a href="{{ route('profile') }}" class="btn btn-secondary">Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
