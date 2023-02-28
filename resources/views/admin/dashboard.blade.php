@include('layouts.header', ['title' => 'DASHBOARD'])
@include('layouts.admin_navbar')

<!-- SCHEDULES -->
<div class="container-fluid mt-5">
  <div class="container">
    <!-- INFORMATION -->
    <div class="row gap-3 justify-content-center">
      <div class="col-12 col-md-4">
        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="fw-bold text-center text-light">Total Reservation</h3>
          </div>
          <div class="card-body">
            <p class="fs-1 fw-bold text-center"></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="fw-bold text-center text-light">
              For Confirmation
            </h3>
          </div>
          <div class="card-body">
            <p class="fs-1 fw-bold text-center"></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="fw-bold text-light text-center">Total Confirmed</h3>
          </div>
          <div class="card-body">
            <p class="fs-1 fw-bold text-center"></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card">
          <div class="card-header bg-primary">
            <h3 class="fw-bold text-light text-center">Total Cancelled</h3>
          </div>
          <div class="card-body">
            <p class="fs-1 fw-bold text-center"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- TABLE -->
<div class="container-fluid mt-5">
  <div class="container bg-primary shadow p-3 mb-5 bg-body rounded">
    <p class="h1 text-center mb-3">Schedules Today</p>
    <table class="table" id="myTable" style="width: 100%;">
      <thead>
        <tr>
          <th>Room No.</th>
          <th>From:</th>
          <th>To:</th>
          <th>Reserved By:</th>
          <th>Company:</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@include('layouts.footer')
