<x-mail::message>

<h1 style="text-align: center">Пользователь оставил заявку:</h1> 

<x-mail::table>
| Имя                |      Телефон        |          Email      |     Текст          |
| -------------------|---------------------|---------------------|--------------------|
| {{$request->name}} | {{$request->phone}} | {{$request->email}} | {{$request->text}} |
</x-mail::table>

@php
    $url = config('app.url') . '/admin/requests?search=' . $request->name;
@endphp

<x-mail::button :$url>
    Перейти к заявке
</x-mail::button>

</x-mail::message>