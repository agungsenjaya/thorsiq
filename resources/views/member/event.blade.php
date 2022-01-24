@extends('layouts.index')
@section('content')
@php
$ven = App\Event::find(1);
$use = App\UserInfo::where('user_id', Auth::user()->id)->first();
$eve = App\EventUser::where('user_id', Auth::user()->id)->first();
@endphp
<section class="space-m bg-dark-2 shape-1 text-white">
    <div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3 text-center">
        <h1 class="mb-0 text-primary title-2">Private Sale</h1>
        <p>Private sale thorsiq token</p>
    </div>
    </div>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="">
        @if($use)
        @if($eve)

        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card card-body">

        <!-- <label class="form-label">Your Total Contribution (BNB)</label> -->
        <h5 class="title-2 m-0"><i class="bi bi-check-circle-fill text-primary me-2"></i>Total Contribution</h5>
            <hr>
            <table class="table">
                <tr class="border-transparent">
                    <td>BNB</td>
                    <td>:</td>
                    <td class="title-2">{{ $eve->token }}</td>
                </tr>
            </table>
            <div class="alert alert-primary">
                <p class="mb-0">Thanks for contribution thorsiq token</p>
            </div>
        <!-- <h3 class="title-1">{{ $eve->token }}</h3> -->
</div>
</div>
</div>
        @else
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card card-body">
                <h5 class="title-2 m-0"><i class="bi bi-info-circle-fill text-primary me-2"></i>Contribution (Bnb)</h5>
            <hr>
        <form action="{{ route('member.event_store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="mb-3">
                <input id="number" class="form-control" name="token" placeholder="Insert Total Contribution (BNB)">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Insert Contribution</button>
            </div>
        </form>
    </div>
    </div>
    </div>
        @endif
        @elseif(!$use)
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card card-body">
            <h5 class="title-2 m-0"><i class="bi bi-info-circle-fill text-primary me-2"></i>Notifications</h5>
            <hr>
            <p>Hi {{ Auth::user()->name }}, to take part in the private sale, please complete your profile information</p>
            <a href="{{ route('member.account') }}" class="btn btn-primary">Go Account</a>
            </div>
        </div>
        </div>
        @endif
    </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script>
    // let masa = document.getElementById('number');
    // let maskOptions = {
    //     mask: Number,
    //     radix: '.'
    // };
    // let mask = IMask(masa,maskOptions);
</script>
@endsection