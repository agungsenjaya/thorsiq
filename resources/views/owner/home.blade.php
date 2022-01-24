@extends('layouts.app')
@section('content')
@php
$no = 1;
@endphp
<section>
<div class="row">
 <div class="col-xl-4 col-lg-6 col-md-12 col-12">
     <!-- card -->
     <div class="card shape-1 shadow-sm bg-dark text-white">
         <!-- card body -->
         <div class="card-body">
             <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                 <div>
                     <span class="text-phase">Users</span>
                 </div>
                 <div>
                     <span class="bx bxs-user fs-3 text-primary"></span>
                 </div>
             </div>
             <h2 class="fw-bold text-primary">
                 {{ counTing(count($user)) }}
             </h2>
             <span class="ms-1 fw-medium">Jumlah user yang terdaftar</span>
         </div>
     </div>
 </div>
 <div class="col-xl-4 col-lg-6 col-md-12 col-12">
     <!-- card -->
     <div class="card shape-1 shadow-sm bg-dark text-white">
         <!-- card body -->
         <div class="card-body">
             <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                 <div>
                     <span class="text-phase">Artikel</span>
                 </div>
                 <div>
                     <span class="bx bxs-message-square-dots fs-3 text-primary"></span>
                 </div>
             </div>
             <h2 class="fw-bold text-primary">
                {{ counTing(count($blog)) }}
             </h2>
             <span class="ms-1 fw-medium">Jumlah artikel pada website</span>
         </div>
     </div>
   </div>
 <div class="col-xl-4 col-lg-6 col-md-12 col-12">
     <!-- card -->
     <div class="card shape-1 shadow-sm bg-dark text-white">
         <!-- card body -->
         <div class="card-body">
             <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                 <div>
                     <span class="text-phase">Stacking</span>
                 </div>
                 <div>
                     <span class="bx bxs-coin-stack fs-3 text-primary"></span>
                 </div>
             </div>
             <h2 class="fw-bold text-primary">
                 00
             </h2>
             <span class="ms-1 fw-medium">Jumlah stacking coin</span>
         </div>
     </div>
   </div>
</div>
</section>
@if(count($blog))
<section class="mt-4">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div>
                <h5 class="mb-3 title-2">New Artikel</h5>
            </div>
            <div>
                <a href="{{ route('owner.blog') }}">Show All Artikel</a>
            </div>
        </div>
<!-- Swiper -->
<div class="swiper mySwiper">
      <div class="swiper-wrapper">
        @foreach($blog->take(8)->reverse() as $blo)
        <div class="swiper-slide">
            <a class="text-dark no-dec" href="{{ route('owner.blog_edit',['id' => $blo -> id]) }}" target="_blank">
                <div class="card bg-dark shape-1 text-white">
                    <div class="card-header border-0 text-phase d-flex justify-content-between">
                        <div>
                            <i class="bi bi-check-circle-fill text-primary me-2"></i>{{ $blo->user->roles[0]->name }}
                        </div>
                        <div>
                            {{ $blo->created_at->format('d M Y') }}
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-title text-capitalize mb-0">{{ $blo->title }}</p>
                        <!-- <p class="card-text mb-0">{!! substr($blo->content,0,100) !!}..</p> -->
                    </div>
                    <div class="card-footer py-3 px-0 d-flex justify-content-between text-phase bg-transparent mx-3">
                      <div>
                        <div class="py-1 px-3 rounded bg-primary text-dark">
                          <i class="bi bi-lightning-fill me-2"></i>{{ $blo->blogkategori->title }}
                        </div>
                      </div>
                      <div class="fw-semibold">
                        @php
                        $future = strtotime(date('d M Y', strtotime($blo->date)));
                        $timefromdb = strtotime(date('d M Y'));
                        $timeleft = $future - $timefromdb;
                        $daysleft = round((($timeleft/24)/60)/60);
                        if($daysleft > 0)
                        {
                          echo $daysleft . ' Day Left';
                        }else{
                          echo 'Closed';
                        }
                        @endphp
                      </div>
                    </div>
                </div>
</a>
</div>
@endforeach
      </div>
      <div class="swiper-pagination position-relative mt-4 justify-content-start d-flex"></div>
    </div>


    </div>
</section>
@endif
<section class="mt-4">
    <div class="container">
        <h5 class="mb-3 title-2">User Table</h5>

        <div class="card card-body shadow-sm">
<table id="table-1" class="table table-striped table-bordered py-3 w-100">
    <thead>
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Email Address</td>
            <td>Role</td>
            <td>Date Reg</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
      @foreach($user->reverse() as $use)
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td class="text-capitalize">{{ $use->name }}</td>
        <td>{{ $use->email }}</td>
        <td>
          @if($use->hasRole('owner') || $use->hasRole('admin'))
          <span class="w-100 bg-primary badge rounded-pill text-dark">
            {{ $use->roles[0]->name }}
          </span>
          @else
          <span class="w-100 bg-secondary badge rounded-pill">
            {{ $use->roles[0]->name }}
          </span>
          @endif
        </td>
        <td>{{ $use->created_at }}</td>
        <td>
          <a href="{{ route('owner.user_detail',['id' => $use -> id]) }}" class="btn btn-primary py-0 w-100">Details</a>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
</div>

    </div>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="{{ asset('css/swiper.css') }}" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table-1').DataTable();
    });
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
@endsection