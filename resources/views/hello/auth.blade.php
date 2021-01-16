@extends('layouts.master')

@section('title', 'Auth')

@section('menu')
    @parent
    Auth page
@endsection

@section('content')
    @if (Auth::check())
        <p>USER: {{ $user->name . ' (' . $user->email . ')' }}</p>
    @else
        <p>You do not login.
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        </p>
    @endif
@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
