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
    <p>Content include components</p>
    @include('components.message', ['msg_title'=>'Component', 'msg_content'=>'Add component by include'])

    <p>Content @ each</p>
    @each('components.each-list', $data, 'item')

    <p>Content ServiceProvider</p>
    <p>Controller Value<br>'message' = {{$message}}</p>
    <p>View Composer Value<br>'view_message' = {{$view_message}}</p>
@endsection



@section('footer')
    copyright 2020 hidms.
@endsection
