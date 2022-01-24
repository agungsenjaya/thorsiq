<footer class="space-m bg-dark-2">
      <div class="container">
        <div class="d-flex justify-content-sm-between justify-content-center">
          <div>
          <div class="d-none d-sm-block">
          <nav class="nav nav-bottom opacity-50">
            <a class="nav-link" href="{{ route('index') }}">Home</a>
            <a class="nav-link" href="{{ route('login') }}">Login</a>
            <a class="nav-link" href="{{ route('register') }}">Register</a>
            <a class="nav-link" href="{{ route('member.exchange') }}">Exchange</a>
            <a class="nav-link" href="{{ route('member.stacking') }}">Stacking</a>
            <a class="nav-link" href="{{ route('member.blog') }}">Forum</a>
            <a class="nav-link" href="{{ route('member.contact') }}">Contact us</a>
          </nav>
          </div>
          </div>
          <div>
            <div class="title-2 nav-item align-self-center d-sm-none d-block mb-4 opacity-50 text-white">
              Join Community
            </div>
            <ul class="nav">
              <li class="title-2 nav-item align-self-center me-3 d-none d-sm-block opacity-50 text-white">
                Join Community
              </li>
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
        <hr class="bg-white">
        <div class="d-flex justify-content-center justify-content-sm-start align-items-center text-white title-2">
                <img src="{{ asset('img/logo.png') }}" alt="" width="50" class="d-inline-block me-2"><span class="opacity-50">Powered by thorsiq coin {{ date('Y') }}</span>
              </div>
      </div>
    </footer>