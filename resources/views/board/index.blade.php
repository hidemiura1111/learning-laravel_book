@extends('layouts.master')

@section('title', 'ORM')

@section('menu')
    @parent
    Board


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
    @if ($items != NULL)
        <table>
            <tr>
                <th>Data</th>
                <th>Message</th>
                <th>Name</th>
            </tr>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->getData() }}</td>
                    <td>{{ $item->message }}</td>
                    <td>{{ $item->person->name }}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
