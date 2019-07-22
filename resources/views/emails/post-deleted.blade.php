@component('mail::message')

Poštovani {{ $post->user->name }},

Ovim putem vas obavještavamo da je Vaš post pod nazivom "{{ $post->title }}" upravo obrisan!

@component('mail::button', ['url' => 'localhost:8080/'])
{{ config('app.name') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
