@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="account-box">
            <div class="account-wrapper">
                <h3 class="account-title">Login</h3>

                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>

                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                </div>
                            </div>

                            <div class="position-relative">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <span class="fa fa-eye-slash" id="toggle-password"></span>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                            <div class="account-footer mt-4">
                                <div class="col-auto text-center py-2">
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                        Forgot password?
                                    </a>
                                </div>
                                <div>
                                    <p>Don't have an account yet? <a href="{{ route('register') }}">Register</a></p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
