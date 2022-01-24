@extends('layouts.app')
@section('content')
<section>
    <div class="card card-body shadow-sm">
      
    <div class="justify-content-end d-flex pt-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('owner.event') }}">Event</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Event</li>
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

    <form method="POST" action="{{ route('owner.event_store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
  <div class="col-md">
    <label for="" class="form-label">Judul Event</label>
    <input type="text" class="form-control " name="title" required>
  </div>
  <div class="col-md">
    <label for="" class="form-label">Tanggal Event</label>
    <input type="date" class="form-control " name="date" required>
  </div>
  </div>
  <div class="row mb-3">
  <div class="col-md">
    <label for="" class="form-label">Status Event</label>
    <select name="status" class="form-select" required>
      <option value="">-- Select Option --</option>
      <option value="active">Active</option>
      <option value="deactive">Deactive</option>
    </select>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Insert Event</button>
</form>
    </div>
</section>
@endsection