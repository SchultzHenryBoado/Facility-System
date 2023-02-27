 <!-- NAVBAR -->
 <nav class="navbar navbar-expand-lg bg-primary">
   <div class="container-fluid">
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
       <i class="fa-sharp fa-solid fa-bars-staggered __icon"></i>
     </button>
     <a class="navbar-brand fw-bold text-white __navbar-brand" href="/dashboard">Facility Management
       System</a>

     <div class="collapse navbar-collapse" id="nav">
       <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-5">
         <li class="nav-item text-center">
           <a href="/dashboard" class="nav-link text-light">Dashboard</a>
         </li>
         <li class="nav-item text-center">
           <a href="/pending_reservation" class="nav-link text-light">Pending Reservation</a>
         </li>
         <li class="nav-item text-center">
           <a href="/approved" class="nav-link text-light">Approved</a>
         </li>
         <li class="nav-item text-center">
           <a href="/cancellation" class="nav-link text-light">Cancellation</a>
         </li>
         <li class="nav-item dropdown text-center">
           <a class="nav-link dropdown-toggle text-center text-light" href="#" data-bs-toggle="dropdown">
             Masterfile
           </a>
           <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="/register">Register a Users</a></li>
             <li><a class="dropdown-item" href="/company">Company</a></li>
             <li><a class="dropdown-item" href="/floor">Floor Master</a></li>
             <li><a class="dropdown-item" href="/facility">Facility Type</a></li>
             <li><a class="dropdown-item" href="/facility_room_master">Facility Room Master</a></li>
           </ul>
         </li>
         <!-- USERS MENU -->
         <div class="dropdown">
           <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
             <i class="fa-sharp fa-solid fa-user"></i>
           </button>
           <ul class="dropdown-menu dropdown-menu-lg-end">
             <li class="nav-item text-center">
               <a class="dropdown-item" href="./change_password.php">Change Password</a>
             </li>
             <li>
               <hr class="dropdown-divider">
             </li>
             <li class="nav-item text-center">
               <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
             </li>
           </ul>
         </div>
       </ul>
     </div>
   </div>
 </nav>
