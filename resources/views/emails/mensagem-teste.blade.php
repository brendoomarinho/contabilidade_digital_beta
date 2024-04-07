<x-mail::message>
# Título maior - sem o build

Corpo da mensagem.

<x-mail::button :url="''">
Texto do botão 
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
