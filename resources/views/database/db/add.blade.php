@extends('layouts.master')

@section('title', 'Validation')

@section('menu')
    @parent
    Database


    @component('components.message')
        @slot('msg_title')
            Add
        @endslot

        @slot('msg_content')
            Add new person.
        @endslot
    @endcomponent
@endsection

@section('content')
    <form action="/database/db/add" method="post">
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
    </form>

@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
