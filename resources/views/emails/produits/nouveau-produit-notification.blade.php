@component('mail::message')
# Bienvenue sur notre plateforme

## Désignation:{{$produit->designation}}
## Prix:{{$produit->prix}}
   
The body of your message.

@component('mail::button', ['url' => url("/list-produits") ])
Connectez vous
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent
