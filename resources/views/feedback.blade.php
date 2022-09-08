<a href="{{ url('/') }}">Home</a>
<a href="{{ url('about') }}">About</a>
<a href="{{ url('contact') }}">Contact</a>
<a href="{{ url('feedback') }}">Feedback</a>
<a href="{{ url('contact-all') }}">All Contact</a>
<h1>Feedback</h1>

<form action="{{ url('feedback-add')}}" method="POST">
@csrf
Name : <input type="text" name="name"><br>
Rating: <input type="number" name="rating"><br>
Feedback: <textarea name="feedback"></textarea><br>
<input type="submit" name="submit" value="Submit">
</form>