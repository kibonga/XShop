@component('mail::message')
# Introduction

The body of your message.
Subject: {{$data['subject']}} <br>
From: {{$data['email']}} <br>

Name: {{$data['name']}} <br>
Message: {{$data['message']}} <br>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
