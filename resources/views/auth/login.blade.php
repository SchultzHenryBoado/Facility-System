@include('layouts.header', ['title' => 'LOGIN'])

<div class="container-fluid">
    <div class="container">
      @if (session()->has('error'))
        <div class="alert alert-danger">
          {{session('error')}}
        </div>
      @endif

      <section class="vh-100">
        <div class="container py-5 h-100">
          <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              <!-- Carousel -->
              <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                    aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./img/plc_logo.jpg" class="d-block w-100 img-fluid" alt="PLC Logo"
                      style="height: 500px; width: 1000px;">
                  </div>
                  <div class="carousel-item">
                    <img src="./img/board_room.jpg" class="d-block w-100 img-fluid" alt="Board Room"
                      style="height: 500px; width: 1000px;">
                  </div>
                  <div class="carousel-item">
                    <img src="./img/meeting_room.jpg" class="d-block w-100 img-fluid" alt="Meeting Room"
                      style="height: 500px; width: 1000px;">
                  </div>
                  <div class="carousel-item">
                    <img src="./img/basketball_court.jpg" class="d-block w-100 img-fluid" alt="Basketball Court"
                      style="height: 500px; width: 1000px;">
                  </div>
                  <div class="carousel-item">
                    <img src="./img/volleyball_court.jpg" class="d-block w-100 img-fluid" alt="Volleyball Court"
                      style="height: 500px; width: 1000px;">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 shadow p-3 mb-5 bg-body-tertiary rounded mt-5">

              <div class="mb-3">
                <p class="fs-2 fw-bold text-center">Facility Management System</p>
              </div>

              <form action="/login/process" method="post">
                @csrf
                <!-- Email input -->
                <div class="form-floating mb-4">
                  <input type="email" name="email" id="form1Example13" class="form-control " placeholder="Email address"
                 />
                  <label class="form-label" for="form1Example13">Email address</label>
                  @error('email')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                  @enderror
                </div>

                <!-- Password input -->
                <div class="form-floating mb-4">
                  <input type="password" name="password" id="form1Example23" class="form-control "
                    placeholder="Password" />
                  <label class="form-label" for="form1Example23">Password</label>
                  @error('password')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                  @enderror
                </div>

                <!-- Submit button -->
                <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>

              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@include('layouts.footer')