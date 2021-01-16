@extends('layouts.master')

@section('title', 'ORM')

@section('menu')
    @parent
    People


    @component('components.message')
        @slot('msg_title')
            Has Index
        @endslot

        @slot('msg_content')
            Show Has index.
        @endslot
    @endcomponent
@endsection

@section('content')
    <table>
        <tr>
            <th>Data</th>
        </tr>
        @foreach ($hasItems as $item)
            <tr>
                <td>{{$item->getData()}}</td>
                <td>
                    @if ($item->boards != null)
                        <table width="100%">
                            @foreach ($item->boards as $obj)
                                <tr>
                                    <td>{{ $obj->getData() }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <div style="margin:10px;"></div>
    <table>
        <tr>
            <th>Data</th>
        </tr>
        @foreach ($noItems as $item)
            <tr>
                <td>{{$item->getData()}}</td>
            </tr>
        @endforeach
        </table>
@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
