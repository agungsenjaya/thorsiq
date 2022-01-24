@extends('layouts.index')
@section('content')
@php
$use = App\UserInfo::where('user_id', Auth::user()->id)->first();
@endphp
<section class="space-m bg-dark-2 shape-1 text-white">
    <div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3 text-center">
        <h1 class="mb-0 text-primary title-2">My Invesment</h1>
        <p>Detail balance invesment thorsiq token</p>
    </div>
    </div>
    </div>
</section>
<section class="space-m">
    <div class="container">
        <div class="row">
        <div class="col-md-4 offset-md-4">
            @if($use)
            <div class="card card-body bg-dark-2 shape-1 text-white mb-3">
    <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                 <div>
                     <span class="text-phase">Thorsiq balance</span>
                 </div>
                 <div>
                     <span class="bx bxs-coin fs-3 text-primary"></span>
                 </div>
             </div>

             <h1 class="title-2 text-primary">00</h1>
             <span class="ms-1 fw-medium">Your balance amount listing <a href="https://bscscan.com/" target="_blank">on bscscan</a></span>
    </div>
    <a href="{{ route('member.exchange') }}" class="btn btn-primary me-3">Exchange</a>
    <a href="{{ route('member.stacking') }}" class="btn btn-primary">Stacking</a>
    @else
    <div class="card card-body">
            <h5 class="title-2 m-0"><i class="bi bi-info-circle-fill text-primary me-2"></i>Notifications</h5>
            <hr>
            <p>Hi {{ Auth::user()->name }}, To see your Thorsiq Token balance, please complete your profile first.</p>
            <a href="{{ route('member.account') }}" class="btn btn-primary">Go Account</a>
            </div>
    @endif


    </div>
        </div>
    </div>
</section>
@endsection
