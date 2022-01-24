<!-- Modal Logout -->
<div class="modal fade" id="modalOut" tabindex="-1" aria-labelledby="modalOutLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalOutLabel">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <!-- <i class="bi bi-x-circle-fill text-dark display-2"></i> -->
        <i class='bx bx-log-out-circle display-2 text-dark'></i>
        <p class="text-dark">Are you sure you want to leave the account?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout Now</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Artikel -->
<div class="modal fade" id="modalLog" tabindex="-1" aria-labelledby="modalLogLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLogLabel">Notifications</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Untuk melihat berita seputar crypto, anda harus login atau register terlebih dahulu.
      </div>
      <div class="modal-footer">
        <a class="btn btn-dark" href="{{route('register')  }}">Register</a>
        <a class="btn btn-primary" href="{{ route('login') }}">Login Now</a>
      </div>
    </div>
  </div>
</div>