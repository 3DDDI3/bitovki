<x-mail::message>

<h1 style="text-align: center">Пользователь зарегистрировался в системе:</h1> 

<x-mail::table>
| Имя                 |      Телефон          |          Email            |             Адрес             |
|:-------------------:|:---------------------:|:-------------------------:|:-----------------------------:|
| {{$agent->name}}    | {{$agent->phone}}     | {{$agent->user->email}}   | {{$agent->address}}           |
</x-mail::table>

@php
    $url = config('app.url') . '/admin/users/agents?search=' . $agent->name;
@endphp

<x-mail::button :$url>
    Перейти к заявке
</x-mail::button>

</x-mail::message>