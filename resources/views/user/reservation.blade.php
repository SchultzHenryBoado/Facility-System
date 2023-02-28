@include('layouts.header', ['title' => 'RESERVATION'])
@include('layouts.user_navbar')

<div class="container-fluid mt-5">
  <div class="container shadow p-3 mb-5 bg-body-rounded">
    @if (session()->has('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    @if (session()->has('deleted'))
    <div class="alert alert-danger">
      {{ session('deleted') }}
    </div>
    @endif

    @if (session()->has('updated'))
    <div class="alert alert-warning">
      {{ session('updated') }}
    </div>
    @endif

    <div class="mb-3">
      <button class="btn btn-primary fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
        Add Reservation
      </button>

      <form action="/reservation/store" method="post">
        @csrf
        <div class="modal fade" id="addModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Create Reservation</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="created_date" id="createdDate" class="form-control" placeholder="Created Date" value="{{ $currentDate }}" readonly>
                      <label for="createdDate">Created Date</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="rsvn_no" id="rsvnNo" class="form-control" placeholder="Reservation Number">
                      <label for="rsvnNo">Reservation No</label>
                      @error('rsvn_no')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="created_by" id="createdBy" class="form-control" placeholder="Created By" value="{{ $user }}" readonly>
                      <label for="createdBy">Created By</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <select name="facility_type" id="facilityType" class="form-select">
                        @foreach($facility_type as $rowFacility)
                        <option value="{{ $rowFacility->facility_name }}">{{ $rowFacility->facility_name }}</option>
                        @endforeach
                      </select>
                      <label for="facilityType">Choose Facility Type</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <select name="facility_number" id="facilityNumber" class="form-select">
                        @foreach($facility_room_master as $rowFacilityRoomMaster)
                        <option value="{{ $rowFacilityRoomMaster->facility_number }}">{{ $rowFacilityRoomMaster->facility_number }}</option>
                        @endforeach
                      </select>
                      <label for="facilityNumber">Choose Facility Number</label>
                      @error('facility_type')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="date" name="date_from" id="dateFrom" class="form-control">
                      <label for="dateFrom">Date From</label>
                      @error('date_from')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="date" name="date_to" id="dateTo" class="form-control">
                      <label for="dateTo">Date To</label>
                      @error('date_to')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="time" name="time_from" id="timeFrom" class="form-control">
                      <label for="timeFrom">Time From</label>
                      @error('time_from')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="time" name="time_to" id="timeTo" class="form-control">
                      <label for="timeTo">Time To</label>
                      @error('time_to')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <select name="status" id="status" class="form-select">
                        <option value="PENDING">PENDING</option>
                      </select>
                      <label for="status">Status</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary fw-bold">Create</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-hover" id="myTable">
        <thead>
          <tr>
            <th>Created Date:</th>
            <th>RSVN No.</th>
            <th>Created By:</th>
            <th>Facility Type:</th>
            <th>Facility Number:</th>
            <th>Date From:</th>
            <th>Date To:</th>
            <th>Time From:</th>
            <th>Time To:</th>
            <th>Status:</th>
            <th>Actions:</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reservation as $rowReservation)
          <tr>
            <td>{{ $rowReservation->created_date }}</td>
            <td>{{ $rowReservation->rsvn_no }}</td>
            <td>{{ $rowReservation->created_by }}</td>
            <td>{{ $rowReservation->facility_type }}</td>
            <td>{{ $rowReservation->facility_number }}</td>
            <td>{{ $rowReservation->date_from }}</td>
            <td>{{ $rowReservation->date_to }}</td>
            <td>{{ date("h:i A", strtotime($rowReservation->time_from)) }}</td>
            <td>{{ date("h:i A", strtotime($rowReservation->time_to)) }}</td>
            <td>{{ $rowReservation->status }}</td>
            <td>
              <div class="d-inline-block">
                <button class="btn btn-warning fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $rowReservation->id }}">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>

                <form action="/reservation/{{ $rowReservation->id }}" method="post">
                  @csrf
                  @method('put')
                  <div class="modal fade" id="updateModal-{{ $rowReservation->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Update Reservation</h5>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="created_date" id="createdDate" class="form-control" placeholder="Created Date" value="{{ $currentDate }}" readonly>
                                <label for="createdDate">Created Date</label>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="rsvn_no" id="rsvnNo" class="form-control" placeholder="Reservation Number" value="{{ $rowReservation->rsvn_no }}">
                                <label for="rsvnNo">Reservation No</label>
                                @error('rsvn_no')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="created_by" id="createdBy" class="form-control" placeholder="Created By" value="{{ $user }}" readonly>
                                <label for="createdBy">Created By</label>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <select name="facility_type" id="facilityType" class="form-select">
                                  @foreach($facility_type as $rowFacility)
                                  <option value="{{ $rowFacility->facility_name }}">{{ $rowFacility->facility_name }}</option>
                                  @endforeach
                                </select>
                                <label for="facilityType">Choose Facility Type</label>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <select name="facility_number" id="facilityNumber" class="form-select">
                                  @foreach($facility_room_master as $rowFacilityRoomMaster)
                                  <option value="{{ $rowFacilityRoomMaster->facility_number }}">{{ $rowFacilityRoomMaster->facility_number }}</option>
                                  @endforeach
                                </select>
                                <label for="facilityNumber">Choose Facility Number</label>
                                @error('facility_type')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="date" name="date_from" id="dateFrom" class="form-control" value="{{ $rowReservation->date_from }}">
                                <label for="dateFrom">Date From</label>
                                @error('date_from')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="date" name="date_to" id="dateTo" class="form-control" value="{{ $rowReservation->date_to }}">
                                <label for="dateTo">Date To</label>
                                @error('date_to')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="time" name="time_from" id="timeFrom" class="form-control" value="{{ $rowReservation->time_from }}">
                                <label for="timeFrom">Time From</label>
                                @error('time_from')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="time" name="time_to" id="timeTo" class="form-control" value="{{ $rowReservation->time_to }}">
                                <label for="timeTo">Time To</label>
                                @error('time_to')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <select name="status" id="status" class="form-select">
                                  <option value="PENDING">PENDING</option>
                                </select>
                                <label for="status">Status</label>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary fw-bold">Update</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="d-inline-block">
                <button class="btn btn-danger mt-2" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $rowReservation->id }}">
                  <i class="fa-solid fa-trash"></i>
                </button>

                <form action="/reservation/{{ $rowReservation->id }}" method="post">
                  @csrf
                  @method('delete')
                  <div class="modal fade" id="deleteModal-{{ $rowReservation->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5">Are you sure you want to delete?</h5>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-danger fw-bold" type="submit">Delete</button>
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
