<x-mail::message>
# Olá! Recebemos sua solicitação de recuperação de senha.

Clique no botão abaixo para redefinir sua senha. Caso você não tenha solicitado, não é necessário nenhuma ação, apenas ignore este email.

<x-mail::button :url="''">
Redefinir senha
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
