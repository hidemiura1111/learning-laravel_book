@extends('layouts.master')

@section('title', 'Session')

@section('menu')
    @parent
    session page
@endsection

@section('content')
    <p>{{ $session_data }}</p>
    <form action="/hello/session" method="post">
        @csrf
        <input type="text" name="input">
        <input type="submit" value="send">
    </form>
@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
