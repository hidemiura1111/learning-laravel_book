{{-- @extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable')) --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">Be Right Back</div>
            {{-- @isset($start_time)
                <p>Maintenance started at: {{ $start_time }}</p>
            @endif
            @isset($end_time)
                <p>Maintenance will end at: {{ $end_time }}</p>
            @endif --}}
        </div>
    </div>
@endsection