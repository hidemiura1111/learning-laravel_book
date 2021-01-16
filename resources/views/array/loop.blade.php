@foreach($data as $item)
    @if ($loop->first)
        <h1>START</h1>
    @endif

    <li>{{ $item }}</li>
    {{ $loop->remaining }}
    {{ $loop->count }}
    {{ $loop->index }}

    @for($i = 0; $i < 5; $i++)
        @if ($loop->first)
            {{ $loop->depth }}
            {{ $loop->parent }}
        @endif
    @endfor

    @if ($loop->last)
        <p>-------------------</p>
    @endif
@endforeach
