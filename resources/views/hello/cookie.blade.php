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
    <form action="/hello/cookie" method="POST">
        <table>
            @csrf
            @if ($errors->has('msg'))
            <tr style="color: red">
                <th>Error</th>
                <td>{{ $errors->first('msg') }}</td>
            </tr>
            @endif
            <tr>
                <th>Message: </th>
                <td><input type="text" name="msg" value="{{ old('msg') }}"></td>
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
