@extends('layouts.app')
@section('content')
@php
$no = 1;
@endphp
<section class="mb-4">
    <div class="alert alert-primary shadow-sm">
        <div class="row">
            <div class="col-md align-self-center">
            <div class="media">
                    <!-- <i class="bx bxs-calendar-alt me-3 h1 text-primary"></i> -->
                    <div class="media-body">
                        <h5 class="title-2">{{ $event[0]->title }}</h5>
                        <span class="badge bg-primary px-3">{{ $event[0]->status }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md border-start ps-4">
                <label for="" class="form-label text-capitalize">Pengikut {{ $event[0]->title }}</label>
                <h4 class="title-1 mb-0">{{ counTing(count($eventuser)) }}</h4>
            </div>
            <div class="col-md border-start ps-4">
                <label for="" class="form-label">Change Status</label>
                <select class="form-select" name="status" id="">
                    <option value="active" {{ ($event[0]->status == 'active') ? 'selected' : '' }}>Active</option>
                    <option value="deactive" {{ ($event[0]->status == 'deactive') ? 'selected' : '' }}>Deactive</option>
                </select>
            </div>
        </div>
    </div>
</section>
<section class="card card-body">
<table id="table-1" class="table table-striped table-bordered py-3 w-100">
    <thead>
        <tr>
            <td>No</td>
            <td>Name</td>
            <td>Email</td>
            <td>Address Walllet</td>
            <td>Contribution (BNB)</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
      @foreach($eventuser->reverse() as $eve)
      <tr>
        <td>{{ counTing($no++) }}</td>
        <td class="text-capitalize">{{ $eve->user->name }}</td>
        <td>{{ $eve->user->email }}</td>
        <td>
            @php
            $dat = App\UserInfo::where('user_id', $eve->user->id)->first();
            @endphp
            {{ $dat->contract_address }}
        </td>
        <td>{{ $eve->token }}</td>
        <td>
          <a href="{{ route('owner.user_detail',['id' => $eve -> user -> id]) }}" class="btn btn-primary py-0 w-100">Details User</a>
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
</section>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.1/css/dataTables.dateTime.min.css">
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

<script>
    var table = $('#table-1').DataTable({
      "info": true,
      "paging": true,
      dom: 'lBfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
    });

    $('select[name="status"]').on('change',function(){
        $.getJSON("http://localhost:8000/api/event_status",
            function (data) {
                console.log(data.data);
                alert('Private sale kamu ' + data.data + ' bor');
            }
        );
    });
</script>
@endsection