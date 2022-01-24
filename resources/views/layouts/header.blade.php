<coingecko-coin-price-marquee-widget  coin-ids="cardano,bitcoin,ethereum,binancecoin" currency="usd" background-color="#1a1a1a" locale="en" font-color="#ffffff"></coingecko-coin-price-marquee-widget>
@guest
@else
@php
$arc = \App\BlogArchive::where('user_id', Auth::user()->id)->get();
@endphp
@endguest
<header class="d-none d-sm-block">
<nav class="navbar navbar-dark bg-dark p-0">
  <div class="container">
    <a class="navbar-brand" href="{{ route('index') }}">
      <img src="{{ asset('img/logo.png') }}" alt="" width="70">
    </a>
    <ul class="nav me-auto nav-top-2 opacity-50">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.blog') }}">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.exchange') }}">Exchange</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.stacking') }}">Stacking</a>
        </li>
        @php
        $emon = App\Event::find(1);
        @endphp
        @if($emon)
        @if($emon->status == 'active')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.event') }}">Private sale</a>
        </li>
        @endif
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('member.contact') }}">Contact Us</a>
        </li>
        
      </ul>
      <ul class="nav ms-auto mb-2 mb-lg-0 nav-top-2">
        @guest
          @else
        <li class="nav-item opacity-50">
          <a class="nav-link" href="{{ route('member') }}">Member Area</a>
        </li>
        <li class="nav-item">
          <a class="btn border border-primary py-1 px-3" href="{{ route('member.blog_archive') }}">
            <div class="text-primary">
              <i class="bi bi-archive-fill"></i><span class="ms-2 arc-1">{{ ($arc) ? counTing(count($arc)) : '00' }}</span>
            </div>
          </a>
        </li>
        @endguest
        <li class="nav-item dropdown">
          <a class="py-1 btn btn-primary text-dark align-items-center d-flex" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account Page<i class='bx bx-chevron-down ms-1'></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end mt-3" aria-labelledby="navbarDropdown">
            @guest
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">register</a></li>
            @else
            <li><a class="dropdown-item" href="{{ route('member.account') }}">Account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalOut">Logout</a>
          </li>
          @endguest
          </ul>
        </li>
      </ul>
  </div>
</nav>
</header>
<header class="d-sm-none d-block sticky-top">
<nav class="navbar navbar-dark bg-dark-2 p-0">
  <div class="container">
  <a class="navbar-brand" href="{{ route('index') }}">
      <img src="{{ asset('img/logo.png') }}" alt="" width="60">
    </a>

    <ul class="nav ms-auto nav-top-2">

    <li class="nav-item dropdown">
          <a class="py-1 btn btn-primary text-dark align-items-center d-flex" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account<i class='bx bx-chevron-down ms-1'></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end mt-3" aria-labelledby="navbarDropdown">
            @guest
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">register</a></li>
            @else
            <li><a class="dropdown-item" href="{{ route('member') }}">Member</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('member.account') }}">Account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a href="javascript:void(0)" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalOut">Logout</a>
          </li>
          @endguest
          </ul>
        </li>

    
        <li class="nav-item mx-2">
          <a class="nav-link p-0" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#menuMobile" aria-controls="menuMobile">
            <i class="bi bi-list text-primary h1 m-0"></i>
          </a>
        </li>
        
      </ul>
    
  </div>
</nav>
</header>

<div class="offcanvas offcanvas-end" tabindex="-1" id="menuMobile" aria-labelledby="menuMobileLabel">
  <div class="offcanvas-header bg-dark-2 justify-contentl-between">
@guest
<div></div>
@else
<a class="btn border border-primary py-1 px-3" href="{{ route('member.blog_archive') }}">
  <div class="text-primary">
    <i class="bi bi-archive-fill"></i><span class="ms-2 arc-2">{{ ($arc) ? counTing(count($arc)) : '00' }}</span>
  </div>
</a>
@endguest
  
    <button type="button" class="btn-close bg-primary opacity-100 text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body bg-dark-2">

  <ul class="list-group list-group-flush list-res">
        <li class="list-group-item">
          <a class="nav-link" href="{{ route('index') }}">Home</a>
        </li>
        @guest
        @else
        <li class="list-group-item">
          <a class="nav-link" href="{{ route('member') }}">Member Area</a>
        </li>
        @endguest
        @php
        $emon = App\Event::find(1);
        @endphp
        @if($emon)
        @if($emon->status == 'active')
        <li class="list-group-item">
          <a class="nav-link" href="{{ route('member.event') }}">Private sale</a>
        </li>
        @endif
        @endif
        <li class="list-group-item">
          <a class="nav-link" href="{{ route('member.blog') }}">Forum</a>
        </li>
        <li class="list-group-item">
          <a class="nav-link" href="{{ route('member.exchange') }}">Exchange</a>
        </li>
        <li class="list-group-item">
          <a class="nav-link" href="{{ route('member.stacking') }}">Stacking</a>
        </li>
        <li class="list-group-item">
          <a class="nav-link" href="{{ route('member.contact') }}">Contact Us</a>
        </li>
        
      </ul>

      <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="https://twitter.com/THORSIQ" target="_blank">
                  <i class="bi h4 text-warn bi-twitter"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://t.me/THORSIQ_GLOBAL" target="_blank">
                  <i class="bi h4 text-warn bi-telegram"></i>
                </a>
              </li>
            </ul>
    
  </div>
</div>