@extends('layouts.index')
@section('content')
<section class="space-m">
    <div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3">


    <div class="row row-cols-1 row-cols-md-2 g-4 text-center">
  <a href="{{ route('member.blog') }}" class="col no-dec">
    <div class="card bg-dark shape-1 text-white rising">
    <div class="p-3">
          <i class="bi bi-calendar3 text-primary display-1"></i>
        </div>
      <div class="card-body">
        <h5 class="card-title title-2 text-primary">Sale Forum<i class="ms-2 bi bi-caret-right-fill"></i> </h5>
        <hr>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
</a>
<a href="{{ route('member.investment') }}" class="col no-dec">
    <div class="card bg-dark shape-1 text-white rising">
    <div class="p-3">
          <i class="bi bi-bar-chart-fill text-primary display-1"></i>
        </div>
      <div class="card-body">
        <h5 class="card-title title-2 text-primary">My Investment<i class="ms-2 bi bi-caret-right-fill"></i> </h5>
        <hr>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </a>
<a href="{{ route('member.stacking') }}" class="col no-dec">
    <div class="card bg-dark shape-1 text-white rising">
    <div class="p-3">
          <i class="bi bi-coin text-primary display-1"></i>
        </div>
      <div class="card-body">
        <h5 class="card-title title-2 text-primary">Stacking<i class="ms-2 bi bi-caret-right-fill"></i> </h5>
        <hr>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </a>
  <a href="{{ route('member.investment') }}" class="col no-dec">
    <div class="card bg-dark shape-1 text-white rising">
    <div class="p-3">
      <i class="bi bi-currency-exchange text-primary display-1"></i>
        </div>
      <div class="card-body">
        <h5 class="card-title title-2 text-primary">Exchange<i class="ms-2 bi bi-caret-right-fill"></i> </h5>
        <hr>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
</a>
</div>
    
    </div>
    </div>
    </div>
</section>
@endsection