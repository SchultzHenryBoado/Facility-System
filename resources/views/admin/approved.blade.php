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
          @foreach($approve as $rowApprove)
          <tr>
            <td>{{ $rowApprove->created_date }}</td>
            <td>{{ $rowApprove->rsvn_no }}</td>
            <td>{{ $rowApprove->created_by }}</td>
            <td>{{ $rowApprove->facility_type }}</td>
            <td>{{ $rowApprove->date_from }}</td>
            <td>{{ $rowApprove->date_to }}</td>
            <td>{{ $rowApprove->time_from }}</td>
            <td>{{ $rowApprove->time_to }}</td>
            <td>{{ $rowApprove->status }}</td>
            <td>
              <div class="d-inline-block">
                <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#rejectModal-{{ $rowApprove->id }}">
                  <i class="fa-solid fa-thumbs-down"></i>
                </button>

                <form action="/approved/{{ $rowApprove->id }}" method="post">
                  @csrf
                  @method('put')
                  <div class="modal fade" id="rejectModal-{{ $rowApprove->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5">Are you sure you want to reject?</h5>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                              <textarea name="cancel_reasons" id="reasonForCancellation" cols="30" rows="10" class="form-control" placeholder="Write a reason for cancellation"></textarea>
                              @error('cancel_reasons')
                              <span class="text-danger">
                                {{$message}}
                              </span>
                              @enderror
                            </div>
                          </div>
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
