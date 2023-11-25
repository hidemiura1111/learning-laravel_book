@component('mail::message')
# Introduction

Job Class: {{ $event->job->resolveName() }}

Job Body: {{ $event->job->getRawBody() }}

Exception: {{ $event->exception->getTraceAsString() }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
