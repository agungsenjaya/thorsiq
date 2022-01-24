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
            <td>Title</td>
            <td>Images</td>
            <td>Posted by</td>
            <td>Date Post</td>
            <td>Date End</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
      @foreach($blog->reverse() as $blo)
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td class="text-capitalize">{{ $blo->title }}</td>
        <td>
        <a href="javascript:void(0)" data-caption="{{ $blo->title }}" data-fancybox="{{ $blo->id }}" data-src="{{ url($blo->img) }}" class="">
          <i class="bi bi-eye-fill me-2"></i>Preview
        </a>
        </td>
        <td class="text-capitalize"><i class="bi bi-check-circle-fill me-2 text-primary"></i>{{ $blo->user->name }}</td>
        <td>{{ $blo->created_at->format('Y-m-d') }}</td>
        <td>
          @if($blo->date)
          {{ $blo->date }}
          @else
          -
          @endif
        </td>
        <td>
          <a href="{{ route(Auth::user()->roles[0]->name.'.blog_edit',['id' => $blo -> id]) }}" class="btn btn-primary py-0 w-100">Edit</a>
        </td>
      </tr>
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