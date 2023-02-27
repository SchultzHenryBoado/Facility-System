@include('layouts.header', ['title' => 'APPROVED'])
@include('layouts.admin_navbar')

<div class="container-fluid mt-5">
  <div class="container shadow p-3 mb-5 bg-body-rounded">
    <p class="h1 text-center mb-5">Approved</p>
    <div class="table-responsive">
      <table class="table table-striped table-hover display" id="myTable" style="width: 100%;">
        <thead>
          <tr>
            <th>Created Date:</th>
            <th>RSVN No.</th>
            <th>Created By:</th>
            <th>Room Type:</th>
            <th>Date From:</th>
            <th>Date To:</th>
            <th>Time From:</th>
            <th>Time To:</th>
            <th>Status:</th>
            <th>Actions:</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
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
</div>

@include('layouts.footer')
