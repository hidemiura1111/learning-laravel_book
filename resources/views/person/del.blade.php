@extends('layouts.master')

@section('title', 'ORM')

@section('menu')
    @parent
    People


    @component('components.message')
        @slot('msg_title')
            Delete
        @endslot

        @slot('msg_content')
            Delete people.
        @endslot
    @endcomponent
@endsection

@section('content')
<form action="/orm/person/del" method="post">
    @csrf
    <table>
        <input type="hidden" name="id" value="{{ $form->id }}">
        <tr>
            <th>Name: </th>
            <td>{{ $form->name }}</td>
        </tr>
        <tr>
            <th>Mail: </th>
            <td>{{ $form->mail }}</td>
        </tr>
        <tr>
            <th>Age: </th>
            <td>{{ $form->age }}</td>
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
