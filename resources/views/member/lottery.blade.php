@extends('layouts.index')
@section('content')
<section class="space-m align-items-center d-flex min-vh-100">
    <div class="container d-flex justify-content-center">
    <div class="col-md-3">
        <div class="card card-body bg-dark-2 shape-1 text-center">
            <h2 class="mb-0 text-primary title-2">Comming soon</h2>
            <p class="mb-0">System is under development</p>
            <i class="bi bi-gear display-1 text-primary my-4"></i>
            <hr>
            <a href="{{ route('index') }}" class="btn btn-primary">Back Home</a>
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