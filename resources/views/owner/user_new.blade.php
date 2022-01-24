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

        <div class="alert alert-primary" role="alert">
          <i class="bi bi-check-circle-fill me-2"></i>Penambahan akun admin hanya bisa dilakukan oleh owner
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

    <form action="{{ route('owner.user_store') }}" method="POST">
      @csrf
      <div class="row mb-3">
        <div class="col-md">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="col-md">
          <label class="form-label">Email Address</label>
          <input type="email" class="form-control" name="email" required>
        </div>
      </div>
  <div class="row mb-3">
    <div class="col-md">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        </div>

                        

  <button type="submit" class="btn btn-primary">Tambah User</button>
</form>

        </div>
</section>
@endsection