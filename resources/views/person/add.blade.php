@extends('layouts.master')

@section('title', 'ORM')

@section('menu')
    @parent
    People


    @component('components.message')
        @slot('msg_title')
            Add person
        @endslot

        @slot('msg_content')
            Show index.
        @endslot
    @endcomponent
@endsection

@section('content')
@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="/orm/person/add" method="post">
    @csrf
    <table>
        <tr>
            <th>Name: </th>
            <td><input type="text" name="name" value="{{ old('name') }}"></td>
        </tr>
        <tr>
            <th>Mail: </th>
            <td><input type="text" name="mail" value="{{ old('mail') }}"></td>
        </tr>
        <tr>
            <th>Age: </th>
            <td><input type="text" name="age" value="{{ old('age') }}"></td>
        </tr>

        <tr>
            <th></th>
            <td><input type="submit" value="send"></td>
        </tr>
    </table>
@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
