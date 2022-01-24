@extends('layouts.app')

@section('content')
<div class="container space-m">
<div class="row g-0 d-flex justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
            <div class="card-header text-center border-0">
                    <!-- <img src="https://dummyimage.com/600x200" alt="" width="50%"> -->
              <a href="../index.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt=""></a>
              <h1 class="mb-1 title-2">Reset Password</h1>
              <span>Back to login page? <a href="{{ route('login') }}" class="ms-1">Login Now</a></span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    html,
    body {
    height: 100%;
    }
    body {
        display: flex;
        align-items: center;
    }
    #app {
        width: 100%;
    }
</style>
@endsection
