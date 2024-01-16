{{-- @extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable')) --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title">Be Right Back</div>
            @isset($maintenanceTime)
                <p>Maintenance started at: {{ $maintenanceTime['start_time'] }}</p>
            @endif
            @isset($maintenanceTime['end_time'])
                <p>Maintenance will end at: {{ $maintenanceTime['end_time'] }}</p>
            @endif
        </div>
    </div>
@endsection