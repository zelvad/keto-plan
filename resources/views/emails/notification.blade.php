<p><b>Name:</b> {{ $feedback->name }}</p>
<p><b>Email:</b> <a href="mailto:{{ $feedback->email }}">{{ $feedback->email }}</a></p>
<p><b>Phone:</b> {{ $feedback->phone }}</p>
<p><b>Message:</b></p>
<p>{{ $feedback->message }}</p>
<br>
<br>
<p><b>Project:</b> <a href="{{ config('app.url') }}">{{ config('app.url') }}</a></p>
