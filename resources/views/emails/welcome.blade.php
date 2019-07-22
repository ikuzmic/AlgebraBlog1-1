@component('mail::message')

## Pozdrav {{ $user->name }}, dobro došao na naš blog!

@component('mail::button', ['url' => 'https://algebra.hr'])
Započnite s edukacijom
@endcomponent

@component('mail::panel')
Od upoznavanja s Wordom i Excelom, do služenja internetom i elektroničkom poštom, imamo predavače koji će vas pretvoriti iz početnika u pravog hakera dok ste izgovorili “informatička pismenost”.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
