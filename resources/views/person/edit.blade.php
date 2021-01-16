@extends('layouts.master')

@section('title', 'ORM')

@section('menu')
    @parent
    People


    @component('components.message')
        @slot('msg_title')
            Edit
        @endslot

        @slot('msg_content')
            Edit people.
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
<form action="/orm/person/edit" method="post">
    @csrf
    <table>
        <input type="hidden" name="id" value="{{ $form->id }}">
        <tr>
            <th>Name: </th>
            <td><input type="text" name="name" value="{{ $form->name }}"></td>
        </tr>
        <tr>
            <th>Mail: </th>
            <td><input type="text" name="mail" value="{{ $form->mail }}"></td>
        </tr>
        <tr>
            <th>Age: </th>
            <td><input type="text" name="age" value="{{ $form->age }}"></td>
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
