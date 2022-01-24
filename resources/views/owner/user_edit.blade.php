@extends('layouts.app')
@section('content')
<section>
        <div class="card card-body shadow">

        <div class="d-flex justify-content-between">
					<div>
						
					</div>
					<div>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{ route('owner.user') }}">Users</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Create user</li>
							</ol>
						</nav>
					</div>
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

    <form action="{{ route('owner.user_update', ['id' => $data -> id]) }}" method="POST">
      @csrf
      <div class="row mb-3">
        <div class="col-md">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" required value="{{ $data->name }}">
        </div>
        <div class="col-md">
          <label class="form-label">Email Address</label>
          <input type="email" class="form-control" name="email" required value="{{ $data->email }}">
        </div>
      </div>
  <button type="submit" class="btn btn-primary">Update User</button>
  <a href="{{ route('owner.user_delete',['id' => $data -> id]) }}" class="btn btn-primary">Hapus User</a>
</form>

        </div>
</section>
@endsection