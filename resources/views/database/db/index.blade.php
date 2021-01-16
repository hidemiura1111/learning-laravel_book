@extends('layouts.master')

@section('title', 'Validation')

@section('menu')
    @parent
    Database


    @component('components.message')
        @slot('msg_title')
            Index
        @endslot

        @slot('msg_content')
            Show index.
        @endslot
    @endcomponent
@endsection

@section('content')
    <table>
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->age }}</td>
            </tr>
        @endforeach
    </table>

@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
