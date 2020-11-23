
@component('mail::message')
Hello **{{config('app.name')}}**,
{{-- use double space for line break --}}
{{-- Please click on the below link to reset your password --}}
{{-- Thank you for choosing Mailtrap! --}}
<p>A message has just been recieved from the contact us page, find the details bellow.</p>

<h3>Name: {{$name}}</h3>
<h3>Email: {{$email}}</h3>
<h3>Phone: {{$mobile}}</h3>
<h3>Reason For Contact: {{$reason}}</h3>
<h3>What Is 7 + 5? Spam Protection: {{$bot}}</h3>
<h3>Preferred Method Of Communication: {{$communicate}}</h3>
<h3>Additional Information: {{$message}}</h3>
<h4>Sent on: {{  date('D, M j, Y \a\t g:ia', strtotime($time))}}</h4>

Regards,  <br>
<b>{{config('app.name')}}</b>
@endcomponent