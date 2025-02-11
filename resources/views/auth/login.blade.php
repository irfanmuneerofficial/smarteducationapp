@extends('auth.layout')

@section('content')

<div class="page-header-image" style="background-image:url('/img/cover-01.jpg')"></div>

<div class="content-center">
    <div class="container">

        <div class="col-md-4 content-center">

            <div class="card card-login card-plain">
                <form class="form" method="POST" action="{{ route('frontend.auth.login.post') }}">
                    @csrf

                    <div class="header header-primary text-center">
                        <div class="logo-container">
                            <img src="{{asset('img/logo.png')}}" alt="">
                        </div>
                        <h5>
                            Login to Account
                        </h5>

                        @include('flash::message')

                        @if ($errors->has('email'))
                        <div class="row justify-content-center">
                            <div class="col-md-8 align-self-center">
                                <div class="alert alert-danger" role="alert">
                                    <div class="container">
                                        <div class="alert-icon">
                                            <i class="fas fa-bolt"></i>
                                        </div>

                                        <strong>{!! $errors->first('email') !!}</strong>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if ($errors->has('password'))
                        <div class="row justify-content-center">
                            <div class="col-md-8 align-self-center">
                                <div class="alert alert-danger" role="alert">
                                    <div class="container">
                                        <div class="alert-icon">
                                            <i class="fas fa-bolt"></i>
                                        </div>

                                        <strong>{!! $errors->first('password') !!}</strong>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if (session('status'))
                        <div class="row justify-content-center">
                            <div class="col-md-8 align-self-center">
                                <div class="alert alert-success" role="alert">
                                    <div class="container">
                                        <div class="alert-icon">
                                            <i class="fas fa-bolt"></i>
                                        </div>

                                        <strong>{{ session('status') }}</strong>

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">
                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="content">
                        <input type="hidden" name="redirectTo" value="{{request('redirectTo')}}">
                        <div class="input-group mb-3 input-lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="input-email"><i class="fas fa-at"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email address" aria-label="Email" aria-describedby="input-email" required>
                        </div>

                        <div class="input-group mb-3 input-lg {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="input-password"><i class="fas fa-key"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="input-password" required>
                        </div>
                    </div>

                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-block">Submit</button>
                    </div>
                    <div class="pull-left">
                        <h6>
                            <a href="{{ route('frontend.auth.register') }}" class="link">Create Account</a>
                        </h6>
                    </div>
                    <div class="float-right">
                        <h6>
                            <a href="{{route('frontend.auth.password.email')}}" class="link">Need Help?</a>
                        </h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
