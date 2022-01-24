@extends('layouts.index')
@section('content')
@php
$future = strtotime(date('d M Y', strtotime($data->date)));
$timefromdb = strtotime(date('d M Y'));
$timeleft = $future - $timefromdb;
$daysleft = round((($timeleft/24)/60)/60);
@endphp
<div class="py-3 bg-dark-2 shape-1">
<div class="container">
<div class="row">
<div class="col-md-6 offset-md-3">
<div class="d-flex justify-content-between">
    <div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a class="no-dec" href="{{ route('member.blog') }}">Blogs</a></li>
          <li class="breadcrumb-item active text-capitalize" aria-current="page">{{ $data->title }}</li>
      </ol>
    </nav>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>
<section class="space-m">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-capitalize title-2 mb-3">{{ $data->title }}</h2>
                <img src="{{ url($data->img) }}" alt="" width="100%" class="rounded">
                <div class="d-flex justify-content-between my-3 p-3 bg-dark-2 rounded text-white d-none">
                    <div class="align-self-center"><i class="bi bi-lightning-fill text-primary me-2"></i>{{ $data->date }}</div>
                    <div>
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded-pill px-4"><i class="bi bi-plus-lg me-1"></i>Archive</a>
                    </div>
                </div>

                <div class="abc d-none">{{ str_replace('-','/',$data->date) }}</div>
                <div class="row py-3">
                  <div class="align-self-center col-md-3 mb-sm-0 mb-3 text-center text-end-sm">
                  <div class="btn btn-primary py-1 px-3">
                    <i class="bi bi-lightning-fill me-2"></i>{{ $data->blogkategori->title }}
                  </div>
                  </div>
                  <div class="col-md-9 d-flex justify-content-lg-end justify-content-center">
                    @if($data->date)
                    @if($daysleft > 0)
                    <div class="d-flex" id="time2"></div>
                    @else
                    <span class="text-phase">Deactive</span>
                    @endif
                    @else
                    <span class="text-phase">{{ $data->status }}</span>
                    @endif
                  </div>
                </div>
                <hr class="m-0">
                <p>{!! $data->content !!}</p>
                <hr>
                @if($data->facebook || $data->youtube || $data->instagram || $data->twitter)
                <div class="d-flex justify-content-between">
                  <div class="align-self-center fw-semibold text-phase">Project Community :</div>
                  <div>
                  <ul class="nav social-nav">
                    @if($data->facebook)
                  <li class="nav-item">
                    <a class="nav-link" href="{{ $data->facebook }}" target="_blank">
                      <i class="bi bi-facebook"></i>
                    </a>
                  </li>
                  @endif
                  @if($data->twitter)
                  <li class="nav-item">
                    <a class="nav-link" href="{{ $data->twitter }}" target="_blank">
                      <i class="bi bi-twitter"></i>
                    </a>
                  </li>
                  @endif
                  @if($data->telegram)
                  <li class="nav-item">
                    <a class="nav-link" href="{{ $data->telegram }}" target="_blank">
                      <i class="bi bi-telegram"></i>
                    </a>
                  </li>
                  @endif
                  @if($data->youtube)
                  <li class="nav-item">
                    <a class="nav-link" href="{{ $data->youtube }}" target="_blank">
                      <i class="bi bi-youtube"></i>
                    </a>
                  </li>
                  @endif
                </ul>
                  </div>
                </div>
                <hr>
                @endif
                <div class="d-flex text-center justify-content-center">
                    <div class="me-2">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalArchive" class="btn btn-primary archive {{ ($archive) ? 'd-none' : '' }} px-4"><i class="bi bi-plus-circle me-2"></i>Archive</button>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#modalRemoveArchive" class="btn btn-secondary rearchive {{ ($archive) ? '' : 'd-none' }} px-4"><i class="bi bi-slash-circle me-2"></i>Archive</button>
                    </div>
                    <div>
                        <a href="{{ $data->link }}" target="_blank" class="btn btn-dark px-4">Website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Archive -->
<div class="modal fade" id="modalArchive" tabindex="-1" aria-labelledby="modalArchiveLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalArchiveLabel">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form_up">
      <input type="hidden" name="blog_id" value="{{ $data->id }}">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <div class="modal-body text-center">

          <i class="bx bx-archive-in text-dark display-2"></i>
          <p class="mb-0">Add {{ $data->title }} to your archive?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary save-data">Archive Now</button>
            </div>
        </form>
    </div>
  </div>
</div>
<!-- Modal Remove Archive -->
<div class="modal fade" id="modalRemoveArchive" tabindex="-1" aria-labelledby="modalRemoveArchiveLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRemoveArchiveLabel">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form_down">
      <input type="hidden" name="blog_id" value="{{ $data->id }}">
      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      <div class="modal-body text-center">
          <i class="bx bx-archive-out text-dark display-2"></i>
          <p class="mb-0">Remove {{ $data->title }} in your archive?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary remove-data">Remove Now</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
<script>


var liveBlog = new bootstrap.Toast(document.getElementById('liveBlog'));

var modalSatu = new bootstrap.Modal(document.getElementById('modalArchive'), {
  keyboard: false
});

var modalDua = new bootstrap.Modal(document.getElementById('modalRemoveArchive'), {
  keyboard: false
});

$(".save-data").click(function(event){
      event.preventDefault();

      let blog_id = $("input[name=blog_id]").val();
      let user_id = $("input[name=user_id]").val();
      let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: `http://localhost:8000/api/blog_archive`,
        type:"POST",
        data:{
          blog_id:blog_id,
          user_id:user_id,
          _token: _token
        },
        success:function(response){
            if (response) {
                $('.archive').addClass('d-none');
                $('.rearchive').removeClass('d-none');
                modalSatu.hide();
                liveBlog.show();

                let ar = Number($('.arc-1').text()) + 1;
                if ($('.arc-1').text() == '00') {
                    $('.arc-1').text('0' + ar);
                }else{
                  if (ar.length == 1) {
                    $('.arc-1').text('0' + ar);
                  }else{
                    $('.arc-1').text('0'+ar);

                  }

                }
                
                let arr = Number($('.arc-2').text()) + 1;
                if ($('.arc-2').text() == '00') {
                    $('.arc-2').text('0' + arr);
                }else{
                  if (arr.length == 1) {
                    $('.arc-2').text('0' + arr);
                  }else{
                    $('.arc-2').text('0'+arr);

                  }

                }

            }
          console.log(response);
          if(response.data == 'insert'){
            //   
          }else{
            //   
          }
        },
        error: function(error) {
         console.log(error);
        }
       });
    });

  $(".remove-data").click(function(event){
      event.preventDefault();

      let blog_id = $("input[name=blog_id]").val();
      let user_id = $("input[name=user_id]").val();
      let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: `http://localhost:8000/api/blog_rearchive`,
        type:"POST",
        data:{
          blog_id:blog_id,
          user_id:user_id,
          _token: _token
        },
        success:function(response){
            if (response) {
                $('.rearchive').addClass('d-none');
                $('.archive').removeClass('d-none');
                modalDua.hide();
                liveBlog.show();
                
                let ar = $('.arc-1').text() - 1;
                if (ar.length == 1) {
                  $('.arc-1').text('0' + ar);
                }else{
                  $('.arc-1').text('0'+ar);
                }
                
                let arr = $('.arc-2').text() - 1;
                if (arr.length == 1) {
                  $('.arc-2').text('0' + arr);
                }else{
                  $('.arc-2').text('0'+arr);
                }
            }
          if(response.data == 'delete'){
            //   
          }else{
            //   
          }
        },
        error: function(error) {
         console.log(error);
        }
       });
    });

  $("#time2")
  .countdown($('.abc').text())
  .on("update.countdown", function (event) {
    var $this = $(this).html(
      event.strftime(
        "" +
          '<div class="me-3"><div class="card card-body bg-dark text-white border-0"><h5 class="mb-0 title-2">%D</h5></div><small class="text-uppercase font-12">Days</small></div>' +
          '<div class="me-3"><div class="card card-body bg-dark text-white border-0"><h5 class="mb-0 title-2">%H</h5></div><small class="text-uppercase font-12">Hours</small></div>' +
          '<div class="me-3"><div class="card card-body bg-dark text-white border-0"><h5 class="mb-0 title-2">%M</h5></div><small class="text-uppercase font-12">Minutes</small></div>' +
          '<div class="me-3"><div class="card card-body bg-dark text-white border-0"><h5 class="mb-0 title-2">%S</h5></div><small class="text-uppercase font-12">Second</small></div>'
      )
    );
  });


</script>
@endsection