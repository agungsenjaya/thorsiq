@extends('layouts.index')
@section('content')
<section class="space-m align-items-center d-flex min-vh-100">
    <div class="container d-flex justify-content-center">
    <div class="col-md-3">
        <div class="card card-body bg-dark-2 shape-1 text-center">
            <h2 class="mb-0 text-primary title-2">Contact Support</h2>
            <p class="mb-0">For more information please contact us</p>
            <!-- <i class="bi bi-gear display-1 text-primary my-4"></i> -->
            <hr>
            <ul class="nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link" href="https://twitter.com/THORSIQ" target="_blank">
                  <i class="bi h4 text-warn bi-twitter"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://t.me/THORSIQ_GLOBAL" target="_blank">
                  <i class="bi h4 text-warn bi-telegram"></i>
                </a>
              </li>
            </ul>
            <!-- <a href="{{ route('member') }}" class="btn btn-primary">Go Member</a> -->
        </div>
    </div>
    </div>
</section>
@endsection
@section('css')
<style>
    body{
        background-color: #010101;
        color: #fff;
    }
</style>
@endsection