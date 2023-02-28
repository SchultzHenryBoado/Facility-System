@include('layouts.header', ['title' => 'PENDING RESERVATION'])
@include('layouts.admin_navbar')

<div class="container-fluid mt-5">
  <div class="container shadow p-3 mb-5 bg-body-rounded">
    <p class="h1 text-center mb-5">Pending Reservation</p>
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
          @foreach($pending as $rowPending)
          <tr>
            <td>{{ $rowPending->created_date }}</td>
            <td>{{ $rowPending->rsvn_no }}</td>
            <td>{{ $rowPending->created_by }}</td>
            <td>{{ $rowPending->facility_type }}</td>
            <td>{{ $rowPending->date_from }}</td>
            <td>{{ $rowPending->date_to }}</td>
            <td>{{ $rowPending->time_from }}</td>
            <td>{{ $rowPending->time_to }}</td>
            <td>{{ $rowPending->status }}</td>
            <td>
              <div class="d-inline-block">
                <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#approvedModal-{{ $rowPending->id }}">
                  <i class="fa-solid fa-thumbs-up"></i>
                </button>

                <form action="/pending_reservation/{{ $rowPending->id }}" method="post">
                  @csrf
                  @method('put')
                  <div class="modal fade" id="approvedModal-{{ $rowPending->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5">Are you sure you want to approve?</h5>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-danger fw-bold mt-1" type="button" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-success fw-bold">Approve</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <div class="d-inline-block">
                <button class="btn btn-danger mt-1" type="button" data-bs-toggle="modal" data-bs-target="#rejectModal">
                  <i class="fa-solid fa-thumbs-down"></i>
                </button>

                <form action="#" method="post">
                  <div class="modal fade" id="rejectModal">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5">Are you sure you want to reject?</h5>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-success fw-bold" type="button" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-danger fw-bold">Reject</button>
                        </div>
                      </div>
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
