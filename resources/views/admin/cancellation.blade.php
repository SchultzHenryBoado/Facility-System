@include('layouts.header', ['title' => 'CANCELLATION'])
@include('layouts.admin_navbar')

<div class="container-fluid mt-5">
  <div class="container shadow p-3 mb-5 bg-body-rounded">
    <p class="h1 text-center mb-5">Rejected</p>
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
          @foreach($reject as $rowReject)
          <tr>
            <td>{{ $rowReject->created_date }}</td>
            <td>{{ $rowReject->rsvn_no }}</td>
            <td>{{ $rowReject->created_by }}</td>
            <td>{{ $rowReject->facility_type }}</td>
            <td>{{ $rowReject->date_from }}</td>
            <td>{{ $rowReject->date_to }}</td>
            <td>{{ $rowReject->time_from }}</td>
            <td>{{ $rowReject->time_to }}</td>
            <td>{{ $rowReject->status }}</td>
            <td>
              <div class="d-inline-block">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#approveModal">
                  <i class="fa-solid fa-thumbs-up"></i>
                </button>

                <form action="#" method="post">
                  <div class="modal fade" id="approveModal">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content"></div>
                    </div>
                  </div>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('layouts.footer')
