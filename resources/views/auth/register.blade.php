@extends('layouts.app')

@section('content')
    <div class="account-box">
        <div class="account-wrapper">
            <h3 class="account-title">Register</h3>
            <p class="account-subtitle">Access to our dashboard</p>

            <!-- Account Form -->
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                        required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                        required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password<span class="mandatory">*</span></label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('role') ? ' has-error ' : '' }}" hidden>
                    <label class="col-md-4 control-label">Role</label>

                    <div class="max-content">
                        <select name="role" class="form-control">
                            <option value="Admin">Admin</option>
                            {{-- <option value="Karyawan">Karyawan</option> --}}
                        </select>
                    </div>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary account-btn" type="submit">Register</button>
                </div>
                <div class="account-footer">
                    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
            </form>
            <!-- /Account Form -->
        </div>
    </div>
@endsection
