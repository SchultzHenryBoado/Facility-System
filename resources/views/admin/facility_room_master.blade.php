@include('layouts.header', ['title' => 'FACILITY ROOM MASTER'])
@include('layouts.admin_navbar')

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
        Add Facility Room Master
      </button>

      <form action="/facility_room_master/store" method="post">
        @csrf
        <div class="modal fade" id="addModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Create Facility Room Master</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-4 form-floating">
                      <select name="facility_type" id="facilityType" class="form-select">
                        @foreach($facility as $rowFacility)
                        <option value="{{ $rowFacility->facility_name }}">{{ $rowFacility->facility_name }}</option>
                        @endforeach
                      </select>
                      <label for="facilityType">Choose facility type</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-4 form-floating">
                      <input type="text" name="facility_number" id="facilityNumber" class="form-control" placeholder="Enter facility number">
                      <label for="facilityNumber">Enter facility number</label>
                      @error('facility_number')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-4 form-floating">
                      <input type="text" name="description" id="description" class="form-control" placeholder="Enter description">
                      <label for="description">Enter description</label>
                      @error('description')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-4 form-floating">
                      <select name="floor" id="floor" class="form-select">
                        @foreach($floor as $rowFloor)
                        <option value="{{ $rowFloor->floor_number }}">{{ $rowFloor->floor_number }}</option>
                        @endforeach
                      </select>
                      <label for="floor"> Choose floor location</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="max_capacity" id="maxCapacity" class="form-control" placeholder="Enter max capacity">
                      <label for="maxCapacity">Enter max capacity</label>
                      @error('max_capacity')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-4 form-floating">
                      <select name="status" id="status" class="form-select">
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                      </select>
                      <label for="status">Choose status</label></div>
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
      <table class="table table-hover table-striped" id="myTable">
        <thead>
          <tr>
            <th>Facility Type:</th>
            <th>Facility Number:</th>
            <th>Description:</th>
            <th>Floor Location:</th>
            <th>Max Capacity:</th>
            <th>Status:</th>
            <th>Actions:</th>
          </tr>
        </thead>
        <tbody>
          @foreach($facility_room_master as $rowFacilityRoomMaster)
          <tr>
            <td>{{ $rowFacilityRoomMaster->facility_type }}</td>
            <td>{{ $rowFacilityRoomMaster->facility_number }}</td>
            <td>{{ $rowFacilityRoomMaster->description }}</td>
            <td>{{ $rowFacilityRoomMaster->floor }}</td>
            <td>{{ $rowFacilityRoomMaster->max_capacity }}</td>
            <td>{{ $rowFacilityRoomMaster->status }}</td>
            <td>
              <div class="d-inline-block">
                <button class="btn btn-warning fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $rowFacilityRoomMaster->id }}">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>

                <form action="/facility_room_master/{{ $rowFacilityRoomMaster->id }}" method="post">
                  @csrf
                  @method('put')
                  <div class="modal fade" id="updateModal-{{ $rowFacilityRoomMaster->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Update Facility Room Master</h5>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-4 form-floating">
                                <select name="facility_type" id="facilityType" class="form-select">
                                  @foreach($facility as $rowFacility)
                                  <option value="{{ $rowFacility->facility_name }}">{{ $rowFacility->facility_name }}</option>
                                  @endforeach
                                </select>
                                <label for="facilityType">Choose facility type</label>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-4 form-floating">
                                <input type="text" name="facility_number" id="facilityNumber" class="form-control" placeholder="Enter facility number" value="{{ $rowFacilityRoomMaster->facility_number }}">
                                <label for="facilityNumber">Enter facility number</label>
                                @error('facility_number')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-4 form-floating">
                                <input type="text" name="description" id="description" class="form-control" placeholder="Enter description" value="{{ $rowFacilityRoomMaster->description }}">
                                <label for="description">Enter description</label>
                                @error('description')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-4 form-floating">
                                <select name="floor" id="floor" class="form-select">
                                  @foreach($floor as $rowFloor)
                                  <option value="{{ $rowFloor->floor_number }}">{{ $rowFloor->floor_number }}</option>
                                  @endforeach
                                </select>
                                <label for="floor"> Choose floor location</label>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="max_capacity" id="maxCapacity" class="form-control" placeholder="Enter max capacity" value="{{ $rowFacilityRoomMaster->max_capacity }}">
                                <label for="maxCapacity">Enter max capacity</label>
                                @error('max_capacity')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-4 form-floating">
                                <select name="status" id="status" class="form-select">
                                  <option value="ACTIVE">ACTIVE</option>
                                  <option value="INACTIVE">INACTIVE</option>
                                </select>
                                <label for="status">Choose status</label></div>
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
                <button class="btn btn-danger fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $rowFacilityRoomMaster->id }}">
                  <i class="fa-solid fa-trash"></i>
                </button>

                <form action="/facility_room_master/{{ $rowFacilityRoomMaster->id }}" method="post">
                  @csrf
                  @method('delete')
                  <div class="modal fade" id="deleteModal-{{ $rowFacilityRoomMaster->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Are you sure you want to delete?</h5>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-danger fw-bold">Delete</button>
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
