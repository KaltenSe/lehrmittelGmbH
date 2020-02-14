@component('mail::message')
# Hallo {{$Vorname}} {{$Nachname}}

Sie haben sich erfolgreich mit der E-Mail: {{$Email}}

<br>
Viele Grüße
<br>
<br>
<br>
{{ config('app.name') }}- Team
@endcomponent
