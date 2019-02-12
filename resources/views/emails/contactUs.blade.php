@component('mail::message')
# Mr.{{$data['name']}}
@if($data['email'] != null)
#Email:{{$data['email']}}
@endif
#Mobile Number:{{$data['phone']}}
#Subject:{{$data['subject']}}
Message:{{$data['message']}}
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
