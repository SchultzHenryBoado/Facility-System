@include('layouts.header', ['title' => 'REGISTER'])
@include('layouts.admin_navbar')

<div class="container-fluid mt-5">
  <div class="container shadow p-3 mb-5 bg-body-rounded">
    @if (session()->has('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
    @endif

    @if (session()->has('updated'))
    <div class="alert alert-warning">
      {{ session('updated') }}
    </div>
    @endif

    <div class="mb-3">
      <button class="btn btn-primary fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#addModal">
        Add Users
      </button>

      <form action="/register/store" method="post">
        @csrf
        <div class="modal fade" id="addModal">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Create Users</h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Enter last name">
                      <label for="lastName">Enter last name</label>
                      @error('last_name')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="text" name="first_name" id="firstName" class="form-control" placeholder="Enter first name">
                      <label for="firstName">Enter first name</label>
                      @error('first_name')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <select name="company" id="company" class="form-control">
                        @foreach($company as $rowCompany)
                        <option value="{{ $rowCompany->company_name }}">{{ $rowCompany->company_name }}</option>
                        @endforeach
                      </select>
                      <label for="company">Choose a company</label>
                      @error('company')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="email" name="email" id="email" class="form-control" placeholder="Enter company email">
                      <label for="email">Enter company email</label>
                      @error('email')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                      <label for="password">Enter password</label>
                      @error('password')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Confirm password">
                      <label for="password">Confirm password</label>
                      @error('password')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <select name="role" id="role" class="form-select">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                        <option value="user_admin">User Admin</option>
                      </select>
                      <label for="role">Choose a role</label>
                      @error('role')
                      <span class="text-danger">
                        {{$message}}
                      </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="mb-3 form-floating">
                      <select name="account_status" id="accountStatus" class="form-select">
                        <option value="ACTIVE">ACTIVE</option>
                        <option value="INACTIVE">INACTIVE</option>
                      </select>
                      <label for="accountStatus">Choose a status</label>
                      @error('account_status')
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
      <table class="table table-hover table-striped" id="myTable">
        <thead>
          <tr>
            <th>Lastname:</th>
            <th>Firstname:</th>
            <th>Company:</th>
            <th>Company Email:</th>
            <th>Password:</th>
            <th>Role:</th>
            <th>Account Status:</th>
            <th>Actions:</th>
          </tr>
        </thead>
        <tbody>
          @foreach($user as $rowUser)
          <tr>
            <td>{{ $rowUser->last_name }}</td>
            <td>{{ $rowUser->first_name }}</td>
            <td>{{ $rowUser->company }}</td>
            <td>{{ $rowUser->email }}</td>
            <td>{{ $rowUser->password }}</td>
            <td>{{ $rowUser->role }}</td>
            <td>{{ $rowUser->account_status }}</td>
            <td>
              <div class="d-inline-block">
                <button class="btn btn-warning fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#updateModal-{{ $rowUser->id }}">
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>

                <form action="/register/{{ $rowUser->id }}" method="post">
                  @csrf
                  @method('put')
                  <div class="modal fade" id="updateModal-{{ $rowUser->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Create Users</h5>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="last_name" id="lastName" class="form-control" placeholder="Enter last name" value="{{ $rowUser->last_name }}">
                                <label for="lastName">Enter last name</label>
                                @error('last_name')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="text" name="first_name" id="firstName" class="form-control" placeholder="Enter first name" value="{{ $rowUser->first_name }}">
                                <label for="firstName">Enter first name</label>
                                @error('first_name')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <select name="company" id="company" class="form-control">
                                  @foreach($company as $rowCompany)
                                  <option value="{{ $rowCompany->company_name }}">{{ $rowCompany->company_name }}</option>
                                  @endforeach
                                </select>
                                <label for="company">Choose a company</label>
                                @error('company')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter company email" value="{{ $rowUser->email }}">
                                <label for="email">Enter company email</label>
                                @error('email')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" value="{{ $rowUser->password }}">
                                <label for="password">Enter password</label>
                                @error('password')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Confirm password" value="{{ $rowUser->password }}">
                                <label for="password">Confirm password</label>
                                @error('password')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <select name="role" id="role" class="form-select">
                                  <option value="user">User</option>
                                  <option value="admin">Admin</option>
                                  <option value="user_admin">User Admin</option>
                                </select>
                                <label for="role">Choose a role</label>
                                @error('role')
                                <span class="text-danger">
                                  {{$message}}
                                </span>
                                @enderror
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="mb-3 form-floating">
                                <select name="account_status" id="accountStatus" class="form-select">
                                  <option value="ACTIVE">ACTIVE</option>
                                  <option value="INACTIVE">INACTIVE</option>
                                </select>
                                <label for="accountStatus">Choose a status</label>
                                @error('account_status')
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
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('layouts.footer')
