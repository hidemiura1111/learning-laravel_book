@extends('layouts.master')

@section('title', 'Provider')

@section('menu')
    @parent
    provider page


    @component('components.message')
        @slot('msg_title')
            Component
        @endslot

        @slot('msg_content')
            Add component by slot.
        @endslot
    @endcomponent
@endsection

@section('content')
    <p>This is <middleware>google.com</middleware>.</p>
    <p>This is <middleware>yahoo.co.jp</middleware>.</p>
@endsection



@section('footer')
    copyright 2020 hidms.
@endsection
