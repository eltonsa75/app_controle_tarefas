@component('mail::message')
{{ $tarefa }}

Data limite de coclusão: {{ $data_limite_conclusao }}

@component('mail::button', ['url' => $url])
Clique aqui para ver a tarefa
@endcomponent

Att,<br>
{{ config('app.name') }}
@endcomponent
