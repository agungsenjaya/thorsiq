@extends('layouts.index')
@section('content')
@php
$no = 0;
$arc = \App\BlogArchive::where('user_id', Auth::user()->id)->get();
@endphp
<section class="space-m bg-dark-2 text-white shape-1">
    <div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3 text-center">
        <h1 class="mb-0 text-primary title-2">Sale Forum</h1>
        <p>Get information for best coin private sale</p>

    </div>
    </div>
    </div>
</section>
<section class="space-m">
    <div class="container">

    <a href="{{ route('member.blog_archive') }}" class="btn btn-primary"><i class="bi bi-archive-fill me-2"></i>Your Archive<span class="ms-2">{{ ($arc) ? counTing(count($arc)) : '00' }}</span></a>

    <div class="row mb-4">
      <div class="col-md-6 offset-md-3 text-center">

      <!-- <div class="input-group">
  <span class="input-group-text" id="basic-addon1">
    <i class="bi bi-search text-white"></i>
  </span>
  <input type="text" name="search" class="form-control" placeholder="Enter search blog title" aria-label="Username" aria-describedby="basic-addon1">
</div> -->

      </div>
    </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($blog->reverse() as $blo)
            <a class="col text-dark no-dec" href="{{ route('member.blog_view',['id' => $blo -> slug]) }}">
                <div class="card rising">
                  <div class="position-relative">
                    <img src="https://dummyimage.com/600x400" class="card-img-top rounded-bottom" alt="..." />
                    @php
                    $ons = \App\BlogArchive::where('blog_id', $blo->id)->where('user_id', Auth::user()->id)->first();
                    @endphp
                    @if($ons)
                    <div class="to-bottom text-end">
                      <div class="btn px-3 btn-primary m-2">
                        <i class="bi bi-archive-fill"></i>
                      </div>
                    </div>
                    @endif
                  </div>
                    <div class="card-body">
                        <h5 class="card-title title-2 text-capitalize">{{ $blo->title }}</h5>
                        <p class="card-text mb-0">{!! substr($blo->content,0,100) !!}..</p>
                    </div>
                    <div class="card-footer py-3 px-0 d-flex justify-content-between text-phase bg-transparent mx-3">
                      <div>
                        <div class="py-1 px-3 rounded bg-primary">
                          <i class="bi bi-lightning-fill me-2"></i>{{ $blo->blogkategori->title }}
                        </div>
                      </div>
                      <div class="fw-semibold">
                        @if($blo->date)
                        @php
                        $future = strtotime(date('d M Y', strtotime($blo->date)));
                        $timefromdb = strtotime(date('d M Y'));
                        $timeleft = $future - $timefromdb;
                        $daysleft = round((($timeleft/24)/60)/60);
                        if($daysleft > 0)
                        {
                          echo $daysleft . ' Day Left';
                        }else{
                          echo 'Deactive';
                        }
                        @endphp
                        @else
                        {{ $blo->status }}
                        @endif
                      </div>
                        <!-- <a href="{{ route('member.blog_view',['id' => $blo -> slug]) }}" class="btn btn-primary w-100">
                            More Detail
                        </a> -->
                    </div>
                </div>
</a>
            @endforeach
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
  // $('input[name="search"]').change(function(){
  //   let a = $(this).val();
  //   $.getJSON(`http://localhost:8000/api/blog_search/${a.replace(/\s+/g, '-')}`,
  //     function (data) {
  //       if (data.code == 200) {
  //         alert(data.data.title);
  //       }
  //     });
  // });
</script>
@endsection