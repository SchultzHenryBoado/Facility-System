@include('layouts.header', ['title' => 'FACILITY TYPE'])
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
        Add Facility
      </button>

      <form action="/facility/store" method="post">
        @csrf
        <div class="modal fade" id="addModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Create Facility</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="facility_code" id="facilityCode" class="form-control" placeholder="Enter facility code">
                      <label for="facilityCode">Facility Code</label>
                      @error('facility_code')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="facility_name" id="facilityName" class="form-control" placeholder="Enter facility name">
                      <label for="facilityName">Facility Name</label>
                      @error('facility_name')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary fw-bold" type="submit">Create</button>
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
            <th>Facility Code:</th>
            <th>Facility Name:</th>
            <th>Actions:</th>
          </tr>
        </thead>
        <tbody>
          @foreach($facility as $rowFacility)
          <tr>
            <td>{{ $rowFacility->facility_code }}</td>
            <td>{{ $rowFacility->facility_name }}</td>
            <td>
              <div class="d-inline-block">
                <button class="btn btn-warning fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $rowFacility->id }}">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>

                <form action="/facility/{{ $rowFacility->id }}" method="post">
                  @csrf
                  @method('put')
                  <div class="modal fade" id="updateModal-{{ $rowFacility->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Update Facility</h5>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="facility_code" id="facilityCode" class="form-control" placeholder="Enter facility code" value="{{ $rowFacility->facility_code }}">
                                <label for="facilityCode">Facility Code</label>
                                @error('facility_code')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="facility_name" id="facilityName" class="form-control" placeholder="Enter facility name" value="{{ $rowFacility->facility_name }}">
                                <label for="facilityName">Facility Name</label>
                                @error('facility_name')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button class="btn btn-primary fw-bold" type="submit">Create</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="d-inline-block">
                <button class="btn btn-danger fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $rowFacility->id }}">
                  <i class="fa-solid fa-trash"></i>
                </button>

                <form action="/facility/{{ $rowFacility->id }}" method="post">
                  @csrf
                  @method('delete')
                  <div class="modal fade" id="deleteModal-{{ $rowFacility->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Are you sure you want to delete?</h5>
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
