@extends('layouts.master')

@section('title', 'Validation')

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
    <p>{{ $msg }}</p>
    @if (count($errors) > 0)
        <p style="color: red">Input has a problem.</p>
    @endif
    <form action="/hello/validation" method="POST">
        @csrf
        <table>
            @error ('name')
            <tr style="color: red">
                <th>Error</th>
                <td>{{ $message }}</td>
            </tr>
            @enderror
            <tr>
                <th>Name: </th>
                <td><input type="text" name="name" value="{{ old('name') }}"></td>
            </tr>

            @error ('mail')
            <tr style="color: red">
                <th>Error</th>
                <td>{{ $message }}</td>
            </tr>
            @enderror
            <tr>
                <th>mail: </th>
                <td><input type="text" name="mail" value="{{ old('mail') }}"></td>
            </tr>

            @error ('age')
            <tr style="color: red">
                <th>Error</th>
                <td>{{ $message }}</td>
            </tr>
            @enderror
            <tr>
                <th>age: </th>
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
