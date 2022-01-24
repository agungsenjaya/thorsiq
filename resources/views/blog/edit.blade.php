@extends('layouts.app')
@section('content')
<section>
    <div class="card card-body shadow-sm">
      
    <div class="justify-content-end d-flex pt-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route(Auth::user()->roles[0]->name.'.blog') }}">Blogs</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>
          </ol>
        </nav>
      </div>

      @if($errors->any())
        <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
          <p class="fw-bold">Error Listing</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <ul class="list-group list-group-flush line-h-2 list-error">
          @foreach ($errors->all() as $error)
              <li class="list-group-item">{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif

    <form method="POST" action="{{ route(Auth::user()->roles[0]->name.'.blog_update',['id' => $data -> id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
  <div class="col-md">
    <label for="" class="form-label">Judul Blog<span class="text-danger ms-1">*</span></label>
    <input type="text" class="form-control " name="title" required value="{{ $data->title }}">
  </div>
  <div class="col-md">
    <label for="" class="form-label">Gambar Utama<span class="ms-2 fw-light"> <a href="javascript:void(0)" data-caption="{{ $data->title }}" data-fancybox="{{ $data->id }}" data-src="{{ url($data->img) }}" class="">
          <i class="bi bi-eye-fill me-2"></i>Current Images
        </a></span></label>
    <div class="position-relative">
    <input type="file" class="file form-control" name="img">
    <div class="px-3 d-flex justify-content-between align-items-center bg-light border border-dash rounded a1 pointer to-center">
      <div>
        <span class="a2 opacity-50">Masukan Gambar</span>
      </div>
      <div>
        <div class="ps-3 border-start">
          <i class="bi bi-camera-fill"></i> 
        </div>
      </div>
    </div>
    </div>
    
  </div>
  <div class="col-md">
  <label for="" class="form-label">Tanggal</label>
  <input type="date" class="form-control" name="date" value="{{ $data->date }}">
  </div>
  </div>
  <div class="row">
  <div class="mb-3 col-md">
  <label for="" class="form-label">Kategori Blog<span class="text-danger ms-1">*</span></label>
  <select name="blogkategori_id" id="" class="form-select" required>
    <option value="">-- Select Option --</option>
    @foreach($blogkategori as $kat)
    <option value="{{ $kat->id }}" {{ ($data->blogkategori_id == $kat->id) ? 'selected' : '' }}>{{ $kat->title }}</option>
    @endforeach
  </select>
  </div>
  <div class="mb-3 col-md">
  <label for="" class="form-label">Website<span class="text-danger ms-1">*</span></label>
  <input type="text" class="form-control" name="link" required value="{{ $data->link }}">
  </div>
  </div>
  <div class="row">
  <div class="mb-3 col-md">
  <label for="" class="form-label">Facebook</label>
  <input type="text" class="form-control" name="facebook" value="{{ $data->facebook }}">
  </div>
  <div class="mb-3 col-md">
  <label for="" class="form-label">Twitter</label>
  <input type="text" class="form-control" name="twitter" value="{{ $data->twiter }}">
  </div>
  <div class="mb-3 col-md">
  <label for="" class="form-label">Telegram</label>
  <input type="text" class="form-control" name="telegram" value="{{ $data->telegram }}">
  </div>
  <div class="mb-3 col-md">
  <label for="" class="form-label">Youtube</label>
  <input type="text" class="form-control" name="youtube" value="{{ $data->youtube }}">
  </div>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <textarea id="summer" name="content" required>{{ $data->content }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary me-3">Update Blog</button>
  @if(Auth::user()->hasRole('owner'))
  <a href="{{ route('owner.blog_delete',['id' => $data -> id]) }}" class="btn btn-secondary"><i class="bi bi-slash-circle me-2"></i>Delete Blog</a>
  @endif
</form>
    </div>
</section>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summer').summernote({
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      
      $('.a1').on('click', function(){
        $('.file').trigger('click');
      });

      $(".file").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        if (fileName) {
          $('.a2').text(fileName);
        }else{
          $('.a2').text('Masukan Gambar');
        }
      });
</script>
@endsection