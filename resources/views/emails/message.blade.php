<x-mail::message>
# Introduction

<strong>Nouvelle Demande de contact</strong>
Vous avez ete contacte par un utilisateur

- Nom : {{$data['name']}}
- Email : {{$data['email']}}
- Subject : {{$data['subject']}}


**Message : **<br>
{{$data['message']}}


</x-mail::message>
