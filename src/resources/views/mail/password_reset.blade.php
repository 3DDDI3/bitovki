<x-mail::message>

<h1 style="text-align: center; margin-bottom: 20px">Восстановление пароля</h1>

<p>Вы получили это письмо, т.к. поступил запрос на смену пароля.</p>

@php
    $url = config('app.url') . '/pa/auth/reset-password?token=' . $resetPassword->token;
@endphp

<x-mail::button :$url>
Восстановить пароль
</x-mail::button>

<p>Если это были не вы, то проигнорируйте это письмо</p>

<p style="margin-top: 20px">C уважением, <br>Администрация сайта {{ config('app.name') }}</p>

</x-mail::message>
