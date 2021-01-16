@extends('layouts.master')

@section('title', 'Provider')

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
    <table>
        @foreach($data as $item)
            <tr>
                <th>{{$item['name']}}</th>
                <td>{{$item['mail']}}</td>
            </tr>
        @endforeach
    </table>
@endsection



@section('footer')
    copyright 2020 hidms.
@endsection
