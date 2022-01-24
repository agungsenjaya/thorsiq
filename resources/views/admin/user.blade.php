@extends('layouts.app')
@section('content')
@php
$no = 1;
@endphp

<section>
<div class="card card-body shadow-sm">
<table id="table-1" class="table table-striped table-bordered py-3 w-100">
    <thead>
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Email Address</td>
            <td>Role</td>
            <td>Date Reg</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
      @foreach($user->reverse() as $use)
      @if($use->hasRole('member'))
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
          <a href="{{ route('admin.user_detail',['id' => $use -> id]) }}" class="btn btn-primary py-0 w-100">Details</a>
        </td>
      </tr>
      @endif
      @endforeach
    </tbody>
</table>
</div>
</section>



@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table-1').DataTable();
    });
</script>
@endsection