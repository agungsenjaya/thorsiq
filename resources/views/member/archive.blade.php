@extends('layouts.index')
@section('content')
<section class="space-m bg-dark-2 shape-1 text-white">
    <div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3 text-center">
        <h1 class="mb-0 text-primary title-2">Archived sale</h1>
        <p>Your sale forum archived</p>
    </div>
    </div>
    </div>
</section>
<section class="space-m">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
              @if(count($data))
              <a href="{{ route('member.blog') }}" class="btn btn-primary">Explore Sale</a>
              @endif
              @if(count($data))
            <ul class="list-group list-group-flush list-arc">
                @foreach($data as $dat)
                <li class="list-group-item" id="{{ $dat->blog->id }}">
                    <div class="media py-3">
                        <img src="https://dummyimage.com/400" alt=""width="250" class="me-3">
                    <div class="media-body">
                    <!-- <div class="py-1 px-3 rounded btn bg-primary text-phase">
                    <i class="bi bi-lightning-fill me-2"></i>{{ $dat->blog->blogkategori->title }}
                  </div> -->
<div class="d-flex justify-content-between mb-3 text-phase">
  <div class="align-self-center">
                            <span class="text-dark">
                              @if($dat->blog->date)
                              <i class="bi bi-calendar2 me-2"></i>{{ $dat->blog->date }}
                              @else
                              No time
                              @endif
                            </span>
  </div>
<div>
                  <button type="button" class="btn-icon rounded border-0 bg-primary">
                    <a href="{{ route('member.blog_rearchive',['id' => $dat -> id]) }}" class="text-dark">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708z"/>
</svg>
</a>
                  </button>
                  </div>
                  </div>

                        <h4 class="title-2 text-capitalize">{{ $dat->blog->title }}</h4>
                        <p class="card-text mb-0">{!! substr($dat->blog->content,0,200) !!}..</p>
                        <a href="{{ route('member.blog_view',['id' => $dat -> blog -> slug]) }}" class="btn btn-primary me-2">Details</a>
                        <a href="{{ $dat->blog->link }}" class="btn btn-dark" target="_blank">Website</a>
                    </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <!-- <p class="text-dark">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima illum accusamus ab quae, numquam esse quibusdam doloribus autem vitae laboriosam. Ab aut quae dolorum sit architecto ex tempora sint repellat?</p> -->
            <div class="text-center text-secondary col-md-4 offset-md-4 no-arc">
              <div class="card card-body mb-4 border-dash py-5">
                <i class="bi bi-archive-fill display-1"></i>
                <p class="mb-0">You dont have archived forum</p>
              </div>
              <a href="{{ route('member.blog') }}" class="btn btn-primary">Explore Forum</a>
            </div>
            @endif
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
  var liveBlog = new bootstrap.Toast(document.getElementById('liveBlog'));
  @if(Session::has('liveblog'))
  liveBlog.show();
  @endif
</script>
@endsection