@extends('layouts.master')

@section('title', 'My Auth')

@section('menu')
    @parent
    My Auth page
@endsection

@section('content')
    <p>{{ $message }}</p>
    <form action="/hello/myauth" method="POST">
        <table>
            @csrf
            <tr>
                <th>mail: </th>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <th>pass: </th>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" name="send"></td>
            </tr>
        </table>
    </form>
@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
