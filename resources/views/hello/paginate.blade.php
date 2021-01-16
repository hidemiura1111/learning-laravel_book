@extends('layouts.master')

@section('title', 'Pagination')

@section('menu')
    @parent
    Pagination page
@endsection

@section('content')
    <table class="mb-3">
        <tr>
            <th><a href="/hello/paginate?sort=name">Name</a></th>
            <th><a href="/hello/paginate?sort=mail">Mail</a></th>
            <th><a href="/hello/paginate?sort=age">Age</a></th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->age }}</td>
            </tr>
        @endforeach
    </table>

    {{ $items->appends(['sort' => $sort])->links() }}

@endsection

@section('footer')
    copyright 2020 hidms.
@endsection
