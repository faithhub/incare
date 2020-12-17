
@component('mail::message')
Hello **{{$first_name}} {{$last_name}}**,
{{-- use double space for line break --}}
{{-- Please click on the below link to reset your password --}}
{{-- Thank you for choosing Mailtrap! --}}
{{-- <p>A message has just been recieved from the contact us page, find the details bellow.</p> --}}
{{-- <h2>Hi {{$first_name}} {{$last_name}}</h2> --}}
<p>Thanks for your interest in joining Incare, Click the button below to login</p>
@component('mail::button', ['url' => 'https://incare.ng/login'])
    Login Here
@endcomponent
{{-- <h4>Sent on: {{  date('D, M j, Y \a\t g:ia', strtotime($time))}}</h4> --}}

Regards,  <br>
<b>{{config('app.name')}}</b>
@endcomponent