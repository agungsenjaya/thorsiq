@extends('layouts.index')
@section('content')
@php
$data = \App\UserInfo::where('user_id', Auth::user()->id)->first();
@endphp
<section class="space-m bg-dark-2 shape-1 text-white">
    <div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3 text-center">
        <h1 class="mb-0 text-primary title-2">Account Pages</h1>
        <p>Detail infomation your account</p>
    </div>
    </div>
    </div>
</section>
<section class="space-m">
    <div class="container">
    <div class="row">
      <div class="col-md-3 mb-sm-0 mb-3">
        <div class="card card-body">
          <img src="{{ asset('img/user.png') }}" alt="" width="100%" class="d-none d-sm-block">
          <!-- <h5 class="fw-semibold text-capitalize mb-0">{{ Auth::user()->name }}</h5> -->
          <table class="table">
            <tr>
              <td>Name</td>
              <td>:</td>
              <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr class="border-transparent">
              <td>Date Reg</td>
              <td>:</td>
              <td>{{ Auth::user()->created_at->format('d M Y') }}</td>
            </tr>
          </table>
          <!-- <div>
            <i class="bi bi-calendar2 me-2"></i>{{ Auth::user()->created_at->format('d M Y') }}
          </div> -->

          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalOut" class="btn btn-primary mb-3">Logout</a>
          <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalPass" class="btn btn-primary">Change Password</a>
        </div>
      </div>
    <div class="col-md-8">
      <h5 class="title-2 mb-3"><i class="bi bi-info-circle-fill me-2 text-primary"></i>Details information</h5>
    <div class="card card-body">
    @if(!$data)
    <!-- <div class="alert alert-primary d-flex align-items-center" role="alert">
      <i class="bi bi-info-circle-fill me-2 h5 mb-0 align-self-center"></i>
      <div>
        To continue, please complete your profile first
      </div>
    </div> -->
    @endif
    <form action="{{ route('member.account_update') }}" method="POST">
      @csrf
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
  <div class="row">
  <div class="col-md mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" required value="{{ Auth::user()->name }}" disabled>
  </div>
  <div class="col-md mb-3">
    <label class="form-label">Email Address</label>
    <input type="text" class="form-control" required value="{{ Auth::user()->email }}" disabled>
  </div>
</div>
  <div class="row">
  <div class="col-md mb-3">
    <label class="form-label">Telegram ID<span class="text-danger ms-1">*</span></label>
    <input type="text" class="form-control" name="telegram_id" value="{{ ($data) ? $data->telegram_id : '' }}" required>
  </div>
  <div class="col-md mb-3">
    <label class="form-label">Twitter ID<span class="text-danger ms-1">*</span></label>
    <input type="text" class="form-control" name="twitter_id" value="{{ ($data) ? $data->twitter_id : '' }}" required>
  </div>
</div>
<div class="mb-3">
    <label class="form-label">Contract Address<span class="text-danger ms-1">*</span></label>
    <input type="text" class="form-control" name="contract_address" required value="{{ ($data) ? $data->contract_address : '' }}">
  </div>
  <div class="row">
  <div class="col-md mb-3">
    <label class="form-label">Company Name</label>
    <input type="text" class="form-control" name="company_name" value="{{ ($data) ? $data->company_name : '' }}">
  </div>
  <div class="col-md mb-3">
    <label class="form-label">VAT</label>
    <input type="text" class="form-control" name="vat" value="{{ ($data) ? $data->vat : '' }}">
  </div>
  </div>
  <div class="row">
  <div class="col-md mb-3">
    <label class="form-label">Phone<span class="text-danger ms-1">*</span></label>
    <input class="form-control" name="phone" required value="{{ ($data) ? $data->phone : '' }}">
  </div>
  <div class="col-md mb-3">
    <label class="form-label">Phone 2<span class="text-danger ms-1">*</span></label>
    <input class="form-control" name="phone_2" required value="{{ ($data) ? $data->phone_2 : '' }}">
  </div>
  </div>
  <div class="row">
  <div class="col-md mb-3">
    <label class="form-label">Country<span class="text-danger ms-1">*</span></label>
    @if($data && $data->country)
    <input type="hidden" name="country" value="{{ $data->country }}">
    <input class="form-control" required disabled value="{{ ($data) ? $data->country : '' }}">
    @else
    <select name="country" class="form-select" required>
      <option value="">--Select Option--</option>
    </select>
    @endif
  </div>
  <div class="col-md mb-3">
    <label class="form-label">State</label>
    @if($data && $data->country)
    <input type="hidden" name="state" value="{{ $data->state }}">
    <input class="form-control" disabled value="{{ ($data) ? $data->state : '' }}">
    @else
    <select name="state" class="form-select">
      <option value="">--Select Option--</option>
    </select>
    @endif
  </div>
  </div>
  <div class="row">
  <div class="col-md mb-3">
    <label class="form-label">City</label>
    @if($data && $data->country)
    <input type="hidden" name="city" value="{{ $data->city }}">
    <input class="form-control" disabled value="{{ ($data) ? $data->city : '' }}">
    @else
    <select name="city" class="form-select">
      <option value="">--Select Option--</option>
    </select>
    @endif
  </div>
  <div class="col-md mb-3">
    <label class="form-label">ZIP</label>
    <input class="form-control" name="zip" value="{{ ($data) ? $data->zip : '' }}">
  </div>
  </div>
  <div class="mb-3">
    <label class="form-label">Street<span class="text-danger ms-1">*</span></label>
    <textarea class="form-control" name="street" id="" cols="30" rows="3" required>{{ ($data) ? $data->street : '' }}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update Profile</button>
</form>
    </div>
    </div>
    </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modalPass" tabindex="-1" aria-labelledby="modalPassLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPassLabel">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('member.account_password') }}">
      <div class="modal-body">

                        @csrf

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('New Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Change password</button>
                      </div>
                    </form>
    </div>
  </div>
</div>

@endsection
@section('js')
<script>
  @if(!$data)
  const countriesJSON = 'http://localhost:8000/data/countries.json';
  const statesJSON = 'http://localhost:8000/data/states.json';
  const citiesJSON = 'http://localhost:8000/data/cities.json';
  let contid;
  let statid;
  let citid;

  $.getJSON(countriesJSON,
  function (data) {
    $.each(data, function (indexInArray, valueOfElement) { 
      $('select[name="country"]').append(`<option id="${valueOfElement.id}" value="${valueOfElement.name}">${valueOfElement.name}</option>`);
    });
  });

  $('select[name="country"]').change('change', function(){
    $('.state').remove();
    $('.city').remove();
    contid = $(this).children(":selected").attr("id");
    $.getJSON(statesJSON,
      function (data) {
        $.each(data, function (indexInArray, valueOfElement) { 
          if (valueOfElement.country_id == contid) {
            $('select[name="state"]').append(`<option class="state" id="${valueOfElement.id}" value="${valueOfElement.name}">${valueOfElement.name}</option>`);
          }
        });
      }
    );
  });

  $('select[name="state"]').change('change', function(){
    $('.city').remove();
    statid = $(this).children(":selected").attr("id");
    $.getJSON(citiesJSON,
      function (data) {
        $.each(data, function (indexInArray, valueOfElement) { 
          if (valueOfElement.state_id == statid) {
            $('select[name="city"]').append(`<option class="city" id="${valueOfElement.id}" value="${valueOfElement.name}">${valueOfElement.name}</option>`);
          }
        });
      }
    );
  });
  @endif
</script>
  @endsection