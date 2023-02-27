@include('layouts.header', ['title' => 'FLOOR'])
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
        Add Floor
      </button>

      <form action="/floor/store" method="post">
        @csrf
        <div class="modal fade" id="addModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Create Floors</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="floor_code" id="floorCode" class="form-control" placeholder="Enter floor code">
                      <label for="floorCode">Enter floor code</label>
                      @error('floor_code')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="floor_number" id="floorNumber" class="form-control" placeholder="Enter floor number">
                      <label for="floorNumber">Enter floor number</label>
                      @error('floor_number')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
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
      <table class="table table-hover table-striped" id="myTable" style="width: 100%">
        <thead>
          <tr>
            <th>Code:</th>
            <th>Floor Number:</th>
            <th>Actions:</th>
          </tr>
        </thead>
        <tbody>
          @foreach($floor as $rowFloor)
          <tr>
            <td>{{ strtoupper($rowFloor->floor_code) }}</td>
            <td>{{ $rowFloor->floor_number }}</td>
            <td>
              <div class="d-inline-block">
                <button class="btn btn-warning fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $rowFloor->id }}">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>

                <form action="/floor/{{ $rowFloor->id }}" method="post">
                  @csrf
                  @method('put')
                  <div class="modal fade" id="updateModal-{{ $rowFloor->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Update Floors</h5>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="floor_code" id="floorCode" class="form-control" placeholder="Enter floor code" value="{{ $rowFloor->floor_code }}">
                                <label for="floorCode">Enter floor code</label>
                                @error('floor_code')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="floor_number" id="floorNumber" class="form-control" placeholder="Enter floor number" value="{{ $rowFloor->floor_number }}">
                                <label for="floorNumber">Enter floor number</label>
                                @error('floor_number')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
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
                <button class="btn btn-danger fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $rowFloor->id }}">
                  <i class="fa-solid fa-trash"></i>
                </button>

                <form action="/floor/{{ $rowFloor->id }}" method="post">
                  @csrf
                  @method('delete')
                  <div class="modal fade" id="deleteModal-{{ $rowFloor->id }}">
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
