<!-- BEGIN : Head-->
  @include('studentAffairs.layouts.header')
<!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="1-column" class=" 1-column  blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    {{--  start error message --}}
      @include('studentAffairs.layouts.message')
    {{-- end error message --}}

    <div class="wrapper">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
            <!--Login Page Starts-->
<section id="login">
  <div class="container-fluid">
    <div class="row full-height-vh m-0">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card">
          <div class="card-content">
            <div class="card-body login-img">
              <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                  <img src="{{url('/')}}/admin/app-assets/img/gallery/login.png" alt="" class="img-fluid mt-5" width="400" height="230">
                </div>
                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                  <h4 class="mb-2 card-title">Login</h4>
                  <p class="card-text mb-3">
                    Welcome back, please login to our system.
                  </p>

                <form action="{{url('/')}}/logins" method="POST">
                    @csrf

                  <input type="email" name="email" class="form-control mb-3" placeholder="E-mail" />
                  <input type="password" name="password" class="form-control mb-1" placeholder="Password" />
                  <div class="d-flex justify-content-between mt-2">
                    <div class="remember-me">
                      <div class="custom-control custom-checkbox custom-control-inline mb-3">
                        <input type="checkbox" id="customCheckboxInline1" name="customCheckboxInline1" class="custom-control-input" />
                        <label class="custom-control-label" for="customCheckboxInline1">
                          Remember Me
                        </label>
                      </div>
                    </div>
                    <div class="forgot-password-option">
                      <a href="forgot-password-page.html" class="text-decoration-none text-primary">Forgot Password
                        ?</a>
                    </div>
                  </div>
                  <div class="fg-actions d-flex justify-content-between">

                      {{-- // register field not allowed --}}
                    {{-- <div class="login-btn">
                      <button class="btn btn-outline-primary disabled" disabled>
                        <a href="register-page.html" class="text-decoration-none disabled" >Register</a>
                      </button>
                    </div> --}}

                    <div class="recover-pass">
                      <button class="btn btn-primary"  type="submit">login
                      {{-- <a href="{{url('/logins')}}" class="text-decoration-none text-white">Login</a> --}}
                      </button>
                    </div>
                  </div>
                </form>
                  <hr class="m-0">
                  <div class="d-flex justify-content-between mt-3">
                    <div class="option-login">
                      <h6 class="text-decoration-none text-primary">Or Login With</h6>
                    </div>
                    <div class="social-login-options">
                      <a class="btn btn-social-icon mr-2 btn-facebook">
                        <span class="fa fa-facebook"></span>
                      </a>
                      <a class="btn btn-social-icon mr-2 btn-twitter">
                        <span class="fa fa-twitter"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Login Page Ends-->

          </div>
        </div>
        <!-- END : End Main Content-->
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

      <!-- BEGIN VENDOR JS-->
      @include('studentAffairs.layouts.footer')
      <!-- END : Body-->

