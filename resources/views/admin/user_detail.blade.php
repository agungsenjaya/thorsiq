@extends('layouts.app')
@section('content')
<section>
    <div class="card card-body shadow-sm">
    <div class="justify-content-end d-flex pt-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail User</li>
          </ol>
        </nav>
      </div>

        <table class="table tbale-sm line-2">
            <tr>
                <td>Date Reg</td>
                <td>:</td>
                <td>{{ $user->created_at }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $user->email }}</td>
            </tr>
            @if($info)
            <tr>
          <td>Phone</td>
          <td>:</td>
          <td>{{ $info->phone }}</td>
        </tr>
        <tr>
          <td>Phone 2</td>
          <td>:</td>
          <td>{{ $info->phone_2 }}</td>
        </tr>
        <tr>
          <td>Country</td>
          <td>:</td>
          <td>{{ $info->country }}</td>
        </tr>
        <tr>
          <td>State</td>
          <td>:</td>
          <td>{{ $info->state }}</td>
        </tr>
        <tr>
          <td>City</td>
          <td>:</td>
          <td>{{ $info->city }}</td>
        </tr>
            <tr>
          <td>Contract</td>
          <td>:</td>
          <td>{{ $info->contract_address }}</td>
        </tr>
        <tr>
          <td>Company</td>
          <td>:</td>
          <td>{{ $info->company }}</td>
        </tr>
        <tr>
          <td>VAT</td>
          <td>:</td>
          <td>{{ $info->vat }}</td>
        </tr>
        <tr>
          <td>ZIP</td>
          <td>:</td>
          <td>{{ $info->zip }}</td>
        </tr>
        <tr>
          <td>Street</td>
          <td>:</td>
          <td>{{ $info->street }}</td>
        </tr>
            @endif
        </table>
    </div>
</section>
@endsection