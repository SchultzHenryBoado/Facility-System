<nav class="navbar navbar-expand-lg bg-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <i class="fa-sharp fa-solid fa-bars-staggered __icon"></i>
    </button>
    <a class="navbar-brand fw-bold text-white __navbar-brand" href="/schedule">Facility Management System</a>

    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
        <li class="nav-item text-center">
          <a href="/schedule" class="nav-link text-light">Schedule</a>
        </li>
        <li class="nav-item text-center">
          <a href="/reservation" class="nav-link text-light">Reservation</a>
        </li>
        <li class="nav-item text-center">
          <a href="/accept" class="nav-link text-light">Accept</a>
        </li>
        <li class="nav-item text-center">
          <a href="/cancel" class="nav-link text-light">Cancel</a>
        </li>
        <!-- USERS MENU -->
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="fa-sharp fa-solid fa-user"></i>
          </button>
          <ul class="dropdown-menu dropdown-menu-lg-end">
            <li class="nav-item text-center">
              <a class="dropdown-item" href="/change_password">Change Password</a>
            </li>
            <li class="nav-item text-center">
              <a class="dropdown-item" href="/history">History</a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="nav-item text-center">
              <a class="dropdown-item" href="/logout">Logout</a>
            </li>
          </ul>
        </div>
      </ul>
    </div>
  </div>
</nav>
