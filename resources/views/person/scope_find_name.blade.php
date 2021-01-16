@extends('layouts.master')

@section('title', 'ORM')

@section('menu')
    @parent
    Search People


    @component('components.message')
        @slot('msg_title')
            Search
        @endslot

        @slot('msg_content')
            Input to search.
        @endslot
    @endcomponent
@endsection

@section('content')
    <form action="/orm/person/scope_find_name" method="POST">
        @csrf
        <input type="text" name="input" value="{{$input}}">
        <input type="submit" value="find">
    </form>
    @if (isset($item))
    <table>
        <tr>
            <th>Data</th>
        </tr>
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
    </table>
    @endif
@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
