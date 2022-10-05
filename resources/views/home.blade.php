@extends('layouts.master')

@section('content')
    @if (Auth::user()->role == 'Admin')
        @include('user_mgmt.dashboard.dash_admin')
    @elseif(Auth::user()->role == 'Karyawan')
        @include('user_mgmt.dashboard.dashboard')
    @else
        {{ route('login') }}
    @endif
@endsection
