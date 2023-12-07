@extends('layout.app_without_login')
@section('title','Forget Password')
@section('content')

   <!-- Recover-pw page -->
   <div class="container">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="card">
                        <div class="card-body p-0 auth-header-box">
                            <div class="text-center p-3">
                                {{-- <a href="http://www.docoholic.com/" class="logo logo-admin"> --}}
                                    <img src="{{asset('admin/img/logo.png')}}" height="90" alt="logo" class="auth-logo">
                                {{-- </a> --}}
                                <h4 class="mt-3 mb-1 fw-semibold font-18">Reset Password For AutoMonkey
                                </h4>
                                <p class="text-muted  mb-0">Enter your Email and instructions will be sent to you!
                                </p>
                            </div>
                        </div>
                        @include('errors.index')
                        <div class="card-body">
                            <form class="auth-forgot-password-form mt-2" action="{{ route('admin.forget.password.post') }}" method="POST">
                                @csrf

                                <div class="form-group mb-2">
                                    <label class="form-label" for="username">Email</label>
                                    <div class="input-group">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter Email" required>
                                    </div>
                                </div>
                                <!--end form-group-->

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary w-100 waves-effect waves-light"
                                            type="submit">Reset <i class="fas fa-sign-in-alt ms-1"></i></button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end form-group-->
                            </form>
                            <!--end form-->
                            <p class="text-muted mb-0 mt-3">Remember It ? <a href="{{ route('admin.login') }}"
                                    >Sign in here</a></p>
                        </div>
                        <div class="card-body bg-light-alt text-center">
                            <span class="text-muted d-none d-sm-inline-block">AutoMonkey ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                            </span>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
</div>
<!--end container-->

@endsection
