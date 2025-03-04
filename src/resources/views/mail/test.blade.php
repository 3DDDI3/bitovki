<x-mail::message>

<h1 style="text-align: center">Смена пароля</h1>

{{-- <div style="text-align: center">
    The body of your message.
</div> --}}

<x-mail::button :url="''">
    Сменить пароль
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
