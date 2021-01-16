@extends('layouts.master')

@section('title', 'ORM')

@section('menu')
    @parent
    People


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
            </tr>
            @foreach ($items as $item)
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
    @endif
@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
