<a href="{{ url('/') }}">Home</a>
<a href="{{ url('about') }}">About</a>
<a href="{{ url('contact') }}">Contact</a>
<h1>Contact</h1>

<form action="{{url('contact-add')}}" method="POST">
	@csrf
	Name : <input type="text" name="name"><br>
	Contact: <input type="number" name="number"><br>
	<input type="submit" name="submit" value="submit">
	
</form>

