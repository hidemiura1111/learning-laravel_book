@extends('layouts.master')

@section('title', 'ORM')

@section('menu')
    @parent
    Board


    @component('components.message')
        @slot('msg_title')
            Add Board
        @endslot

        @slot('msg_content')
            Add Board.
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
<form action="/orm/board/add" method="post">
    @csrf
    <table>
        <tr>
            <th>Person id: </th>
            <td><input type="number" name="person_id"></td>
        </tr>
        <tr>
            <th>Title: </th>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <th>Message: </th>
            <td><input type="text" name="message"></td>
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
