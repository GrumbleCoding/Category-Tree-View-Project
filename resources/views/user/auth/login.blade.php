@extends('layout.app_without_login')
@section('title','Login')
@section('content')
<div class="content-body">
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <div class="card mb-0">
                <div class="card-body">
                    @include('errors.index')
                    <form class="auth-login-form mt-2" action="{{ route('user.post.login') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="mb-1">
                            <label for="login-email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="login-email" name="email" placeholder="Enter your mail" aria-describedby="login-email" tabindex="1" autofocus required/>
                        </div>
                        <div class="mb-1">
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" required/>
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100" tabindex="4">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
